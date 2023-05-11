<?php

//Inicializou variáveis

$nome = "";
$cpf = "";
$matricula = "";
$dtingresso= "";

//Recebendo dados do form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $matricula = $_POST["matricula"];
    $dtingresso = $_POST["dtingresso"];
    $linha = "";
    echo "nome: " . $nome . " cpf: " . " matricula: " . $matricula . "dt ingresso: " . $dtingresso;
    if (!file_exists("cadastros.txt")) {
        $arqDisc = fopen("cadastros.txt","w") or die("erro ao criar arquivo");
        $linha = "nome;cpf;matricula;dtingresso\n";
        fwrite($arqDisc,$linha);
        fclose($arqDisc);
    }
    $arqDisc = fopen("cadastros.txt","a") or die("erro ao criar arquivo");
    $linha = $nome . ";" . $cpf . ";" . $matricula . ";" . $dtingresso . "\n";
    fwrite($arqDisc,$linha);
    fclose($arqDisc);
}

?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<h1>Incluir</h1>
	<form action="incluirdados.php" method="POST">
	    <label for="nome">Nome:</label>
	    <input type="text" name="nome" id="nome">
	    <label for="cpf">CPF:</label>
	    <input type="text" name="cpf" id="cpf">
	    <label for="matricula">Matrícula:</label>
	    <input type="text" name="matricula" id="matricula">
	    <label for="dtingresso">Data de ingresso:</label>
	    <input type="text" name="dtingresso" id="dtingresso">
	    <input type="submit" value="Incluir Cadastro">
	</form>
	<br>

	<form action="index.php">
	    <input type="submit" value="Voltar ao menu principal">
	</form>
	
</body>
</html>
