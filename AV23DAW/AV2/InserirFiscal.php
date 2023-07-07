<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "av2";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

$nome = $_POST["nome"];
$cpf = $_POST["cpf"];
$sala = $_POST["sala"];

$countStmt = $conn->prepare("SELECT COUNT(*) as total FROM fiscais WHERE salaDeProva = ?");
$countStmt->bind_param("i", $sala);
$countStmt->execute();
$countResult = $countStmt->get_result();
$countRow = $countResult->fetch_assoc();
$totalFiscais = $countRow["total"];

if($totalFiscais >= 2) {
    echo "Erro: a sala de prova selecionada está lotada. ";
}
else {
    $insertStmt = "INSERT INTO fiscais (nome, cpf, salaDeProva) VALUES ('$nome', '$cpf', '$sala')";
    if ($conn->query($insertStmt) === TRUE) {
        echo "Fiscal inserido com sucesso!";
    } else {
        echo "Erro ao inserir fiscal: " . $conn->error;
    }
}

$conn->close();
?>
