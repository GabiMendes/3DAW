<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cpf = $_POST["cpf"];
    $arqDisc = fopen("cadastros.txt", "r") or die("Erro ao abrir o arquivo de cadastro.");
    $linha = fgets($arqDisc);
    $encontrado = false;
    while (!feof($arqDisc) && !$encontrado) {
        $linha = fgets($arqDisc);
        $dados = explode(";", $linha);
        if (isset($dados[1]) && $dados[1] == $cpf) {
            $encontrado = true;
        }
    }
    fclose($arqDisc);

    if ($encontrado) {
        echo "<h2>Dados do aluno:</h2>";
        echo "Nome: " . $dados[0] . "<br>";
        echo "CPF: " . $dados[1] . "<br>";
        echo "Username: " . $dados[2] . "<br>";
        echo "Data de Ingresso: " . $dados[3] . "<br><br>";
        echo "<form action='remover_USUARIO.php' method='POST'>";
        echo "<input type='hidden' name='cpf' value='" . $dados[1] . "'>";
        echo "<input type='submit' value='Confirmar Remoção' name='remover'>";
        echo "</form>";
    } else {
        echo "<h2>Aluno não encontrado.</h2>";
    }
}

if (isset($_POST["remover"])) {
    $cpf = $_POST["cpf"];
    $arqDisc = fopen("cadastros.txt", "r") or die("Erro ao abrir o arquivo de cadastro.");
    $temp = fopen("temp.txt", "w") or die("Erro ao criar arquivo temporário.");
    while (!feof($arqDisc)) {
        $linha = fgets($arqDisc);
        $dados = explode(";", $linha);
        if (isset($dados[1]) && $dados[1] != $cpf) {
            fwrite($temp, $linha);
        }
    }
    fclose($arqDisc);
    fclose($temp);
    unlink("cadastros.txt");
    rename("temp.txt", "cadastros.txt");
    echo "<h2>Usuário removido com sucesso.</h2>";
}
?>

<form action="index.php">
    <br>
    <br>
	    <input type="submit" value="Sair">
	</form>