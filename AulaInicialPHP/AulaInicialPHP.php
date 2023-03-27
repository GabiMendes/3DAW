<!Doctype html>
<html>
	<head>
		<title>Hello World</title>
	</head>
	<body>
  
		<?php
		//printando vários Hello World
			echo "Hello World";
		?>
    
		<h1>
			<?php
			echo "<marquee>Hello Gabi</marquee>";
			?>
    </h1>
    
		<?php
			echo "<h1>Hello World</h1>";
			
		//fazendo uma funçãozinha básica	
    
			function math($num1, $num2)
			{
					$num1=$num2;
					return $num1+$num2;
			}
			
		//chamando resultado
			$resultado=math(1,2);
			echo "result is " . $resultado;
			
			echo "<br>";
		
		//voltamos ao Hello World
			$hello = "Hello World (de novo)";
			echo $hello;
			
		//operando em uma variável
			$valor=5+3;
			echo $valor;
		
		//explorando diferentes Tipos com var_dump
			echo "<h2>Exercício Tipos</h2>";
			
			$variavel="essa é uma string";
			echo $variavel;
			
			var_dump($variavel);
			
			$variavelInt=6;
			var_dump($variavelInt);
			
			$variavelFloat=6.26;
			var_dump($variavelFloat);
			
			$variavelBoo=true;
			var_dump($variavelBoo);
			
			echo "<br>";
			
			echo "Exercício Array";
			
			$disciplinas=array("3DAW","3EMP",26);
			var_dump($disciplinas);
			
			echo $disciplinas[0];
			echo "<br>";
			echo $disciplinas[1];
			
		//for em php
			for($x=0; $x<count($disciplinas); $x++)
			{
				echo "<br> Minha turma é" .$disciplinas[$x];
			}
			
		//Exercício dos carros
			$carros=array("Ford", "Peugeot", "Fiat", "Fusquinha");
			var_dump($carros);
			
			echo "For tradicional";
			for($i=0; $i<count($carros); $i++)
			{
					echo "<br> Meu carro é o " .$carros[$i];
			}
			
			echo "<br>";
			echo "<br>";
			
		//Loop foreach
			$cores=array("Azul", "Preto", "Amarelo");
			echo "For...each";
			foreach($cores as $cor)
			{
				echo "<br> Meu carro é $cor";
			}
				echo "<br>" .$cor;
		?>
		</h1>
	</body>
</html>