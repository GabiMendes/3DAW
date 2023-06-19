<?php
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cadastros";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conn->connect_error);
    }

    $sql = "SELECT Matrícula, Nome, `E-mail`, CPF FROM cadastros";
    $result = $conn->query($sql);

    $alunos = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $aluno = array(
                "matricula" => $row["Matrícula"],
                "nome" => $row["Nome"],
                "email" => $row["E-mail"],
                "cpf" => $row["CPF"]
            );
            $alunos[] = $aluno;
        }
    }

    $conn->close();

    header("Content-Type: application/json");
    echo json_encode($alunos);
}
?>
