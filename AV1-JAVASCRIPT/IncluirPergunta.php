<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pergunta = $_POST["pergunta"];
    $gabarito = $_POST["gabarito"];
    $alternativaA = $_POST["alternativaA"];
    $alternativaB = $_POST["alternativaB"];
    $alternativaC = $_POST["alternativaC"];
    $alternativaD = $_POST["alternativaD"];

    if (empty($alternativaA)) {
        $alternativaA = "NULL";
    }
    if (empty($alternativaB)) {
        $alternativaB = "NULL";
    }
    if (empty($alternativaC)) {
        $alternativaC = "NULL";
    }
    if (empty($alternativaD)) {
        $alternativaD = "NULL";
    }

    $perguntas = file_get_contents("perguntas.json");
    $perguntasArray = json_decode($perguntas, true);
    $proximaId = 1;

    foreach ($perguntasArray as $perguntaArray) {
        $id = $perguntaArray["id"];
        if ($id >= $proximaId) {
            $proximaId = $id + 1;
        }
    }

    $novaPergunta = array(
        "id" => $proximaId,
        "pergunta" => $pergunta,
        "gabarito" => $gabarito,
        "alternativaA" => $alternativaA,
        "alternativaB" => $alternativaB,
        "alternativaC" => $alternativaC,
        "alternativaD" => $alternativaD
    );

    $perguntasArray[] = $novaPergunta;
    $perguntasAtualizadas = json_encode($perguntasArray, JSON_PRETTY_PRINT);

    file_put_contents("perguntas.json", $perguntasAtualizadas);

    echo "Pergunta inserida com sucesso!";
}
?>
