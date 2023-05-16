<!DOCTYPE html>
<html>
<head>
	<title>Alterar Discursiva</title>
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero = $_POST["numero"];
    $arqDisc = fopen("perguntasdiscursivas.txt", "r") or die("Erro ao abrir o arquivo.");
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
        echo "<form method='POST' action='alterardados_discursiva.php'>";
        echo "<input type='hidden' name='numero' value='" . $dados[0] . "'>";
        echo "Pergunta: <input type='text' name='pergunta' value='" . $dados[1] . "'><br>";
        echo "Gabarito: <input type='text' name='gabarito' value='" . $dados[2] . "'><br>";
        echo "<input type='submit' value='Salvar Alterações' name='salvar'>";
        echo "</form>";
    } else {
        echo "<h2>Pergunta não encontrada.</h2>";
    }
}

if (isset($_POST["salvar"])) {
    $numero = $_POST["numero"];
    $pergunta = $_POST["pergunta"];
    $gabarito = $_POST["gabarito"];


    $arqDisc = fopen("perguntasdiscursivas.txt", "r") or die("Erro ao abrir o arquivo.");
    $temp = fopen("temp.txt", "w") or die("Erro ao criar arquivo temporário.");
    while (!feof($arqDisc)) {
        $linha = fgets($arqDisc);
        $dados = explode(";", $linha);
        if (isset($dados[0]) && $dados[0] == $numero) {
            $novaLinha = $numero . ";" . $pergunta . ";" . $gabarito;
            fwrite($temp, $novaLinha . "\n");
        } else {
            fwrite($temp, $linha);
        }
    }
    fclose($arqDisc);
    fclose($temp);
    unlink("perguntasdiscursivas.txt");
    rename("temp.txt", "perguntasdiscursivas.txt");
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