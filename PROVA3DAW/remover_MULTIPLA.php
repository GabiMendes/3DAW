<!DOCTYPE html>
<html>
<head>
    <title>Remover Múltipla-Escolha</title>
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["numero"])) {
        $numero = $_POST["numero"];
        $arqMultipla = fopen("perguntasmultipla.txt", "r") or die("Erro ao abrir o arquivo.");
        $temp = fopen("temp.txt", "w") or die("Erro ao criar arquivo temporário.");
        $encontrado = false;
        $perguntaRemover = "";

        while (!feof($arqMultipla)) {
            $linha = fgets($arqMultipla);
            $dados = explode(";", $linha);

            if (isset($dados[0]) && $dados[0] == $numero) {
                $encontrado = true;
                $perguntaRemover = $linha;
                continue;
            }

            fwrite($temp, $linha);
        }

        fclose($arqMultipla);
        fclose($temp);

        if ($encontrado) {
            if (!isset($_POST["confirmacao"])) {
                echo "<h2>Confirmação de Remoção:</h2>";
                echo "<p>Dados da pergunta a ser removida:</p>";
                echo "<p>$perguntaRemover</p>";
                echo "<form method='POST' action='remover_MULTIPLA.php'>";
                echo "<input type='hidden' name='numero' value='$numero'>";
                echo "<input type='hidden' name='confirmacao' value='true'>";
                echo "<input type='submit' value='Confirmar Remoção' name='remover'>";
                echo "</form>";
                echo "<form action='UsuarioLogado.php'>";
                echo "<br><br>";
                echo "<input type='submit' value='Cancelar'>";
                echo "</form>";
            } else {
                $arqMultipla = fopen("perguntasmultipla.txt", "w") or die("Erro ao abrir o arquivo.");
                fwrite($arqMultipla, file_get_contents("temp.txt"));
                fclose($arqMultipla);
                unlink("temp.txt");
                echo "<h2>Pergunta removida com sucesso.</h2>";
            }
        } else {
            echo "<h2>Pergunta não encontrada.</h2>";
        }
        ?>
        <form action="UsuarioLogado.php">
        <br>
        <br>
        <input type="submit" value="Voltar ao menu principal">
        </form>
        <?php
    }
} else {
?>
<h1>Remover Múltipla Escolha</h1>
<form action="remover_MULTIPLA.php" method="POST">
    <label for="numero">Número:</label>
    <select name="numero" id="numero">
        <?php
        $arqMultipla = fopen("perguntasmultipla.txt", "r") or die("Erro ao abrir o arquivo.");

        while (!feof($arqMultipla)) {
            $linha = fgets($arqMultipla);
            $dados = explode(";", $linha);
            if (isset($dados[0]) && $dados[0] !== "") {
                echo "<option value='" . $dados[0] . "'>" . $dados[0] . "</option>";
            }
        }

        fclose($arqMultipla);
        ?>
    </select>
    <br>
    <input type="submit" value="Buscar" name="buscar">
</form>
<br>
<form action="UsuarioLogado.php">
    <br>
    <br>
    <input type="submit" value="Voltar ao menu principal">
</form>
<?php
}
?>
</body>
</html>
