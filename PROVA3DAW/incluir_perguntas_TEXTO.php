<?php

$Pergunta = "";
$RespostaTexto = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Pergunta = $_POST["Pergunta"];
    $RespostaTexto = $_POST["RespostaTexto"];

    if (!file_exists("perguntasdiscursivas.txt")) {
        $arqDisc = fopen("perguntasdiscursivas.txt", "w") or die("erro ao criar arquivo");
        $linha = "Número;Pergunta;Gabarito;\n";
        fwrite($arqDisc, $linha);
        fclose($arqDisc);
    }

    $arqDisc = fopen("perguntasdiscursivas.txt", "r") or die("erro ao abrir arquivo");
    $ultimoNumero = 0;
    while (($linha = fgets($arqDisc)) !== false) {
        $dados = explode(";", $linha);
        $numero = intval($dados[0]);
        if ($numero > $ultimoNumero) {
            $ultimoNumero = $numero;
        }
    }
    fclose($arqDisc);

    $proximoNumero = $ultimoNumero + 1;

    $arqDisc = fopen("perguntasdiscursivas.txt", "a") or die("erro ao abrir arquivo");
    $linha = $proximoNumero . ";" . $Pergunta . ";" . $RespostaTexto . ";" . "\n";
    fwrite($arqDisc, $linha);
    fclose($arqDisc);
}

?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<h1>Incluir</h1>
	<form action="incluir_perguntas_TEXTO.php" method="POST">
	    <label for="Pergunta">Pergunta:</label>
	    <input type="text" name="Pergunta" id="Pergunta">
	    <label for="RespostaTexto">Gabarito:</label>
	    <input type="text" name="RespostaTexto" id="RespostaTexto">
	    <input type="submit" value="Incluir Pergunta">
	</form>
	<br>

	<form action="index_logado.php">
    <br>
    <br>
	    <input type="submit" value="Voltar ao menu principal">
	</form>
	
</body>
</html>
