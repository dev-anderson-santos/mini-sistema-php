<?php 
include("conexao.php");
include("select.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Cadastro de clientes</title>
</head>
<body>
	<h1>Cadastro de clientes</h1>
	<hr>

	<?php 
		if($_GET["cadastrado"] && $_GET["cadastrado"] == "true") :		
	?>
	<p id="msg">
		Cliente <?= $_GET["nome"] ?> foi CADASTRADO com sucesso! <button onclick="escondeMsg()">X</button>
	</p>
	<?php 
		elseif ($_GET["removido"] && $_GET["removido"] == "true") :			
	?>
	<p id="msg">
		Cliente REMOVIDO com sucesso! <button onclick="escondeMsg()">X</button>
	</p>
	<?php
		endif;
	?>

	<form action="insert.php" method="post">
		<table>
			<tr>
				<td>Nome: </td>
				<td>
					<input type="text" name="nome">
				</td>
			</tr>
			<tr>
				<td>Email: </td>
				<td>
					<input type="email" name="email">
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<button type="submit">Cadastrar</button>
				</td>
			</tr>
		</table>
	</form>

	<br>
	<table border="1">		
		<thead>
			<tr>
				<th>Nome</th>
				<th>Email</th>
				<th>Ações</th>
			</tr>
		</thead>
		<tbody>
			<?php 
					foreach ($resultado as $cliente) :
				?>
			<tr>				
				<td>
					<?php
						echo $cliente['nome'];						
					?>
				</td>
				
				<td>
					<?php
						echo $cliente['email'];						
					?>
				</td>
				<td>
					<a href="">Alterar</a> | 
					<a href="delete.php?id=<?=$cliente['id'];?>" id="excluir">Excluir</a>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>

	<script type="text/javascript">
		
		var msg = document.getElementById("msg");
		/*if(msg !== null) {
			setTimeout(function() {

					msg.style.display = "none";
				}
			, 5000);
		}*/

		function escondeMsg () {
			
			if(msg !== null) {
				var x = document.getElementsByTagName("body");
				msg.style.display = "none";
			}			
		}

		function pegaId() {
			var id = document.getElementById("excluir");
			console.log(id.getAttribute("href"));
		}
	</script>

</body>
</html>