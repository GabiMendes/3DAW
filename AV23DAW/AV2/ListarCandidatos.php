<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "av2";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

$query = "SELECT * FROM candidatos ORDER BY salaDeProva, nome";
$result = $conn->query($query);

if ($result->num_rows == 0) {
    echo "Não há candidatos cadastrados.";
    exit;
}

$currentSala = "";
while ($candidato = $result->fetch_assoc()) {
    if ($currentSala != $candidato["salaDeProva"]) {
        echo "<h3>Sala de Prova: " . $candidato["salaDeProva"] . "</h3>";
        $currentSala = $candidato["salaDeProva"];
    }

    echo "ID: " . $candidato["id"] . "<br>";
    echo "Nome: " . $candidato["nome"] . "<br>";
    echo "CPF: " . $candidato["cpf"] . "<br>";
    echo "RG: " . $candidato["identidade"] . "<br>";
    echo "Email: " . $candidato["email"] . "<br>";
    echo "Cargo: " . $candidato["cargo"] . "<br>";
    echo "<br>";
}

$conn->close();
?>