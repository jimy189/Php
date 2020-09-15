<?php
	session_start();
	include_once "config.php";
?>
<!DOCTYPE HTML>
<html lang="pt-BR">
	<head>
		<meta charset=UTF-8>
		<title>Busca Carrinho</title>
		<link href="css/style.css" type="text/css" rel="stylesheet" />
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/functions.js"></script>
	</head>

	<body>
		<form action="" method="post" enctype="multipart/form-data" id="form_busca">
			<label>
				<span>Buscar Produto</span>
				<input type="text" name="buscar" id="busca" />
			</label>
		</form>

		<div id="resultado_busca"></div>

		<form action="" method="post" enctype="multipart/form-data">
			<table border="0" cellpadding="0" cellspacing="0" width="80%">
				<thead>
					<tr>
						<td>Produto</td>
						<td>Valor</td>
						<td>Qtd</td>
						<td>Subtotal</td>
					</tr>
				</thead>

				<tbody id="content_retorno">
					
				</tbody>
			</table>
			<input type="submit" value="Concluir compra" class="botao" />
		</form>
	</body>
</html>