<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "av2";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

$query_salas_cadastradas = "SELECT id FROM salas";
$result_salas_cadastradas = $conn->query($query_salas_cadastradas);

if ($result_salas_cadastradas->num_rows > 0) {
    echo "Salas Cadastradas:<br>";
    while ($row = $result_salas_cadastradas->fetch_assoc()) {
        echo $row["id"] . "<br>";
    }
    echo "<br>";
} else {
    echo "Nenhuma sala cadastrada.<br><br>";
}


$query_salas_preenchidas = "SELECT salas_unidas.salaDeProva, GROUP_CONCAT(DISTINCT fiscais.nome) AS fiscais, GROUP_CONCAT(DISTINCT candidatos.nome) AS candidatos
FROM (
  SELECT salaDeProva FROM candidatos
  UNION ALL
  SELECT salaDeProva FROM fiscais
) AS salas_unidas
LEFT JOIN fiscais ON salas_unidas.salaDeProva = fiscais.salaDeProva
LEFT JOIN candidatos ON salas_unidas.salaDeProva = candidatos.salaDeProva
GROUP BY salas_unidas.salaDeProva
ORDER BY salas_unidas.salaDeProva ASC";

$result_salas_preenchidas = $conn->query($query_salas_preenchidas);

if ($result_salas_preenchidas) {
    if ($result_salas_preenchidas->num_rows > 0) {
        echo "Salas Preenchidas:<br>";
        while ($row = $result_salas_preenchidas->fetch_assoc()) {
            echo "Sala: " . $row["salaDeProva"] . "<br>";
            echo "Fiscais: " . $row["fiscais"] . "<br>";
            echo "Candidatos: " . $row["candidatos"] . "<br><br>";
        }
    } else {
        echo "Salas vazias.";
    }
} else {
    echo "Erro na consulta: " . $conn->error;
}

$conn->close();
?>
