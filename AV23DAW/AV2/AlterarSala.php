<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "av2";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

$id = $_POST["id"];
$novaSala = $_POST["novaSala"];

$query = "UPDATE candidatos SET salaDeProva = '$novaSala' WHERE id = $id";
if ($conn->query($query) === TRUE) {
    echo "Sala de prova alterada com sucesso!";
} else {
    echo "Erro ao alterar sala de prova: " . $conn->error;
}

$conn->close();
?>
