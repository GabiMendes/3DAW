<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $matricula = $_GET["matricula"];
    $alunos = file("cadastros.txt", FILE_IGNORE_NEW_LINES);
    $excluido = false;

    foreach ($alunos as $indice => $aluno) {
        $dados = explode(";", $aluno);
        if ($dados[1] == $matricula) {
            unset($alunos[$indice]);
            $excluido = true;
            break;
        }
    }

    if ($excluido) {
        file_put_contents("cadastros.txt", implode("\n", $alunos) . "\n");
        echo "Aluno excluído com sucesso!";
    } else {
        echo "Aluno não encontrado!";
    }
}
?>
