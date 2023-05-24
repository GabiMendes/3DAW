<!DOCTYPE html>
<html>
<head>
  <style>
    body {
      font-family: "Arial", sans-serif;
      background-color: #f2f2f2;
      margin: 0;
      padding: 0;
    }

    h2 {
      text-align: center;
      color: #6c63ff;
    }

    form {
      width: 300px;
      margin: 0 auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 6px;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
    }

    label {
      display: block;
      margin-bottom: 10px;
      color: #6c63ff;
    }

    input[type="text"],
    input[type="password"],
    input[type="submit"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 30px;
      box-sizing: border-box;
    }

    input[type="submit"] {
      background-color: #6c63ff;
      color: #fff;
      cursor: pointer;
      transition: background-color 0.3s ease;
      border-radius: 30px;
    }

    input[type="submit"]:hover {
      background-image: linear-gradient(45deg, #6c63ff, #ff9b4e);
    }

    input[type="submit"]:focus {
      outline: none;
    }

    input[type="submit"]:active {
      background-color: #4c256f;
    }

    input[type="submit"]:disabled {
      background-color: #cccccc;
      cursor: not-allowed;
    }

    input[type="submit"]:disabled:hover {
      background-color: #cccccc;
    }

    .select-dropdown {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 4px;
      background-color: #fff;
      color: #333;
      font-size: 14px;
    }

    .select-dropdown:focus {
      outline: none;
      border-color: #6c63ff;
    }

    .select-dropdown option {
      padding: 8px;
      background-color: #fff;
      color: #333;
    }

    .select-dropdown option:hover {
      background-color: #f2f2f2;
    }

    .select-dropdown option:selected {
      font-weight: bold;
      color: #663399;
    }

    p {
      display: block;
      margin-bottom: 10px;
      color: #6c63ff;
    }
  </style>
  <title>Alterar Discursiva</title>
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero = $_POST["numero"];
    $arqDisc = fopen("perguntasdiscursivas.txt", "r") or die("Erro ao abrir o arquivo.");
    $encontrado = false;
    while (!feof($arqDisc) && !$encontrado) {
      $linha = fgets($arqDisc);
      $dados = explode(";", $linha);
      if (isset($dados[0]) && $dados[0] == $numero) {
          $encontrado = true;
          break;
      }
  }
  fclose($arqDisc);

    if ($encontrado) {
        
        if (isset($_POST["salvar"])) {
          $numero = $_POST["numero"];
            $pergunta = $_POST["pergunta"];
            $gabarito = $_POST["gabarito"];

            $arqDisc = fopen("perguntasdiscursivas.txt", "r") or die("Erro ao abrir o arquivo.");
            $temp = fopen ("temp.txt", "w") or die("Erro ao abrir o arquivo.");
            
            while (!feof($arqDisc))
            {
                $linha = fgets($arqDisc);
                $dados = explode(";", $linha);
                if (isset($dados[0]) && $dados[0] == $numero) {
                    $novaLinha = $numero . ";" . $pergunta . ";" . $gabarito;
                    fwrite($temp, $novaLinha . "\n");
                }
                else {
                    fwrite($temp, $linha);
                }
            }
            fclose($arqDisc);
            fclose($temp);
            unlink("perguntasdiscursivas.txt");
            rename("temp.txt", "perguntasdiscursivas.txt");
            echo "<h2>Pergunta alterada com sucesso.</h2>";
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
    <h2>Alterar Discursiva</h2>
    <form action="alterar_DISCURSIVA.php" method="POST">
        <label for="numero">Número:</label>
        <select class="select-dropdown" name="numero" id="numero">
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
