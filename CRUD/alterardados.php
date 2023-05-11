<!DOCTYPE html>
<html>
<head>
	<title>Alterar Dados</title>
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $matricula = $_POST["matricula"];
    $arqDisc = fopen("cadastros.txt", "r") or die("Erro ao abrir o arquivo de cadastro.");
    $linha = fgets($arqDisc);
    $encontrado = false;
    while (!feof($arqDisc) && !$encontrado) {
        $linha = fgets($arqDisc);
        $dados = explode(";", $linha);
        if (isset($dados[2]) && $dados[2] == $matricula) {
            $encontrado = true;
        }
    }
    fclose($arqDisc);

    if ($encontrado) {
        // Mostrar os dados do aluno e permitir a alteração
        echo "<h2>Dados do aluno:</h2>";
        echo "<form method='POST' action='alterardados.php'>";
        echo "<input type='hidden' name='matricula' value='" . $dados[2] . "'>";
        echo "Nome: <input type='text' name='nome' value='" . $dados[0] . "'><br>";
        echo "CPF: <input type='text' name='cpf' value='" . $dados[1] . "'><br>";
        echo "Data Ingresso: <input type='text' name='dtingresso' value='" . $dados[3] . "'><br>";
        echo "<input type='submit' value='Salvar Alterações' name='salvar'>";
        echo "</form>";
    } else {
        echo "<h2>Aluno não encontrado.</h2>";
    }
}

if (isset($_POST["salvar"])) {
    $matricula = $_POST["matricula"];
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $dtIngresso = $_POST["dtingresso"];

    $arqDisc = fopen("cadastros.txt", "r") or die("Erro ao abrir o arquivo de cadastro.");
    $temp = fopen("temp.txt", "w") or die("Erro ao criar arquivo temporário.");
    while (!feof($arqDisc)) {
        $linha = fgets($arqDisc);
        $dados = explode(";", $linha);
        if (isset($dados[2]) && $dados[2] == $matricula) {
            $novaLinha = $nome . ";" . $cpf . ";" . $matricula . ";" . $dtIngresso;
            fwrite($temp, $novaLinha . "\n");
        } else {
            fwrite($temp, $linha);
        }
    }
    fclose($arqDisc);
    fclose($temp);
    unlink("cadastros.txt");
    rename("temp.txt", "cadastros.txt");
    echo "<h2>Aluno alterado com sucesso.</h2>";
}
?>
<form action="index.php">
    <input type="submit" value="Voltar ao menu principal">
</form>
</body>
</html>