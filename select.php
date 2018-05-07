<?php 

include "conexao.php";

$stm = $conexao->prepare("
		SELECT * FROM cliente ORDER BY nome ASC
	");

$stm->execute();

$resultado = $stm->fetchAll(PDO::FETCH_ASSOC);


