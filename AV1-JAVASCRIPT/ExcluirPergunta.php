<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idPergunta = $_POST["idPergunta"];
    $perguntas = file_get_contents("perguntas.json");
    $perguntasArray = json_decode($perguntas, true);
    $perguntaExcluir = null;

    foreach ($perguntasArray as $index => $perguntaArray) {
        $id = $perguntaArray["id"];
        if ($id == $idPergunta) {
            $perguntaExcluir = $perguntaArray;
            break;
        }
    }

    if ($perguntaExcluir !== null) {
        unset($perguntasArray[$index]);
        $perguntasArray = array_values($perguntasArray);
        $perguntasAtualizadas = json_encode($perguntasArray, JSON_PRETTY_PRINT);

        file_put_contents("perguntas.json", $perguntasAtualizadas);

        echo "Pergunta excluída com sucesso.";
    } else {
        echo "Pergunta não encontrada.";
    }
}
?>
