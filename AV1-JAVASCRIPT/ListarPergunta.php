<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idPergunta = $_POST["idPergunta"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "perguntasrespostas";
    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT id, pergunta, gabarito, alternativaA, alternativaB, alternativaC, alternativaD FROM perguntagabarito WHERE id = ?");
    $stmt->bind_param("i", $idPergunta);
    $stmt->execute();
    $result = $stmt->get_result();
    $pergunta = $result->fetch_assoc();

    if ($pergunta) {
        echo "ID: " . $pergunta["id"] . "<br>";
        echo "Pergunta: " . $pergunta["pergunta"] . "<br>";
        echo "Gabarito: " . $pergunta["gabarito"] . "<br>";
        echo "Alternativa A: " . $pergunta["alternativaA"] . "<br>";
        echo "Alternativa B: " . $pergunta["alternativaB"] . "<br>";
        echo "Alternativa C: " . $pergunta["alternativaC"] . "<br>";
        echo "Alternativa D: " . $pergunta["alternativaD"] . "<br><br>";
    } else {
        echo "Pergunta não encontrada.";
    }

    $stmt->close();
    $conn->close();
}
?>

