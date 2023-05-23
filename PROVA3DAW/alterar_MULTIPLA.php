<!DOCTYPE html>
<html>
<head>
    <title>Alterar Múltipla-Escolha</title>
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero = $_POST["numero"];
    $arqMultipla = fopen("perguntasmultipla.txt", "r") or die("Erro ao abrir o arquivo.");
    $encontrado = false;
    while (!feof($arqMultipla) && !$encontrado) {
        $linha = fgets($arqMultipla);
        $dados = explode(";", $linha);
        if (isset($dados[0]) && $dados[0] == $numero) {
            $encontrado = true;
            break;
        }
    }
    fclose($arqMultipla);

    if ($encontrado) {
        if (isset($_POST["salvar"])) {
            $numero = $_POST["numero"];
            $pergunta = $_POST["pergunta"];
            $alternativaA = $_POST["alternativaA"];
            $alternativaB = $_POST["alternativaB"];
            $alternativaC = $_POST["alternativaC"];
            $alternativaD = $_POST["alternativaD"];
            $gabarito = $_POST["gabarito"];

            $arqMultipla = fopen("perguntasmultipla.txt", "r") or die("Erro ao abrir o arquivo.");
            $temp = fopen("temp.txt", "w") or die("Erro ao criar arquivo temporário.");
            while (!feof($arqMultipla)) {
                $linha = fgets($arqMultipla);
                $dados = explode(";", $linha);
                if (isset($dados[0]) && $dados[0] == $numero) {
                    $novaLinha = $numero . ";" . $pergunta . ";" . $alternativaA . ";" . $alternativaB . ";" . $alternativaC . ";" . $alternativaD . ";" . $gabarito;
                    fwrite($temp, $novaLinha . "\n");
                } else {
                    fwrite($temp, $linha);
                }
            }
            fclose($arqMultipla);
            fclose($temp);
            unlink("perguntasmultipla.txt");
            rename("temp.txt", "perguntasmultipla.txt");
            echo "<h2>Pergunta alterada com sucesso.</h2>";
        } else {
            echo "<h2>Alterar pergunta:</h2>";
            echo "<form method='POST' action='alterar_MULTIPLA.php'>";
            echo "<input type='hidden' name='numero' value='" . $dados[0] . "'>";
            echo "Pergunta: <input type='text' name='pergunta' value='" . $dados[1] . "'><br>";
            echo "Alternativa A: <input type='text' name='alternativaA' value='" . $dados[2] . "'><br>";
            echo "Alternativa B: <input type='text' name='alternativaB' value='" . $dados[3] . "'><br>";
            echo "Alternativa C: <input type='text' name='alternativaC' value='" . $dados[4] . "'><br>";
            echo "Alternativa D: <input type='text' name='alternativaD' value='" . $dados[5] . "'><br>";
            echo "Gabarito: <input type='text' name='gabarito' value='" . $dados[6] . "'><br>";
            echo "<input type='submit' value='Salvar Alterações' name='salvar'>";
            echo "</form>";
        }
    } else {
        echo "<h2>Pergunta não encontrada.</h2>";
    }
}

if (!isset($_POST["buscar"]) && !isset($_POST["salvar"])) { 
    ?>
    <h1>Alterar Múltipla</h1>
    <form action="alterar_MULTIPLA.php" method="POST">
        <label for="numero">Número:</label>
        <select name="numero" id="numero">
            <?php
                $arqMultipla = fopen("perguntasmultipla.txt", "r") or die("Erro ao abrir o arquivo.");

                while (!feof($arqMultipla)) {
                    $linha = fgets($arqMultipla);
                    $dados = explode(";", $linha);
                    if (isset($dados[0]) && trim($dados[0]) !== "") {
                        $perguntaID = trim($dados[0]);
                        $pergunta = trim($dados[1]);
                        if (!empty($perguntaID) && $pergunta !== "REMOVIDA") {
                            echo "<option value='" . $perguntaID . "'>" . $perguntaID . "</option>";
                        }
                    }
                }

                fclose($arqMultipla);
            ?>
        </select>
        <br>
        <input type="submit" value="Buscar" name="buscar">
    </form>
    <?php
}
?>

<br>

<form action="UsuarioLogado.php">
    <br>
    <br>
    <input type="submit" value="Voltar ao menu principal">
</form>

</body>
</html>
