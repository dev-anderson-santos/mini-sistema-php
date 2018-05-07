<?php 

include "conexao.php";

$stm = $conexao->prepare("
		UPDATE cliente SET 
		nome = :nome, 
		email = :email
		WHERE id = :id
	");

$nome = $_GET["nome"];
$email = $_GET["email"];
$id = $_GET["id"];

$stm->bindParam(":nome", trim($nome));
$stm->bindParam(":email", trim($email));
$stm->bindParam(":id", $id);

$stm->execute();
