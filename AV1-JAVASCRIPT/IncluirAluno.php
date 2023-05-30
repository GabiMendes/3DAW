<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $matricula = $_GET["matricula"];
    $nome = $_GET["nome"];
    $email = $_GET["email"];
    $cpf = $_GET["cpf"];

    if (!file_exists("cadastros.txt")) {
        $cabecalho = "nome;matricula;email;cpf\n";
        file_put_contents("cadastros.txt", $cabecalho);
    }
    $txt = $nome . ";" . $matricula . ";" . $email . ";" . $cpf . "\n";
    file_put_contents("cadastros.txt", $txt, FILE_APPEND);
    echo "Aluno inserido com sucesso!";
}

?>