<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idPergunta = $_POST["idPergunta"];
    $pergunta = $_POST["pergunta"];
    $gabarito = $_POST["gabarito"];
    $alternativaA = $_POST["alternativaA"];
    $alternativaB = $_POST["alternativaB"];
    $alternativaC = $_POST["alternativaC"];
    $alternativaD = $_POST["alternativaD"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "perguntasrespostas";
    $conn = new mysqli($servername, $username, $password, $database);

    // Verifica se cada campo não está vazio e realiza a alteração se necessário
    if (!empty($pergunta)) {
        $sql = "UPDATE perguntagabarito SET pergunta = '$pergunta' WHERE id = $idPergunta";
        $conn->query($sql);
    }

    if (!empty($gabarito)) {
        $sql = "UPDATE perguntagabarito SET gabarito = '$gabarito' WHERE id = $idPergunta";
        $conn->query($sql);
    }

    if (!empty($alternativaA)) {
        $sql = "UPDATE perguntagabarito SET alternativaA = '$alternativaA' WHERE id = $idPergunta";
        $conn->query($sql);
    }

    if (!empty($alternativaB)) {
        $sql = "UPDATE perguntagabarito SET alternativaB = '$alternativaB' WHERE id = $idPergunta";
        $conn->query($sql);
    }

    if (!empty($alternativaC)) {
        $sql = "UPDATE perguntagabarito SET alternativaC = '$alternativaC' WHERE id = $idPergunta";
        $conn->query($sql);
    }

    if (!empty($alternativaD)) {
        $sql = "UPDATE perguntagabarito SET alternativaD = '$alternativaD' WHERE id = $idPergunta";
        $conn->query($sql);
    }

    $conn->close();

    echo "Pergunta alterada com sucesso!";
}
?>
