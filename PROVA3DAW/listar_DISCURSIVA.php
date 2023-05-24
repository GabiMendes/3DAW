<?php
$perguntaId = isset($_GET['id']) ? $_GET['id'] : '';

function lerPergunta($arquivo, $id)
{
    $arq = fopen($arquivo, "r") or die("Erro ao abrir o arquivo");

    while (($linha = fgets($arq)) !== false) {
        $dados = explode(";", $linha);
        $numero = trim($dados[0]);

        if ($numero == $id) {
            fclose($arq);
            return $dados;
        }
    }

    fclose($arq);
    return false;
}

function exibirDetalhes($perguntaId, $dados)
{
    if ($dados === false) {
        echo "Pergunta não encontrada.";
    } else {
        $numero = $dados[0];
        $pergunta = $dados[1];
        $gabarito = $dados[count($dados) - 2];
//        $alternativas = array_slice($dados, 2, count($dados) - 4);

        echo "<h2>Detalhes da pergunta $numero:</h2>";
        echo "<p>Pergunta: $pergunta</p>";

//        if (!empty($alternativas)) {
//            echo "<p>Alternativas:</p>";
//            echo "<ul>";
//            foreach ($alternativas as $alternativa) {
//                echo "<li>$alternativa</li>";
//            }
//            echo "</ul>";
//        }

        echo "<p>Gabarito: $gabarito</p>";
    }
}

$arquivoTexto = "perguntasdiscursivas.txt";

?>

<!DOCTYPE html>
<html>
<head>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      color: #333;
      margin: 0;
      padding: 20px;
    }

    h1,
    h2 {
      color: #6c63ff;
      text-align: center;
    }

    form {
      max-width: 400px;
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

    select,
    input[type="submit"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    .select-dropdown {
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

    ul {
      list-style: none;
      padding: 0;
      margin-bottom: 15px;
    }

    li {
      margin-bottom: 5px;
    }

    form[action="listarPergunta.php"] {
      text-align: center;
    }

    input[type="submit"] {
      background-color: #6c63ff;
      border: 1px solid #ccc;
      border-radius: 30px;
      margin-bottom: 15px;
      color: #fff;
      cursor: pointer;
      transition: background-color 0.3s ease;
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
  </style>
</head>
<body>
    <h1>Listar Pergunta Única - Discursiva</h1>
    <form action="listar_DISCURSIVA.php" method="GET">
        <label for="id">ID da pergunta:</label>
        <select class="select-dropdown" name="id" id="id">
            <?php
            $arq = fopen($arquivoTexto, "r") or die("Erro ao abrir o arquivo");
            fgets($arq);
            while (($linha = fgets($arq)) !== false) {
                $dados = explode(";", $linha);
                $numero = trim($dados[0]);

                echo "<option value=\"$numero\">$numero</option>";
            }

            fclose($arq);
            ?>
        </select>
        <br>
        <br>
        <input type="submit" value="Buscar">
    </form>
    <br>

    <?php
    if (!empty($perguntaId)) {
        $dadosPergunta = lerPergunta($arquivoTexto, $perguntaId);
        exibirDetalhes($perguntaId, $dadosPergunta);
    }
    ?>

    <form action="listarPergunta.php">
        <br>
        <input type="submit" value="Voltar">
    </form>

</body>
</html>
