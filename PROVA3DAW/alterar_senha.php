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
  <title>Esqueci a senha!</title>
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $arqDisc = fopen("cadastros.txt", "r") or die("Erro ao abrir o arquivo de cadastro.");
    $linha = fgets($arqDisc);
    $encontrado = false;
    while (!feof($arqDisc) && !$encontrado) {
        $linha = fgets($arqDisc);
        $dados = explode(";", $linha);
        if (isset($dados[2]) && $dados[2] == $username) {
            $encontrado = true;
        }
    }
    fclose($arqDisc);

    if ($encontrado) {
        echo "<h2>Nova senha:</h2>";
        echo "<form method='POST' action='alterar_SENHA.php'>";
        echo "<input type='hidden' name='username' value='" . $dados[2] . "'>";
        echo "<input type='hidden' name='nome' value='" . $dados[0] . "'>";
        echo "<input type='hidden' name='cpf' value='" . $dados[1] . "'>";
        echo "Senha: <input type='text' name='senha' value='" . $dados[3] . "'><br>";
        echo "<input type='submit' value='Salvar Alterações' name='salvar'>";
        echo "</form>";
    } else {
        echo "<h2>Usuário não encontrado.</h2>";
    }
}

if (isset($_POST["salvar"])) {
    $username = $_POST["username"];
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $senha = $_POST["senha"];

    $arqDisc = fopen("cadastros.txt", "r") or die("Erro ao abrir o arquivo de cadastro.");
    $temp = fopen("temp.txt", "w") or die("Erro ao criar arquivo temporário.");
    while (!feof($arqDisc)) {
        $linha = fgets($arqDisc);
        $dados = explode(";", $linha);
        if (isset($dados[2]) && $dados[2] == $username) {
            $novaLinha = $nome . ";" . $cpf . ";" . $username . ";" . $senha;
            fwrite($temp, $novaLinha . "\n");
        } else {
            fwrite($temp, $linha);
        }
    }
    fclose($arqDisc);
    fclose($temp);
    unlink("cadastros.txt");
    rename("temp.txt", "cadastros.txt");
    echo "<h2>Senha alterada com sucesso.</h2>";
}
?>
<form action="index.php">
    <br>
    <br>
    <input type="submit" value="Voltar ao menu principal">
</form>
</body>
</html>