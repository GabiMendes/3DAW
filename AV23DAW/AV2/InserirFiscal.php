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

$countSalaStmt = $conn->prepare("SELECT COUNT(*) as sala_exist FROM salas WHERE id = ?");
$countSalaStmt->bind_param("i", $sala);
$countSalaStmt->execute();
$countSalaResult = $countSalaStmt->get_result();
$countSalaRow = $countSalaResult->fetch_assoc();
$salaExists = $countSalaRow["sala_exist"];

if ($salaExists == 0) {
    echo "Erro: a sala de prova selecionada não existe.";
} elseif ($totalFiscais >= 2) {
    echo "Erro: a sala de prova selecionada está lotada.";
} else {
    $insertStmt = $conn->prepare("INSERT INTO fiscais (nome, cpf, salaDeProva) VALUES (?, ?, ?)");
    $insertStmt->bind_param("ssi", $nome, $cpf, $sala);

    if ($insertStmt->execute()) {
        echo "Fiscal inserido com sucesso!";
    } else {
        echo "Erro ao inserir fiscal: " . $insertStmt->error;
    }

    $insertStmt->close();
}

$countStmt->close();
$countSalaStmt->close();
$conn->close();
?>
