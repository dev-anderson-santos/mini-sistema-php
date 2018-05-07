<?php

include "conexao.php";

$stm = $conexao->prepare("
		DELETE FROM cliente
		WHERE id = :id
	");

$id = $_POST["id"];

$stm->bindParam(":id", $id);

$stm->execute();

header("Location: cadastro-cliente.php?removido=true");
die();
