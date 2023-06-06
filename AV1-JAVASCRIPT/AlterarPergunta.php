<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idPergunta = $_POST["idPergunta"];
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

    foreach ($perguntasArray as &$perguntaArray) {
        if ($perguntaArray["id"] == $idPergunta) {
            $perguntaArray["pergunta"] = $pergunta;
            $perguntaArray["gabarito"] = $gabarito;
            $perguntaArray["alternativaA"] = $alternativaA;
            $perguntaArray["alternativaB"] = $alternativaB;
            $perguntaArray["alternativaC"] = $alternativaC;
            $perguntaArray["alternativaD"] = $alternativaD;
            break;
        }
    }

    $perguntasAtualizadas = json_encode($perguntasArray, JSON_PRETTY_PRINT);

    file_put_contents("perguntas.json", $perguntasAtualizadas);

    echo "Pergunta alterada com sucesso!";
}
?>
