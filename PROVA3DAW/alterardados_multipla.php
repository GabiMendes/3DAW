<!DOCTYPE html>
<html>
<head>
    <title>Alterar Múltipla</title>
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero = $_POST["numero"];
    $arqDisc = fopen("perguntasmultipla.txt", "r") or die("Erro ao abrir o arquivo.");
    $linha = fgets($arqDisc);
    $encontrado = false;
    while (!feof($arqDisc) && !$encontrado) {
        $linha = fgets($arqDisc);
        $dados = explode(";", $linha);
        if (isset($dados[0]) && $dados[0] == $numero) {
            $encontrado = true;
        }
    }
    fclose($arqDisc);

    if ($encontrado) {
        echo "<h2>Alterar pergunta:</h2>";
        echo "<form method='POST' action='alterardados_multipla.php'>";
        echo "<input type='hidden' name='numero' value='" . $dados[0] . "'>";
        echo "Pergunta: <input type='text' name='pergunta' value='" . $dados[1] . "'><br>";
        echo "Alternativa A: <input type='text' name='alternativaA' value='" . $dados[2] . "'><br>";
        echo "Alternativa B: <input type='text' name='alternativaB' value='" . $dados[3] . "'><br>";
        echo "Alternativa C: <input type='text' name='alternativaC' value='" . $dados[4] . "'><br>";
        echo "Alternativa D: <input type='text' name='alternativaD' value='" . $dados[5] . "'><br>";
        echo "Gabarito: <input type='text' name='gabarito' value='" . $dados[6] . "'><br>";
        echo "<input type='submit' value='Salvar Alterações' name='salvar'>";
        echo "</form>";
    } else {
        echo "<h2>Pergunta não encontrada.</h2>";
    }
}

if (isset($_POST["salvar"])) {
    $numero = $_POST["numero"];
    $pergunta = $_POST["pergunta"];
    $alternativaA = $_POST["alternativaA"];
    $alternativaB = $_POST["alternativaB"];
    $alternativaC = $_POST["alternativaC"];
    $alternativaD = $_POST["alternativaD"];
    $gabarito = $_POST["gabarito"];

    $arqDisc = fopen("perguntasmultipla.txt", "r") or die("Erro ao abrir o arquivo.");
    $temp = fopen("temp.txt", "w") or die("Erro ao criar arquivo temporário.");
    while (!feof($arqDisc)) {
        $linha = fgets($arqDisc);
        $dados = explode(";", $linha);
        if (isset($dados[0]) && $dados[0] == $numero) {
            $novaLinha = $numero . ";" . $pergunta . ";" . $alternativaA . ";" . $alternativaB . ";" . $alternativaC . ";" . $alternativaD . ";" . $gabarito;
            fwrite($temp, $novaLinha . "\n");
        } else {
            fwrite($temp, $linha);
        }
    }
    fclose($arqDisc);
    fclose($temp);
    unlink("perguntasmultipla.txt");
    rename("temp.txt", "perguntasmultipla.txt");
    echo "<h2>Pergunta alterada com sucesso.</h2>";
}
?>
<form action="index_logado.php">
    <br>
    <br>
    <input type="submit" value="Voltar ao menu principal">
</form>
</body>
</html>