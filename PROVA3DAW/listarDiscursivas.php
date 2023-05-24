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

    table {
      width: 100%;
      border-collapse: collapse;
    }

    table th,
    table td {
      padding: 10px;
      border: 1px solid #ccc;
    }

    table th {
      background-color: #6c63ff;
      color: #fff;
      text-align: left;
    }

    table tbody tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    table tbody tr:hover {
      background-color: #e0e0e0;
    }

    form {
      margin-top: 20px;
      text-align: center;
    }

    input[type="submit"] {
      padding: 10px;
      border: 1px solid #ccc;
      margin-bottom: 15px;
      border-radius: 30px;
      background-color: #6c63ff;
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
	<h1>Listar Perguntas Discursivas</h1>
	
	<table>
	<thead>
		<tr>
			<th>ID</th>
			<th>Pergunta</th>
			<th>Gabarito</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$arqDisc = fopen("perguntasdiscursivas.txt", "r") or die("Erro ao abrir arquivo.");

		fgets($arqDisc);

		while (!feof($arqDisc)) {
		    $linha = fgets($arqDisc);
		    if (!empty($linha)) {
		        $dados = explode(";", $linha);
		        echo "<tr>";
		        echo "<td>" . $dados[0] . "</td>";
		        echo "<td>" . $dados[1] . "</td>";
		        echo "<td>" . $dados[2] . "</td>";
		        echo "</tr>";
		    }
		}
		fclose($arqDisc);
		?>
	</tbody>
	</table>

	<br>

	<form action="UsuarioLogado.php">
    <br>
    <br>
	    <input type="submit" value="Voltar ao menu principal">
	</form>
</body>
</html>
