<?php

$Pergunta = "";
$RespostaTexto = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Pergunta = $_POST["Pergunta"];
    $RespostaTexto = $_POST["RespostaTexto"];

    if (!file_exists("perguntasdiscursivas.txt")) {
        $arqDisc = fopen("perguntasdiscursivas.txt", "w") or die("Erro ao criar arquivo");
        $linha = "Número;Pergunta;Gabarito;\n";
        fwrite($arqDisc, $linha);
        fclose($arqDisc);
    }

    $arqDisc = fopen("perguntasdiscursivas.txt", "r") or die("Erro ao abrir arquivo");
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

    if (!isset($_POST["confirmacao"])) {
        echo "<h2>Confirmação de Inclusão:</h2>";
        echo "<p>Dados da pergunta a ser incluída:</p>";
        echo "<p>Pergunta: $Pergunta</p>";
        echo "<p>Gabarito: $RespostaTexto</p>";
        echo "<form method='POST' action='incluir_DISCURSIVA.php'>";
        echo "<input type='hidden' name='Pergunta' value='$Pergunta'>";
        echo "<input type='hidden' name='RespostaTexto' value='$RespostaTexto'>";
        echo "<input type='hidden' name='confirmacao' value='true'>";
        echo "<input type='submit' value='Confirmar Inclusão' name='incluir'>";
        echo "</form>";
        echo "<form action='index_logado.php'>";
        echo "<br><br>";
        echo "<input type='submit' value='Cancelar'>";
        echo "</form>";
    } else {
        $arqDisc = fopen("perguntasdiscursivas.txt", "a") or die("Erro ao abrir arquivo");
        $linha = $proximoNumero . ";" . $Pergunta . ";" . $RespostaTexto . ";" . "\n";
        fwrite($arqDisc, $linha);
        fclose($arqDisc);
        echo "<h2>Pergunta incluída com sucesso.</h2>";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <h1>Incluir</h1>
    <form action="incluir_DISCURSIVA.php" method="POST">
        <label for="Pergunta">Pergunta:</label>
        <input type="text" name="Pergunta" id="Pergunta">
        <label for="RespostaTexto">Gabarito:</label>
        <input type="text" name="RespostaTexto" id="RespostaTexto">
        <input type="submit" value="Incluir Pergunta">
    </form>
    <br>

    <form action="UsuarioLogado.php">
        <br>
        <br>
        <input type="submit" value="Voltar ao menu principal">
    </form>
    
</body>
</html>
