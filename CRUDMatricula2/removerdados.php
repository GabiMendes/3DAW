<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $matricula = $_POST["matricula"];
    $arqDisc = fopen("cadastros.txt", "r") or die("Erro ao abrir o arquivo de cadastro.");
    $linha = fgets($arqDisc);
    $encontrado = false;
    while (!feof($arqDisc) && !$encontrado) {
        $linha = fgets($arqDisc);
        $dados = explode(";", $linha);
        if ($dados[2] == $matricula) {
            $encontrado = true;
        }
    }
    fclose($arqDisc);

    if ($encontrado) {
        // Mostrar os dados do aluno e confirmar a remoção
        echo "<h2>Dados do aluno:</h2>";
        echo "Nome: " . $dados[0] . "<br>";
        echo "Matrícula: " . $dados[2] . "<br>";
        echo "CPF: " . $dados[1] . "<br>";
        echo "Data de Ingresso: " . $dados[3] . "<br><br>";
        echo "<form action='removerdados.php' method='POST'>";
        echo "<input type='hidden' name='matricula' value='" . $dados[2] . "'>";
        echo "<input type='submit' value='Confirmar Remoção' name='remover'>";
        echo "</form>";
    } else {
        echo "<h2>Aluno não encontrado.</h2>";
    }
}

if (isset($_POST["remover"])) {
    $matricula = $_POST["matricula"];
    $arqDisc = fopen("cadastros.txt", "r") or die("Erro ao abrir o arquivo de cadastro.");
    $temp = fopen("temp.txt", "w") or die("Erro ao criar arquivo temporário.");
    while (!feof($arqDisc)) {
        $linha = fgets($arqDisc);
        $dados = explode(";", $linha);
        if ($dados[2] != $matricula) {
            fwrite($temp, $linha);
        }
    }
    fclose($arqDisc);
    fclose($temp);
    unlink("cadastros.txt");
    rename("temp.txt", "cadastros.txt");
    echo "<h2>Aluno removido com sucesso.</h2>";
}
?>
</body>
</html>