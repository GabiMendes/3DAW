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
    $database = "candidatos";
    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO candidatos (nome, cpf, rg, email, cargo, salaDeProva) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssi", $nome, $cpf, $rg, $email, $cargo, $sala);

    if ($stmt->execute()) {
        echo "Candidato inserido com sucesso!";
    } else {
        echo "Erro na inserção do candidato: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
