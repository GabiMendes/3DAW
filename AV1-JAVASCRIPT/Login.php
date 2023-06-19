<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $matricula = $_POST["matricula"];
    $cpf = $_POST["cpf"];

    function validarLogin($matricula, $cpf) {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "cadastros";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Falha na conexão com o banco de dados: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM cadastros WHERE Matrícula = '$matricula' AND CPF = '$cpf'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $conn->close();
            return true;
        } else {
            $conn->close();
            return false;
        }
    }

    if (validarLogin($matricula, $cpf)) {
        http_response_code(401);
    } else {
        http_response_code(200);
    }
}
?>
