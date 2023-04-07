<?php
	$v1 = "";
	$v2 = "";
	$resultado = 0;
	$resultadoaux = 0;
	$floatv = 0;
	$floatvaux = 0;

if ($_SERVER["REQUEST_METHOD"] == "GET") 
{
$v1 = $_GET["valor1"];
$v2 = $_GET["valor2"];
$operacao = $_GET["operacao"];

if ($operacao == "+") 
{
	if(($v1=="")&&($v2==""))
	{
		$mensagem = "<p>Nenhum valor inserido.</p>";
	}
	elseif(($v1=="")||($v2==""))
	{
		if($v1=="")
		{
	$mensagem ="<p>Resultado da soma: $v2</p>";
		}
		elseif($v2=="")
		{
	$mensagem = "<p>Resultado da soma: $v1</p>";
		}
	}
	elseif(($v1!="")&&($v2!=""))
	{
	$resultado = $v1 + $v2;
	$mensagem = "<p>Resultado da soma: $resultado</p>";
	}
} 
elseif ($operacao == "-") 
{
	if(($v1=="")&&($v2==""))
	{
		$mensagem = "<p>Nenhum valor inserido.</p>";
	}
	elseif(($v1=="")||($v2==""))
	{
		if($v1=="")
		{
	$mensagem ="<p>Resultado da subtração: $v2</p>";
		}
		elseif($v2=="")
		{
	$mensagem = "<p>Resultado da subtração: $v1</p>";
		}
	}
	elseif(($v1!="")&&($v2!=""))
	{
	$resultado = $v1 - $v2;
	$mensagem = "<p>Resultado da subtração: $resultado</p>";
	}
} 
elseif ($operacao == "*")
{
	if(($v1=="")&&($v2==""))
	{
		$mensagem = "<p>Nenhum valor inserido.</p>";
	}
	elseif(($v1=="")||($v2==""))
	{
		if($v1=="")
		{
	$mensagem ="<p>Resultado da multiplicação: lacunas vazias, não é possível multiplicar.</p>";
		}
		elseif($v2=="")
		{
	$mensagem = "<p>Resultado da multiplicação: lacunas vazias, não é possível multiplicar.</p>";
		}
	}
	elseif(($v1!="")&&($v2!=""))
	{
	$resultado = $v1 * $v2;
	$mensagem = "<p>Resultado da multiplicação: $resultado</p>";
	}
}
elseif ($operacao =="/")
{
	if(($v1=="")&&($v2==""))
	{
		$mensagem = "<p>Nenhum valor inserido.</p>";
	}
	elseif(($v1=="")||($v2==""))
	{
		if($v1=="")
		{
	$mensagem ="<p>Resultado da divisão: lacunas vazias, não é possível dividir.</p>";
		}
		elseif($v2=="")
		{
	$mensagem = "<p>Resultado da subtração: lacunas vazias, não é possível dividir.</p>";
		}
	}
	elseif(($v1!="")&&($v2!=""))
	{
	$resultado = $v1 / $v2;
	$mensagem = "<p>Resultado da divisão: $resultado</p>";
	}
}
elseif ($operacao == "pot")
{
	if(($v1=="")&&($v2==""))
	{
		$mensagem = "<p>Nenhum valor inserido.</p>";
	}
	elseif(($v1=="")||($v2==""))
	{
		if($v1=="")
		{
	$mensagem ="<p>Resultado da potência: $v2 (nº elevado sem elevação: ele mesmo).</p>";
		}
		elseif($v2=="")
		{
	$mensagem = "<p>Resultado da potência: $v1 (nº elevado sem elevação: ele mesmo).</p>";
		}
	}
	elseif(($v1!="")&&($v2!=""))
	{
	$resultado = pow($v1, $v2);
	$mensagem = "<p>Resultado da potência: $v1 elevado à potência de $v2 = $resultado</p>";
	}
	
}
elseif ($operacao == "root")
{
	if(($v1=="")&&($v2==""))
	{
		$mensagem = "<p>Nenhum valor inserido.</p>";
	}
	elseif(($v1=="")||($v2==""))
	{
		$mensagem = "<p>Resultado da raíz: lacunas vazias, não é possivel calcular. </p>";
	}
	elseif(($v1!="")&&($v2!=""))
	{
		$resultado = pow($v1, (1/$v2));
		$resultado = number_format($resultado, 2, '.', '');
		$mensagem = "<p>Resultado da raiz: $v1 com raiz $v2 = $resultado</p>";
	}
}
elseif ($operacao == "sin")
{
	if(($v1=="")&&($v2==""))
	{
		$mensagem = "<p>Nenhum valor inserido.</p>";
	}
	else
	{
		if(($v1=="")||($v2==""))
		{
			if($v1=="")
			{
				$floatvaux = floatval ($v2);
				$resultadoaux = sin(deg2rad($floatvaux));
				$mensagem = "<p>Resultado: <br> Seno de $v2 = $resultadoaux.</p>";
			}
			else
			{
				if($v2=="")
				{
					$floatv = floatval($v1);
					$resultado = sin(deg2rad($floatv));
					$mensagem = "<p>Resultado: <br> Seno de $v1 = $resultado.";
				}
			}
		}
		else
		{
			$floatv = floatval($v1);
			$floatvaux = floatval ($v2);
			$resultado = sin(deg2rad($floatv));
			$resultadoaux = sin(deg2rad($floatvaux));
			$mensagem = "<p>Resultado: <br> Seno de $v1 = $resultado. <br> Seno de $v2 = $resultadoaux</p>";
		}
	
	}
}
elseif($operacao=="cos")
{
	if(($v1=="")||($v2==""))
	{
		if($v1=="")
		{
			$floatvaux = floatval ($v2);
			$resultadoaux = cos(deg2rad($floatvaux));
			$mensagem = "<p>Resultado: <br> Cos de $v2 = $resultadoaux.</p>";
		}
		else
		{
			if($v2=="")
			{
				$floatv = floatval($v1);
				$resultado = cos(deg2rad($floatv));
				$mensagem = "<p>Resultado: <br> Cos de $v1 = $resultado.";
			}
		}
	}
	else
	{
		$floatv = floatval($v1);
		$floatvaux = floatval ($v2);
		$resultado = cos(deg2rad($floatv));
		$resultadoaux = cos(deg2rad($floatvaux));
		$resultado = number_format($resultado, 2, '.', '');
		$mensagem = "<p>Resultado: <br> Cos de $v1 = $resultado. <br> Cos de $v2 = $resultadoaux</p>";
	}

}
elseif($operacao=="tan")
{
	if(($v1=="")||($v2==""))
	{
		if($v1=="")
		{
			$floatvaux = floatval ($v2);
			$resultadoaux = tan(deg2rad($floatvaux));
			$mensagem = "<p>Resultado: <br> Tan de $v2 = $resultadoaux.</p>";
		}
		else
		{
			if($v2=="")
			{
				$floatv = floatval($v1);
				$resultado = tan(deg2rad($floatv));
				$mensagem = "<p>Resultado: <br> Tan de $v1 = $resultado.";
			}
		}
	}
	else
	{
		$floatv = floatval($v1);
		$floatvaux = floatval ($v2);
		$resultado = cos(deg2rad($floatv));
		$resultadoaux = tan(deg2rad($floatvaux));
		$resultado = number_format($resultado, 2, '.', '');
		$mensagem = "<p>Resultado: <br> Tan de $v1 = $resultado. <br> Tan de $v2 = $resultadoaux</p>";
	}

}
}
	else 
	{
		$mensagem = "<p>Operação inválida</p>";
	}
?>


<!Doctype html>
<html>
	<head>
		<title>Calculadora</title>
	</head>
		<body>

		<h1> Calculadora feita com formulário (PHP)</h1>

		<form action="CalculadoraPHP.php" method="GET">
			<input type="text" name="valor1">
			<select name="operacao">
				<option value="+">+</option>
				<option value="-">-</option>
				<option value="*">*</option>
				<option value="/">/</option>
				<option value="sin">sin</option>
        		<option value="cos">cos</option>
        		<option value="tan">tan</option>
        		<option value="pot">pot</option>
        		<option value="root">root</option>
			</select>
			<input type="text" name="valor2">
			<br><br>
			<input type="submit" value="Calcular">
		</form>

		<?php echo $mensagem; ?>

		<h1>Outra forma de apresentar a calculadora:</h1>

		<table style="border: 1px solid black; border-collapse: collapse;">
  <tr>
    <th style="padding: 10px;">
      <form action="CalculadoraPHP.php" method="GET">
        <input type="text" name="valor1" style="padding: 5px; border: 1px solid black;">
      </th>
  </tr>
  <tr>
    <td style="padding: 10px;">
	<select name="operacao" style="padding: 5px; border: 1px solid black;">
          <option value="+">+</option>
          <option value="-">-</option>
          <option value="*">*</option>
          <option value="/">/</option>
          <option value="pot">pot</option>
          <option value="root">root</option>
		  <option value="sin">sin</option>
          <option value="cos">cos</option>
          <option value="tan">tan</option>
        </select>
    </td>
  </tr>
  <tr>
    <td style="padding: 10px;">
      <input type="text" name="valor2" style="padding: 5px; border: 1px solid black;">
    </td>
  </tr>
  <tr>
    <td style="padding: 10px;">
      <input type="submit" value="Calcular" style="padding: 5px; border: 1px solid black;">
    </form>
	<br>
	<br>

	<?php 
if($v1=="")
{
$resultadoaux = number_format($resultadoaux, 2, '.', '');
echo "Resultado: $resultadoaux";
}
elseif($v2=="")
{
$resultado = number_format($resultado, 2, '.', '');
echo "Resultado: $resultado";
}
elseif(($v1=="")&&($v2==""))
{
echo "$mensagem";
}
elseif(($v1!="")&&($v2!=""))
{
$resultado = number_format($resultado, 2, '.', '');
$resultadoaux = number_format($resultadoaux, 2, '.', '');
	if(($operacao=="sin")||($operacao=="cos")||($operacao=="tan"))
	{
		echo "Resultado: <br> $resultado <br> $resultadoaux";
	}
	else
	{
		echo "Resultado: <br> $resultado";
	}

}

?>

</td>
</tr>
</table>
		</body>
</html>


				

