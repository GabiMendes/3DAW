<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pergunta = $_POST["pergunta"];
    $gabarito = $_POST["gabarito"];
    $alternativaA = $_POST["alternativaA"];
    $alternativaB = $_POST["alternativaB"];
    $alternativaC = $_POST["alternativaC"];
    $alternativaD = $_POST["alternativaD"];

    if (empty($alternativaA)) {
        $alternativaA = "NULL";
    }
    if (empty($alternativaB)) {
        $alternativaB = "NULL";
    }
    if (empty($alternativaC)) {
        $alternativaC = "NULL";
    }
    if (empty($alternativaD)) {
        $alternativaD = "NULL";
    }

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "perguntasrespostas";
    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    // Get the next available Id
    $nextIdQuery = "SELECT MAX(id) AS maxId FROM perguntagabarito";
    $result = $conn->query($nextIdQuery);
    $row = $result->fetch_assoc();
    $nextId = $row["maxId"] + 1;

    $stmt = $conn->prepare("INSERT INTO perguntagabarito (id, pergunta, gabarito, alternativaA, alternativaB, alternativaC, alternativaD) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("issssss", $nextId, $pergunta, $gabarito, $alternativaA, $alternativaB, $alternativaC, $alternativaD);

    if ($stmt->execute()) {
        echo "Pergunta inserida com sucesso!";
    } else {
        echo "Erro na inserção da pergunta: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
