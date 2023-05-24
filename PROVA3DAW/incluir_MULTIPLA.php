<?php

$Pergunta = "";
$AlternativaA = "";
$AlternativaB = "";
$AlternativaC = "";
$AlternativaD = "";
$RespostaEscolhida = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Pergunta = $_POST["Pergunta"];
    $AlternativaA = $_POST["AlternativaA"];
    $AlternativaB = $_POST["AlternativaB"];
    $AlternativaC = $_POST["AlternativaC"];
    $AlternativaD = $_POST["AlternativaD"];
    $RespostaEscolhida = $_POST["RespostaEscolhida"];

    if (!file_exists("perguntasmultipla.txt")) {
        $arqDisc = fopen("perguntasmultipla.txt", "w") or die("Erro ao criar o arquivo");
        $linha = "Número;Pergunta;Alternativa A;Alternativa B;Alternativa C;Alternativa D;Gabarito;\n";
        fwrite($arqDisc, $linha);
        fclose($arqDisc);
    }

    $arqDisc = fopen("perguntasmultipla.txt", "r") or die("Erro ao abrir o arquivo");
    $ultimoNumero = 0;
    while (($linha = fgets($arqDisc)) !== false) {
        $dados = explode(";", $linha);
        $numero = intval($dados[0]);
        if ($numero > $ultimoNumero) {
            $ultimoNumero = $numero;
        }
    }
    fclose($arqDisc);

    $proximoNumero = $ultimoNumero + 1;

    if (!isset($_POST["confirmacao"])) {
        echo "<h2>Confirmação de Inclusão:</h2>";
        echo "<p>Dados da pergunta a ser incluída:</p>";
        echo "<p>Pergunta: $Pergunta</p>";
        echo "<p>Alternativa A: $AlternativaA</p>";
        echo "<p>Alternativa B: $AlternativaB</p>";
        echo "<p>Alternativa C: $AlternativaC</p>";
        echo "<p>Alternativa D: $AlternativaD</p>";
        echo "<p>Resposta Escolhida: $RespostaEscolhida</p>";
        echo "<form method='POST' action='incluir_MULTIPLA.php'>";
        echo "<input type='hidden' name='Pergunta' value='$Pergunta'>";
        echo "<input type='hidden' name='AlternativaA' value='$AlternativaA'>";
        echo "<input type='hidden' name='AlternativaB' value='$AlternativaB'>";
        echo "<input type='hidden' name='AlternativaC' value='$AlternativaC'>";
        echo "<input type='hidden' name='AlternativaD' value='$AlternativaD'>";
        echo "<input type='hidden' name='RespostaEscolhida' value='$RespostaEscolhida'>";
        echo "<input type='hidden' name='confirmacao' value='true'>";
        echo "<input type='submit' value='Confirmar Inclusão' name='incluir'>";
        echo "</form>";
        echo "<form action='index_logado.php'>";
        echo "<br><br>";
        echo "<input type='submit' value='Cancelar'>";
        echo "</form>";
    } else {
        $arqDisc = fopen("perguntasmultipla.txt", "a") or die("Erro ao abrir o arquivo");
        $linha = $proximoNumero . ";" . $Pergunta . ";" . $AlternativaA . ";" . $AlternativaB . ";" . $AlternativaC . ";" . $AlternativaD . ";" . $RespostaEscolhida . ";" . "\n";
        fwrite($arqDisc, $linha);
        fclose($arqDisc);
        echo "<h2>Pergunta incluída com sucesso.</h2>";
    }
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
</head>
<body>
    <h2>Incluir</h2>
    <form action="incluir_MULTIPLA.php" method="POST">
        <label for="Pergunta">Pergunta:</label>
        <input type="text" name="Pergunta" id="Pergunta">
        <br>
        <br>
        <label for="AlternativaA">Alternativa A:</label>
        <input type="text" name="AlternativaA" id="AlternativaA">
        <br>
        <br>
        <label for="AlternativaB">Alternativa B:</label>
        <input type="text" name="AlternativaB" id="AlternativaB">
        <br>
        <br>
        <label for="AlternativaC">Alternativa C:</label>
        <input type="text" name="AlternativaC" id="AlternativaC">
        <br>
        <br>
        <label for="AlternativaD">Alternativa D:</label>
        <input type="text" name="AlternativaD" id="AlternativaD">
        <br>
        <br>
        <label for="RespostaEscolhida">Opções de Resposta:</label>
        <select class="select-dropdown" name="RespostaEscolhida" id="RespostaEscolhida">
            <option value="A">Opção A</option>
            <option value="B">Opção B</option>
            <option value="C">Opção C</option>
            <option value="D">Opção D</option>
        </select>
        <br>
        <br>
        <input type="submit" value="Incluir Pergunta">
    </form>
    <br>

    <form action="UsuarioLogado.php">
        <br>
        <br>
        <input type="submit" value="Voltar ao menu principal">
    </form>
    
</body>
</html>
