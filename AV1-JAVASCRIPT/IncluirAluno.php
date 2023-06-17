<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $matricula = $_POST["matricula"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $cpf = $_POST["cpf"];

    if (!file_exists("cadastros.txt")) {
    
        $cabecalho = "nome;matricula;email;cpf\n";
        file_put_contents("cadastros.txt", $cabecalho);

    }
    $txt = $nome . ";" . $matricula . ";" . $email . ";" . $cpf . "\n";
    file_put_contents("cadastros.txt", $txt, FILE_APPEND);
    echo "Aluno inserido com sucesso!";
}
?>
