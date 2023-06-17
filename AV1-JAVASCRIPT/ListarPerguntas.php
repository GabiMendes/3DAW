<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $perguntas = file_get_contents("perguntas.json");
    $perguntasArray = json_decode($perguntas, true);

    if (empty($perguntasArray)) {
        echo "Não há perguntas cadastradas.";
        exit;
    }

    foreach ($perguntasArray as $pergunta) {
        echo "ID: " . $pergunta["id"] . "<br>";
        echo "Pergunta: " . $pergunta["pergunta"] . "<br>";
        echo "Gabarito: " . $pergunta["gabarito"] . "<br>";
        echo "Alternativa A: " . $pergunta["alternativaA"] . "<br>";
        echo "Alternativa B: " . $pergunta["alternativaB"] . "<br>";
        echo "Alternativa C: " . $pergunta["alternativaC"] . "<br>";
        echo "Alternativa D: " . $pergunta["alternativaD"] . "<br><br>";
    }
}
?>
