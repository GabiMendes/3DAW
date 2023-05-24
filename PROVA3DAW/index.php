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
  <h1>PROVA3DAW - MENU PRINCIPAL</h1>

  <div class="btn-container">
    <a href="login.php" class="btn">Login</a>
    <a href="incluirUsuario.php" class="btn">Cadastrar Usuário</a>
    <a href="alterarSenha.php" class="btn">Esqueci minha senha!</a>
  </div>

  <br>
</body>

</html>
