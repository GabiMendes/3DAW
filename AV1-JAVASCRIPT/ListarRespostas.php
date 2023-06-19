<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "perguntasrespostas";
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

$query = "SELECT * FROM resposta";
$result = $conn->query($query);

if ($result->num_rows == 0) {
    echo "Não há perguntas cadastradas.";
    exit;
}

while ($pergunta = $result->fetch_assoc()) {
    echo "ID: " . $pergunta["id"] . "<br>";
    echo "Resposta: " . $pergunta["resposta"] . "<br>";
}

$conn->close();
?>
