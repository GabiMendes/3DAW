<?php

// Inicializou variáveis
$Pergunta = "";
$RespostaTexto = "";

// Recebendo dados do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Pergunta = $_POST["Pergunta"];
    $RespostaTexto = $_POST["RespostaTexto"];

    // Verifica se o arquivo existe
    if (!file_exists("perguntasdiscursivas.txt")) {
        $arqDisc = fopen("perguntasdiscursivas.txt", "w") or die("erro ao criar arquivo");
        $linha = "Número;Pergunta;Gabarito;\n";
        fwrite($arqDisc, $linha);
        fclose($arqDisc);
    }

    // Lê o último número de pergunta gravado no arquivo
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

    // Incrementa o número da próxima pergunta
    $proximoNumero = $ultimoNumero + 1;

    // Abre o arquivo para adicionar a nova pergunta
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
	    <input type="submit" value="Voltar ao menu principal">
	</form>
	
</body>
</html>
