<!DOCTYPE html>
<html>
<head>
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
		//Ler o arquivo cadastros.txt
$arqDisc = fopen("cadastros.txt","r") or die("Erro ao abrir arquivo.");

//Ler e descartar a primeira linha (cabeçalho)
fgets($arqDisc);
fgets($arqDisc);
fgets($arqDisc);

$dados="";

//Ler cada linha de dados do arquivo e exibir como uma tabela
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
	
	<form action="index.php">
	    <input type="submit" value="Voltar ao menu principal">
	</form>
</body>
</html>
