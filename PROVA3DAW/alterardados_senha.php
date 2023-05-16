<!DOCTYPE html>
<html>
<head>
	<title>Esqueci a senha!</title>
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $arqDisc = fopen("cadastros.txt", "r") or die("Erro ao abrir o arquivo de cadastro.");
    $linha = fgets($arqDisc);
    $encontrado = false;
    while (!feof($arqDisc) && !$encontrado) {
        $linha = fgets($arqDisc);
        $dados = explode(";", $linha);
        if (isset($dados[2]) && $dados[2] == $username) {
            $encontrado = true;
        }
    }
    fclose($arqDisc);

    if ($encontrado) {
        // Mostrar os dados do aluno e permitir a alteração
        echo "<h2>Nova senha:</h2>";
        echo "<form method='POST' action='alterardados_senha.php'>";
        echo "<input type='hidden' name='username' value='" . $dados[2] . "'>";
        echo "<input type='hidden' name='nome' value='" . $dados[0] . "'>";
        echo "<input type='hidden' name='cpf' value='" . $dados[1] . "'>";
        echo "Senha: <input type='text' name='senha' value='" . $dados[3] . "'><br>";
        echo "<input type='submit' value='Salvar Alterações' name='salvar'>";
        echo "</form>";
    } else {
        echo "<h2>Usuário não encontrado.</h2>";
    }
}

if (isset($_POST["salvar"])) {
    $username = $_POST["username"];
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $senha = $_POST["senha"];

    $arqDisc = fopen("cadastros.txt", "r") or die("Erro ao abrir o arquivo de cadastro.");
    $temp = fopen("temp.txt", "w") or die("Erro ao criar arquivo temporário.");
    while (!feof($arqDisc)) {
        $linha = fgets($arqDisc);
        $dados = explode(";", $linha);
        if (isset($dados[2]) && $dados[2] == $username) {
            $novaLinha = $nome . ";" . $cpf . ";" . $username . ";" . $senha;
            fwrite($temp, $novaLinha . "\n");
        } else {
            fwrite($temp, $linha);
        }
    }
    fclose($arqDisc);
    fclose($temp);
    unlink("cadastros.txt");
    rename("temp.txt", "cadastros.txt");
    echo "<h2>Senha alterada com sucesso.</h2>";
}
?>
<form action="index_usuario.php">
    <input type="submit" value="Voltar ao menu principal">
</form>
</body>
</html>