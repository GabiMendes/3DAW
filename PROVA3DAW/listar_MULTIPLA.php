<?php
$perguntaId = isset($_GET['id']) ? $_GET['id'] : '';

function lerPergunta($arquivo, $id)
{
    $arq = fopen($arquivo, "r") or die("Erro ao abrir o arquivo");

    while (($linha = fgets($arq)) !== false) {
        $dados = explode(";", $linha);
        $numero = trim($dados[0]);

        if ($numero == $id) {
            fclose($arq);
            return $dados;
        }
    }

    fclose($arq);
    return false;
}

function exibirDetalhes($perguntaId, $dados)
{
    if ($dados === false) {
        echo "Pergunta não encontrada.";
    } else {
        $numero = $dados[0];
        $pergunta = $dados[1];
        $gabarito = $dados[count($dados) - 2];
        $alternativas = array_slice($dados, 2, count($dados) - 4);

        echo "<h2>Detalhes da pergunta $numero:</h2>";
        echo "<p>Pergunta: $pergunta</p>";

        if (!empty($alternativas)) {
            echo "<p>Alternativas:</p>";
            echo "<ul>";
            foreach ($alternativas as $alternativa) {
                echo "<li>$alternativa</li>";
            }
            echo "</ul>";
        }

        echo "<p>Gabarito: $gabarito</p>";
    }
}

$arquivoMultipla = "perguntasmultipla.txt";

?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <h1>Listar Pergunta Única - Múltipla Escolha</h1>
    <form action="listar_MULTIPLA.php" method="GET">
        <label for="id">ID da pergunta:</label>
        <select name="id" id="id">
            <?php
            $arq = fopen($arquivoMultipla, "r") or die("Erro ao abrir o arquivo");

            while (($linha = fgets($arq)) !== false) {
                $dados = explode(";", $linha);
                $numero = trim($dados[0]);

                echo "<option value=\"$numero\">$numero</option>";
            }

            fclose($arq);
            ?>
        </select>
        <input type="submit" value="Buscar">
    </form>
    <br>

    <?php
    if (!empty($perguntaId)) {
        $dadosPergunta = lerPergunta($arquivoMultipla, $perguntaId);
        exibirDetalhes($perguntaId, $dadosPergunta);
    }
    ?>

    <form action="listarPergunta.php">
        <br>
        <input type="submit" value="Voltar">
    </form>

</body>
</html>
