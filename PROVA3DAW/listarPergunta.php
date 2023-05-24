<?php
$tipoPergunta = isset($_GET['tipo']) ? $_GET['tipo'] : '';

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
        $alternativas = array_slice($dados, 2, count($dados) - 4);

        echo "<h2>Detalhes da pergunta $numero:</h2>";
        echo "<p>Pergunta: $pergunta</p>";

        if (!empty($alternativas)) {
            echo "<p>Alternativas:</p>";
            echo "<ul>";
            foreach ($alternativas as $alternativa) {
                echo "<li>$alternativa</li>";
            }
            echo "</ul>";
        }

        echo "<p>Gabarito: $gabarito</p>";
    }
}

$arquivoMultipla = "perguntasmultipla.txt";
$arquivoTexto = "perguntasdiscursivas.txt";

if ($tipoPergunta == 'discursiva' || $tipoPergunta == 'multipla') {
    $tipoPergunta = strtoupper($tipoPergunta);
    header("Location: listar_" . $tipoPergunta . ".php");
    exit;
}
?>

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

    h1 {
      text-align: center;
      color: #6c63ff;
      font-size: 28px;
      padding: 20px;
      margin-bottom: 10px;
    }

    .btn-container {
      text-align: center;
    }

    .btn {
      display: inline-block;
      text-align: center;
      color: #fff;
      background-color: #6c63ff;
      padding: 12px 30px;
      margin: 5px;
      font-size: 16px;
      text-decoration: none;
      border-radius: 30px;
      transition: background-color 0.3s ease;
    }

    .btn:hover {
      background-image: linear-gradient(45deg, #6c63ff, #ff9b4e);
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
  </style>
</head>

<body>
  <h1>Listar Pergunta Única</h1>
  <form action="listarPergunta.php" method="GET">
    <label for="tipo">Tipo de pergunta:</label>
    <select class="select-dropdown" name="tipo" id="tipo">
      <option value="discursiva">Discursiva</option>
      <option value="multipla">Múltipla Escolha</option>
    </select>
    <br>
    <br>
    <input type="submit" value="Selecionar">
  </form>
  <br>

  <form action="UsuarioLogado.php">
    <br>
    <br>
    <input type="submit" value="Voltar ao menu principal">
  </form>

</body>

</html>
