<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "perguntasrespostas";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

$idPergunta = $_POST["id"];
$resposta = $_POST["resposta"];

$query = "SELECT id FROM perguntagabarito WHERE id = $idPergunta";
$result = $conn->query($query);

if ($result->num_rows == 0) {
    echo "ID da pergunta não foi encontrada.";
} else {
    $query = "INSERT INTO RESPOSTA (id, resposta) VALUES ($idPergunta, '$resposta')";
    if ($conn->query($query) === TRUE) {
        echo "Resposta incluída com sucesso.";
    } else {
        echo "Erro ao incluir a resposta: " . $conn->error;
    }
}

$conn->close();
?>
