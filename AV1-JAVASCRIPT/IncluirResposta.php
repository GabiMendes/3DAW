<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "perguntasrespostas";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica se a conexão foi estabelecida corretamente
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Obtém o ID da pergunta e a resposta enviados pelo formulário
$idPergunta = $_POST["id"];
$resposta = $_POST["resposta"];

// Verifica se o ID existe na tabela "perguntagabarito"
$query = "SELECT id FROM perguntagabarito WHERE id = $idPergunta";
$result = $conn->query($query);

if ($result->num_rows == 0) {
    // O ID não foi encontrado
    echo "ID da pergunta não foi encontrada.";
} else {
    // Insere a resposta na tabela "RESPOSTA"
    $query = "INSERT INTO RESPOSTA (id, resposta) VALUES ($idPergunta, '$resposta')";
    if ($conn->query($query) === TRUE) {
        echo "Resposta incluída com sucesso.";
    } else {
        echo "Erro ao incluir a resposta: " . $conn->error;
    }
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
