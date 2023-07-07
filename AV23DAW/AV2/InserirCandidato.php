<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $rg = $_POST["rg"];
    $email = $_POST["email"];
    $cargo = $_POST["cargo"];
    $sala = $_POST["sala"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "av2";
    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    $countStmt = $conn->prepare("SELECT COUNT(*) as total FROM candidatos WHERE salaDeProva = ?");
    $countStmt->bind_param("i", $sala);
    $countStmt->execute();
    $countResult = $countStmt->get_result();
    $countRow = $countResult->fetch_assoc();
    $totalCandidatos = $countRow["total"];

    if ($totalCandidatos >= 50) {
        echo "Erro: a sala de prova selecionada está lotada.";
    } else {
        $insertStmt = $conn->prepare("INSERT INTO candidatos (nome, cpf, identidade, email, cargo, salaDeProva) VALUES (?, ?, ?, ?, ?, ?)");
        $insertStmt->bind_param("sssssi", $nome, $cpf, $rg, $email, $cargo, $sala);

        if ($insertStmt->execute()) {
            echo "Candidato inserido com sucesso!";
        }
        else {
            echo "Erro na inserção do candidato: " . $insertStmt->error;
        }

        $insertStmt->close();
    }

    $countStmt->close();
    $conn->close();
}
?>
