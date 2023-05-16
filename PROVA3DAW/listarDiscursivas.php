<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<h1>Listar Perguntas Discursivas</h1>
	<table>
	<thead>
		<tr>
			<th>Número</th>
			<th>Pergunta</th>
			<th>Resposta Texto</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$arqDisc = fopen("perguntasdiscursivas.txt", "r") or die("Erro ao abrir arquivo.");

		// Ler e descartar a primeira linha (cabeçalho)
		fgets($arqDisc);

		while (!feof($arqDisc)) {
		    $linha = fgets($arqDisc);
		    if (!empty($linha)) {
		        $dados = explode(";", $linha);
		        echo "<tr>";
		        echo "<td>" . $dados[0] . "</td>";
		        echo "<td>" . $dados[1] . "</td>";
		        echo "<td>" . $dados[2] . "</td>";
		        echo "</tr>";
		    }
		}
		fclose($arqDisc);
		?>
	</tbody>
	</table>

	<br>

	<form action="index_logado.php">
	    <input type="submit" value="Voltar ao menu principal">
	</form>
</body>
</html>
