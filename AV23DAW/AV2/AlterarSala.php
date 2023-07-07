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

$selectStmt = $conn->prepare("SELECT salaDeProva FROM candidatos WHERE id = ?");
$selectStmt->bind_param("i", $id);
$selectStmt->execute();
$selectResult = $selectStmt->get_result();
$candidatoRow = $selectResult->fetch_assoc();

if ($candidatoRow) {
    $sala = $candidatoRow["salaDeProva"];

    $countSalaStmt = $conn->prepare("SELECT COUNT(*) as sala_exist FROM salas WHERE id = ?");
    $countSalaStmt->bind_param("i", $novaSala);
    $countSalaStmt->execute();
    $countSalaResult = $countSalaStmt->get_result();
    $countSalaRow = $countSalaResult->fetch_assoc();
    $salaExists = $countSalaRow["sala_exist"];

    if ($salaExists == 0) {
        echo "Erro: a sala de prova selecionada não existe.";
    } else {
        $updateStmt = $conn->prepare("UPDATE candidatos SET salaDeProva = ? WHERE id = ?");
        $updateStmt->bind_param("si", $novaSala, $id);

        if ($updateStmt->execute()) {
            echo "Sala de prova alterada com sucesso!";
        } else {
            echo "Erro ao alterar sala de prova: " . $updateStmt->error;
        }

        $updateStmt->close();
    }

    $countSalaStmt->close();
} else {
    echo "Erro: o candidato não foi encontrado.";
}

$selectStmt->close();
$conn->close();
?>
