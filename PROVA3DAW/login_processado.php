<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $senha = $_POST["senha"];

    $cadastros = file("cadastros.txt");
    if ($cadastros !== false) {

        foreach ($cadastros as $linha) {
            $campos = explode(";", $linha);
            if ($campos[2] == $username && $campos[3] == $senha) {
                header("Location: index_logado.php");
                exit;
            }
        }
    } else {
        echo "Erro ao ler o arquivo de cadastros.";
    }

    echo "Credenciais inválidas. Tente novamente.";
}
?>

<form action="index_usuario.php">
    <br>
    <br>
    <input type="submit" value="Voltar ao menu principal">
</form>
