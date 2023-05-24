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
  </style>
</head>

<body>
  <h1>USUÁRIO LOGADO</h1>

  <div class="btn-container">
    <a href="menuPerguntas.php" class="btn">Página de Perguntas</a>
    <a href="removerUsuario.php" class="btn">Deletar meu Cadastro</a>
    <a href="index.php" class="btn">Sair</a>
  </div>
  <br>
</body>

</html>