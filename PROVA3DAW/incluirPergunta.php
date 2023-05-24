<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipoPergunta = $_POST["tipo"];

    if ($tipoPergunta == "discursiva") {
        header("Location: incluir_DISCURSIVA.php");
    } elseif ($tipoPergunta == "multipla") {
        header("Location: incluir_MULTIPLA.php");
    } else {
        echo "<h2>Tipo de pergunta inválido.</h2>";
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
  </style>
    <title>Incluir Dados da Pergunta</title>
</head>
<body>
    <h2>Incluir Dados da Pergunta</h2>
    <form method="POST" action="incluirPergunta.php">
        <label for="tipo">Selecione o tipo de pergunta:</label>
        <select class="select-dropdown" name="tipo" id="tipo">
            <option value="discursiva">Discursiva</option>
            <option value="multipla">Múltipla Escolha</option>
        </select>
        <br>
        <br>
        <input type="submit" value="Avançar" name="avancar">
    </form>
    <br>
    <form action="UsuarioLogado.php">
        <br>
        <br>
        <input type="submit" value="Voltar ao menu principal">
    </form>
</body>
</html>
