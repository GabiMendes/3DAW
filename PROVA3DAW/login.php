<!DOCTYPE html>
<html>
<head>
    <title>Página de Login</title>
</head>
<body>
    <h2>Página de Login</h2>
    <form method="POST" action="login_processado.php">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="senha">Senha:</label>
        <input type="senha" id="senha" name="senha" required><br><br>
        <input type="submit" value="Login">
    </form>
<br>
    <form action="index_usuario.php">
	    <input type="submit" value="Voltar">
	</form>
</body>
</html>
