<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "candidatos";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

$query = "SELECT * FROM candidatos ORDER BY nome";
$result = $conn->query($query);

if ($result->num_rows == 0) {
    echo "Não há candidatos cadastrados.";
    exit;
}

while ($candidato = $result->fetch_assoc()) {
    echo "ID: " . $candidato["id"] . "<br>";
    echo "Nome: " . $candidato["nome"] . "<br>";
    echo "CPF: " . $candidato["cpf"] . "<br>";
    echo "RG: " . $candidato["rg"] . "<br>";
    echo "Email: " . $candidato["email"] . "<br>";
    echo "Cargo: " . $candidato["cargo"] . "<br>";
    echo "Sala: " . $candidato["salaDeProva"] . "<br><br>";
}

$conn->close();
?>
