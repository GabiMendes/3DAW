<!Doctype html>
<html>
	<head>
		<title>Calculadora</title>
	</head>
		<body>
		<?php
			$v1 = "";
			$v2 = "";
			$resultado = 0;

			if ($_SERVER["REQUEST_METHOD"] == "GET") 
			{
				$v1 = $_GET["valor1"];
				$v2 = $_GET["valor2"];
				$operacao = $_GET["operacao"];

				if ($operacao == "+") 
				{
					$resultado = $v1 + $v2;
					$mensagem = "<p>Resultado da soma: $resultado</p>";
				} 
				elseif ($operacao == "-") 
				{
					$resultado = $v1 - $v2;
					$mensagem = "<p>Resultado da subtração: $resultado</p>";
				} 
				elseif ($operacao == "*")
				{
					$resultado = $v1 * $v2;
					$mensagem = "<p>Resultado da multiplicação: $resultado</p>";
				}
				elseif ($operacao =="/")
				{
					$resultado = $v1 / $v2;
					$mensagem = "<p>Resultado da divisão: $resultado</p>";
				}
				else 
				{
					$mensagem = "<p>Operação inválida</p>";
				}
			}

			echo $mensagem;
		?>
		</body>
</html>

				

