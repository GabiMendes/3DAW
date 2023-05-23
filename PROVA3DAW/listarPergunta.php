<?php
$tipoPergunta = isset($_GET['tipo']) ? $_GET['tipo'] : '';

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
$arquivoTexto = "perguntasdiscursivas.txt";

if ($tipoPergunta == 'discursiva' || $tipoPergunta == 'multipla') {
    $tipoPergunta = strtoupper($tipoPergunta);
    header("Location: listar_" . $tipoPergunta . ".php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <h1>Listar Pergunta Única</h1>
    <form action="listarPergunta.php" method="GET">
        <label for="tipo">Tipo de pergunta:</label>
        <select name="tipo" id="tipo">
            <option value="discursiva">Discursiva</option>
            <option value="multipla">Múltipla Escolha</option>
        </select>
        <br>
        <input type="submit" value="Selecionar">
    </form>
    <br>
    
    <form action="UsuarioLogado.php">
        <br>
        <br>
        <input type="submit" value="Voltar ao menu principal">
    </form>
    
</body>
</html>
