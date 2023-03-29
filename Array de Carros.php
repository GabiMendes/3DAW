<!Doctype html>
<html>
	<head>
		<title>ExercícioI_ArraydeCarros_AulaII</title>
	</head>
	<body>
		<?php	

		//Exercício dos carros da Aula 2
			$carros=array("Ford", "Peugeot", "Fiat", "Fusquinha");
			var_dump($carros);
			
            echo "<br>";
			echo "<br>";			
			
            echo "<br> For tradicional";
			for($i=0; $i<count($carros); $i++)
			{
					echo "<br> Meu carro é o " .$carros[$i];
			}
			
			echo "<br>";
			echo "<br>";
			
		//Loop foreach
			echo "For...each";
			foreach($carros as $carro)
			{
				echo "<br> Meu carro é $carro";
			}
		?>
		</h1>
	</body>
</html>
