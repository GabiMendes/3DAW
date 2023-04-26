<!DOCTYPE html>
<html>
<head>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #F2F2F2;
		}
		h1 {
			color: #333333;
			text-align: center;
			margin-top: 50px;
		}
		table {
			margin: 0 auto;
			border-collapse: collapse;
			border: 1px solid #333333;
		}
		th, td {
			padding: 10px;
			border: 1px solid #333333;
		}
	</style>
</head>
<body>
	<h1>Listar Cadastros</h1>
    <table>
	<thead>
		<tr>
			<th>Nome</th>
			<th>CPF</th>
			<th>Matrícula</th>
			<th>Data de Ingresso</th>
		</tr>
	</thead>
	<tbody>
		<?php
		//Ler o arquivo cadastros.txt
		$arqDisc = fopen("cadastros.txt","r") or die("Erro ao abrir arquivo.");
		//Ler cada linha do arquivo e exibir como uma tabela
		while (!feof($arqDisc)) {
			$linha = fgets($arqDisc);
			if (!empty($linha)) {
				$dados = explode(";", $linha);
				echo "<tr>";
				echo "<td>" . $dados[0] . "</td>";
				echo "<td>" . $dados[1] . "</td>";
				echo "<td>" . $dados[2] . "</td>";
				echo "<td>" . $dados[3] . "</td>";
				echo "</tr>";
			}
		}
		fclose($arqDisc);
		?>
	</tbody>
</table>

<br>
<a href="index.php">Voltar</a>
</body>
</html>