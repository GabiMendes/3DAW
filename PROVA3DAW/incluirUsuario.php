<?php

$nome = "";
$cpf = "";
$username = "";
$senha= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $username = $_POST["username"];
    $senha = $_POST["senha"];
    $linha = "";
    echo "nome: " . $nome . " cpf: " . " username: " . $username . "senha: " . $senha;
    if (!file_exists("cadastros.txt")) {
        $arqDisc = fopen("cadastros.txt","w") or die("erro ao criar arquivo");
        $linha = "nome;cpf;username;senha\n";
        fwrite($arqDisc,$linha);
        fclose($arqDisc);
    }
    $arqDisc = fopen("cadastros.txt","a") or die("erro ao criar arquivo");
    $linha = $nome . ";" . $cpf . ";" . $username . ";" . $senha . "\n";
    fwrite($arqDisc,$linha);
    fclose($arqDisc);
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
  </style>
</head>

<body>
  <h2>Incluir Usuário</h2>
  <form action="incluirUsuario.php" method="POST">
    <label for="nome">Nome:</label>
    <input type="text" name="nome" id="nome">
    <label for="cpf">CPF:</label>
    <input type="text" name="cpf" id="cpf">
    <label for="username">Username:</label>
    <input type="text" name="username" id="username">
    <label for="senha">Senha:</label>
    <input type="text" name="senha" id="senha">
    <input type="submit" value="Incluir Cadastro">
  </form>
  <br>

  <form action="index.php">
    <br>
    <br>
    <input type="submit" value="Voltar ao menu principal">
  </form>

</body>

</html>
