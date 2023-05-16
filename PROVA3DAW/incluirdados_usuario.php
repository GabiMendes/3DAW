<?php

$nome = "";
$cpf = "";
$username = "";
$senha= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $username = $_POST["username"];
    $senha = $_POST["senha"];
    $linha = "";
    echo "nome: " . $nome . " cpf: " . " username: " . $username . "senha: " . $senha;
    if (!file_exists("cadastros.txt")) {
        $arqDisc = fopen("cadastros.txt","w") or die("erro ao criar arquivo");
        $linha = "nome;cpf;username;senha\n";
        fwrite($arqDisc,$linha);
        fclose($arqDisc);
    }
    $arqDisc = fopen("cadastros.txt","a") or die("erro ao criar arquivo");
    $linha = $nome . ";" . $cpf . ";" . $username . ";" . $senha . "\n";
    fwrite($arqDisc,$linha);
    fclose($arqDisc);
}

?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<h1>Incluir</h1>
	<form action="incluirdados_usuario.php" method="POST">
	    <label for="nome">Nome:</label>
	    <input type="text" name="nome" id="nome">
	    <label for="cpf">CPF:</label>
	    <input type="text" name="cpf" id="cpf">
	    <label for="username">Username:</label>
	    <input type="text" name="username" id="username">
	    <label for="senha">Senha:</label>
	    <input type="text" name="senha" id="senha">
	    <input type="submit" value="Incluir Cadastro">
	</form>
	<br>

	<form action="index_usuario.php">
    <br>
    <br>
	    <input type="submit" value="Voltar ao menu principal">
	</form>
	
</body>
</html>
