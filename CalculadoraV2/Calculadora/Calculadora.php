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
        <option value="pot">pot</option>
        <option value="root">root</option>
        <option value="sin">sin</option>
        <option value="cos">cos</option>
        <option value="tan">tan</option>
			</select>
			<input type="text" name="valor2">
			<br><br>
			<input type="submit" value="Calcular">
		</form>

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
    </td>
  </tr>
</table>
		</body>
</html>
