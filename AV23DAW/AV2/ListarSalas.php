<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "av2";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

$query = "SELECT salas_unidas.salaDeProva, GROUP_CONCAT(DISTINCT fiscais.nome) AS fiscais, GROUP_CONCAT(DISTINCT candidatos.nome) AS candidatos
FROM (
  SELECT salaDeProva FROM candidatos
  UNION ALL
  SELECT salaDeProva FROM fiscais
) AS salas_unidas
LEFT JOIN fiscais ON salas_unidas.salaDeProva = fiscais.salaDeProva
LEFT JOIN candidatos ON salas_unidas.salaDeProva = candidatos.salaDeProva
GROUP BY salas_unidas.salaDeProva
ORDER BY salas_unidas.salaDeProva ASC";

$result = $conn->query($query);

if ($result) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "Sala: " . $row["salaDeProva"] . "<br>";
            echo "Fiscais: " . $row["fiscais"] . "<br>";
            echo "Candidatos: " . $row["candidatos"] . "<br><br>";
        }
    } else {
        echo "Nenhuma sala encontrada.";
    }
} else {
    echo "Erro na consulta: " . $conn->error;
}

$conn->close();
?>
