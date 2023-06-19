<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "perguntasrespostas";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

$query = "SELECT * FROM perguntagabarito";
$result = $conn->query($query);

if ($result->num_rows == 0) {
    echo "Não há perguntas cadastradas.";
    exit;
}

while ($pergunta = $result->fetch_assoc()) {
    echo "ID: " . $pergunta["id"] . "<br>";
    echo "Pergunta: " . $pergunta["pergunta"] . "<br>";
    echo "Gabarito: " . $pergunta["gabarito"] . "<br>";
    echo "Alternativa A: " . $pergunta["alternativaA"] . "<br>";
    echo "Alternativa B: " . $pergunta["alternativaB"] . "<br>";
    echo "Alternativa C: " . $pergunta["alternativaC"] . "<br>";
    echo "Alternativa D: " . $pergunta["alternativaD"] . "<br><br>";
}

$conn->close();
?>
