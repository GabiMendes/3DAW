<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $senha = $_POST["senha"];

    $cadastros = file("cadastros.txt"); 
    
    foreach ($cadastros as $linha) {

        $campos = explode(";", $linha);
        

        if ($campos[2] == $username && $campos[3] == $senha) {
   
            header("Location: index_logado.php");
            exit;
        }
    }
    
    echo "Credenciais inválidas. Tente novamente.";
}
?>
<form action="index_usuario.php">
    <br>
    <br>
	    <input type="submit" value="Voltar ao menu principal">
	</form>
