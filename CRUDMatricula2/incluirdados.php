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
		form {
			background-color: #FFFFFF;
			padding: 20px;
			border-radius: 5px;
			box-shadow: 0 2px 2px rgba(0, 0, 0, 0.25);
			max-width: 500px;
			margin: 0 auto;
		}
		label {
			display: block;
			margin-bottom: 10px;
			font-size: 16px;
			font-weight: bold;
			color: #333333;
		}
		input[type="text"] {
			padding: 10px;
			border-radius: 5px;
			border: none;
			box-shadow: 0 2px 2px rgba(0, 0, 0, 0.25);
			font-size: 16px;
			margin-bottom: 20px;
			width: 100%;
			box-sizing: border-box;
		}
		input[type="submit"] {
			background-color: #008CBA;
			color: #FFFFFF;
			padding: 10px 20px;
			border-radius: 5px;
			border: none;
			font-size: 16px;
			font-weight: bold;
			box-shadow: 0 2px 2px rgba(0, 0, 0, 0.25);
			cursor: pointer;
			transition: background-color 0.3s ease-in-out;
		}
		input[type="submit"]:hover {
			background-color: #005A6E;
		}
	</style>
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
