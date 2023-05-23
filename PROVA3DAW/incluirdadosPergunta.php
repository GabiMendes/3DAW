<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipoPergunta = $_POST["tipo"];

    if ($tipoPergunta == "discursiva") {
        header("Location: incluir_perguntas_TEXTO.php");
    } elseif ($tipoPergunta == "multipla") {
        header("Location: incluir_perguntas_MULTIPLA.php");
    } else {
        echo "<h2>Tipo de pergunta inválido.</h2>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Incluir Dados da Pergunta</title>
</head>
<body>
    <h1>Incluir Dados da Pergunta</h1>
    <form method="POST" action="incluirdadosPergunta.php">
        <label for="tipo">Selecione o tipo de pergunta:</label>
        <select name="tipo" id="tipo">
            <option value="discursiva">Discursiva</option>
            <option value="multipla">Múltipla Escolha</option>
        </select>
        <br>
        <input type="submit" value="Avançar" name="avancar">
    </form>

    <form action="index_logado.php">
        <br>
        <br>
        <input type="submit" value="Voltar ao menu principal">
    </form>
</body>
</html>
