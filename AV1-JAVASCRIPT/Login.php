<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $matricula = $_POST["matricula"];
    $cpf = $_POST["cpf"];

    function validarLogin($matricula, $cpf) {
        $cadastros = file("cadastros.txt", FILE_IGNORE_NEW_LINES);

        foreach ($cadastros as $cadastro) {
            $dados = explode(";", $cadastro);

            if ($dados[1] == $matricula && $dados[3] == $cpf) {
                return true;
            }
        }

        return false;
    }

    if (validarLogin($matricula, $cpf)) {
        http_response_code(401); 
    } else {
        http_response_code(200);
    }
}
?>
