<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $matricula = $_GET["matricula"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cadastros";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conn->connect_error);
    }

    $sql = "DELETE FROM cadastros WHERE Matrícula = $matricula";

    if ($conn->query($sql) === TRUE) {
        echo "Aluno excluído com sucesso!";
    } else {
        echo "Erro ao excluir aluno: " . $conn->error;
    }

    $conn->close();
}
?>
