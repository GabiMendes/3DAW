<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $matricula = $_POST["matricula"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $cpf = $_POST["cpf"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cadastros";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conn->connect_error);
    }

    $sql = "INSERT INTO cadastros (Nome, Matrícula, `E-mail`, CPF)
            VALUES ('$nome', $matricula, '$email', $cpf)";

    if ($conn->query($sql) === TRUE) {
        echo "Aluno inserido com sucesso!";
    } else {
        echo "Erro ao inserir aluno: " . $conn->error;
    }

    $conn->close();
}
?>
