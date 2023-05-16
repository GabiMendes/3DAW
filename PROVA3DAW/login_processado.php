<?php
// Verifique se o formulário de login foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtenha os valores do formulário
    $username = $_POST["username"];
    $senha = $_POST["senha"];

    // Verifique as credenciais do usuário
    $cadastros = file("cadastros.txt"); // Lê todas as linhas do arquivo de cadastros
    
    // Percorre as linhas do arquivo
    foreach ($cadastros as $linha) {
        // Divide a linha em campos separados pelo ponto e vírgula
        $campos = explode(";", $linha);
        
        // Verifica se o username e senha correspondem
        if ($campos[2] == $username && $campos[3] == $senha) {
            // Credenciais corretas, redirecione para o novo index
            header("Location: index_logado.php");
            exit;
        }
    }
    
    // Credenciais incorretas, exiba uma mensagem de erro
    echo "Credenciais inválidas. Tente novamente.";
}
?>
<form action="index_usuario.php">
	    <input type="submit" value="Voltar ao menu principal">
	</form>
