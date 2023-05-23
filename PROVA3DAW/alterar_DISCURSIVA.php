<!DOCTYPE html>
<html>
<head>
    <title>Alterar Discursiva</title>
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero = $_POST["numero"];
    $arqDisc = fopen("perguntasdiscursivas.txt", "r") or die("Erro ao abrir o arquivo.");
    $linha = fgets($arqDisc);
    $encontrado = false;
    while (!feof($arqDisc) && !$encontrado) {
        $linha = fgets($arqDisc);
        $dados = explode(";", $linha);
        if (isset($dados[0]) && $dados[0] == $numero) {
            $encontrado = true;
        }
    }
    fclose($arqDisc);

    if ($encontrado) {
        
        if (isset($_POST["salvar"])) {
            
            echo "<h2>ALTERADA COM SUCESSO</h2>";
        } else {
            echo "<h2>Alterar pergunta:</h2>";
            echo "<form method='POST' action='alterar_DISCURSIVA.php'>";
            echo "<input type='hidden' name='numero' value='" . $dados[0] . "'>";
            echo "Pergunta: <input type='text' name='pergunta' value='" . $dados[1] . "'><br>";
            echo "Gabarito: <input type='text' name='gabarito' value='" . $dados[2] . "'><br>";
            echo "<input type='submit' value='Salvar Alterações' name='salvar'>";
            echo "</form>";
        }
    } else {
        echo "<h2>Pergunta não encontrada.</h2>";
    }
}
?>

<?php
if (!isset($_POST["buscar"]) && !isset($_POST["salvar"])) { 
    ?>
    <h1>Alterar Discursiva</h1>
    <form action="alterar_DISCURSIVA.php" method="POST">
        <label for="numero">Número:</label>
        <select name="numero" id="numero">
            <?php
                $arqDisc = fopen("perguntasdiscursivas.txt", "r") or die("Erro ao abrir o arquivo.");
                $linha = fgets($arqDisc);
                while (!feof($arqDisc)) {
                    $linha = fgets($arqDisc);
                    $dados = explode(";", $linha);
                    if (isset($dados[0]) && $dados[0] !== "") {
                        echo "<option value='" . $dados[0] . "'>" . $dados[0] . "</option>";
                    }
                }

                fclose($arqDisc);
            ?>
        </select>
        <br>
        <input type="submit" value="Buscar" name="buscar">
    </form>
    <?php
}
?>

<br>

<form action="UsuarioLogado.php">
    <br>
    <br>
    <input type="submit" value="Voltar ao menu principal">
</form>

</body>
</html>
