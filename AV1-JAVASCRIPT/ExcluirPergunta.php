<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idPergunta = $_POST["idPergunta"];
    $idResposta = $idPergunta;    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "perguntasrespostas";
    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("DELETE FROM perguntagabarito WHERE id = ?");
    $stmt->bind_param("i", $idPergunta);
    $stmt2 = $conn->prepare("DELETE FROM resposta WHERE id = ?");
    $stmt2->bind_param("i", $idResposta);

    if (($stmt->execute())&&($stmt2->execute())) {
        echo "Pergunta excluída com sucesso!";
    } else {
        echo "Erro na exclusão da pergunta: " . $stmt->error;
    }

    $stmt->close();
    $stmt2->close();
    $conn->close();
}
?>
