<?php

require_once('./conexao.php');

function create($produtos)
{

    $con = getConnection();


    try {

        #Insert something

        $stmt = $con->prepare("INSERT INTO produtos(nome, preco, qtdestoque, nrserie, cod, marca) VALUES (:nome , :preco, :qtdestoque, :nrserie, :cod, :marca)");

        $stmt->bindParam(":nome", $produtos->nome);
        $stmt->bindParam(":preco", $produtos->preco);
        $stmt->bindParam(":qtdestoque", $produtos->qtdestoque);
        $stmt->bindParam(":nrserie", $produtos->nrserie);
        $stmt->bindParam(":cod", $produtos->cod);
        $stmt->bindParam(":marca", $produtos->marca);

        if ($stmt->execute()) {
            echo " Produtos Registered successfully";
        }
    } catch (PDOException $error) {
        echo "Error When Register the Produtos. Error: {$error->getMessage()}";
    } finally {
        unset($con);
        unset($stmt);
    }
}

#create test
$produtos = new stdClass();
$produtos->nome = "Geladeira";
$produtos->preco = "R$1.120,00";
$produtos->qtdestoque = 172;
$produtos->nrserie = 11032;
$produtos->cod = 46789324;
$produtos->marca = "Lg";


create($produtos);
echo "<br><br>---<br><br>";

#create test
// $fruits = new stdClass();
// $fruits->name = "maça";
// $fruits->color = "vermelha";
// $fruits->codeQR = 01;
// create($fruits);
// echo "<br><br>---<br><br>";

#create test
// $fruits = new stdClass();
// $fruits->name = "uva";
// $fruits->color = "roxa";
// $fruits->codeQR = 02;
// create($fruits);

// echo "<br><br>---<br><br>";

function get()
{
    try {
        $con = getConnection();
        # Select something

        $rs = $con->query("SELECT nome, preco, qtdestoque, nrserie, cod, marca FROM produtos");

        while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
            echo "Nome: " . $row->nome . " <br> produtos: ";
            echo $row->preco . "<br> preco: ";
            echo $row->qtdestoque . "<br> qtdestoque";
            echo $row->nrserie . "<br> nrserie: ";
            echo $row->cod . "<br> cod";
            echo $row->marca . "<br> marca";


        }
    } catch (PDOException $error) {
        echo "Error When Listing Fruits. Error: {$error->getMessage()}";
    } finally {
        unset($con);
        unset($stmt);
    }
}

#get test
echo "List of Produtos <br><br>---<br><br>";
get();