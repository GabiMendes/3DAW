<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $perguntas = file_get_contents("perguntas.json");
    $perguntasArray = json_decode($perguntas, true);
    $proximaId = 1;
    
    foreach ($perguntasArray as $perguntaArray) {
        $id = $perguntaArray["id"];
        if ($id >= $proximaId) {
            $proximaId = $id + 1;
        }
    }

    echo $proximaId;
}
?>
