<!Doctype html>
<html>
    <head>
        <title> Atividade Aula 2 </title>
        <style>
            table, tr, td, th{
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
    <h1>Atividade Aula 2</h1>
        <?php
	    
	    //Uso de função, estrutura de repetição e demais recursos básicos
	    
        $nomes = array ("Ana", "Bia", "Catarina", "Duda");
		$notas = array (8.9, 6.2, 9, 3);
        //criar função para gerar
		function avaliar_Notas($nomes, $notas)
		{
			if($notas<8)
			{
				echo "
				<tr>
					<td>$nomes</td>
					<td>$notas</td>
					<td>Reprovado</td>
				</tr>
				";
			}else
			{
			echo "
			<tr>
				<td>$nomes</td>
				<td>$notas</td>
				<td>Aprovado</td>
				
			</tr>
			";
			}
		}
		?>
		<table>
		<tr>
			<th>Nome:</th>
			<th>Nota:</th>
			<th>Situação:</th>
		</tr>
		<?php
		for($i=0; $i<count($nomes); $i++)
		{
			avaliar_Notas($nomes[$i], $notas[$i]);
		}
		?>
		</table>
    </body>
</html>
