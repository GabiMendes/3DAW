<!DOCTYPE html>
<html>
<head>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #F2F2F2;
		}
		h1 {
			color: #333333;
			text-align: center;
			margin-top: 50px;
		}
		form {
			background-color: #FFFFFF;
			padding: 20px;
			border-radius: 5px;
			box-shadow: 0 2px 2px rgba(0, 0, 0, 0.25);
			max-width: 500px;
			margin: 0 auto;
		}
		label {
			display: block;
			margin-bottom: 10px;
			font-size: 16px;
			font-weight: bold;
			color: #333333;
		}
		input[type="text"] {
			padding: 10px;
			border-radius: 5px;
			border: none;
			box-shadow: 0 2px 2px rgba(0, 0, 0, 0.25);
			font-size: 16px;
			margin-bottom: 20px;
			width: 100%;
			box-sizing: border-box;
		}
		input[type="submit"] {
			background-color: #008CBA;
			color: #FFFFFF;
			padding: 10px 20px;
			border-radius: 5px;
			border: none;
			font-size: 16px;
			font-weight: bold;
			box-shadow: 0 2px 2px rgba(0, 0, 0, 0.25);
			cursor: pointer;
			transition: background-color 0.3s ease-in-out;
		}
		input[type="submit"]:hover {
			background-color: #005A6E;
		}
	</style>
</head>
<body>
	<h1>Alterar</h1>
	<form action="alterardados.php" method="POST" class="form">
	    <label for="matricula" class="label">Matrícula:</label>
	    <input type="text" name="matricula" id="matricula" class="input[type='text']">
	    <label for="nova_matricula" class="label">Nova Matrícula:</label>
	    <input type="text" name="nova_matricula" id="nova_matricula" class="input[type='text']">
	    <input type="submit" value="Alterar Cadastro" class="input[type='submit']">
	</form>
	<br>
</body>
</html>
