<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<h1>Listar Perguntas Múltipla-Escolhas</h1>
	<table>
	<thead>
		<tr>
			<th>ID</th>
			<th>Pergunta</th>
			<th>Alternativa A</th>
			<th>Alternativa B</th>
			<th>Alternativa C</th>
			<th>Alternativa D</th>
			<th>Gabarito</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$arqDisc = fopen("perguntasmultipla.txt", "r") or die("Erro ao abrir arquivo.");

		while (!feof($arqDisc)) {
		    $linha = fgets($arqDisc);
		    if (!empty($linha)) {
		        $dados = explode(";", $linha);
		        echo "<tr>";
		        echo "<td>" . $dados[0] . "</td>";
		        echo "<td>" . $dados[1] . "</td>";
		        echo "<td>" . $dados[2] . "</td>";
		        echo "<td>" . $dados[3] . "</td>";
		        echo "<td>" . $dados[4] . "</td>";
		        echo "<td>" . $dados[5] . "</td>";
		        echo "<td>" . $dados[6] . "</td>";
		        echo "</tr>";
		    }
		}
		fclose($arqDisc);
		?>
	</tbody>
	</table>

	<br>

	<form action="index_logado.php">
    <br>
    <br>
	    <input type="submit" value="Voltar ao menu principal">
	</form>
</body>
</html>
