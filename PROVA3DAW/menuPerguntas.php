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
  </style>
</head>

<body>
  <h1>PROVA3DAW - MENU DE PERGUNTAS</h1>

  <div class="btn-container">
    <a href="incluirPergunta.php" class="btn">Cadastrar Pergunta</a>

    <a href="alterarPergunta.php" class="btn">Alterar Pergunta</a>

    <a href="removerPergunta.php" class="btn">Remover Pergunta</a>

    <a href="listarPergunta.php" class="btn">Buscar pergunta específica</a>

    <h2>Banco de Perguntas:</h2>

    <a href="listarDiscursivas.php" class="btn">Discursivas</a>
    <a href="listarMultiplas.php" class="btn">Múltiplas-Escolhas</a>
  </div>
  <br>

  <br>

  <form action="UsuarioLogado.php">
    <br>
    <br>
    <input type="submit" value="Voltar ao menu principal">
  </form>

</body>

</html>