<?php
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    if (file_exists("cadastros.txt")) {
        $alunos = array();
        $linhas = file("cadastros.txt");

        foreach ($linhas as $linha) {
            $dados = explode(";", $linha);
            $aluno = array(
                "matricula" => $dados[1],
                "nome" => $dados[0],
                "email" => $dados[2],
                "cpf" => $dados[3]
            );
            $alunos[] = $aluno;
        }

        header("Content-Type: application/json");
        echo json_encode($alunos);
    }
}
?>