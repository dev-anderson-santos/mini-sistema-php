<?php 

include("conexao.php");

$stm = $conexao->prepare("
		INSERT INTO cliente (nome, email) VALUES (:nome, :email);
	");

$nome = $_POST["nome"];
$email = $_POST["email"];

$stm->bindParam(":nome", trim($nome));
$stm->bindParam(":email", trim($email));

$stm->execute();

header("Location: cadastro-cliente.php?cadastrado=true&nome=$nome");
die();
