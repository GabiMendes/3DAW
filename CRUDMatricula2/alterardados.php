<?php
// Recebe a nova matrícula informada pelo formulário de alteração
$nova_matricula = $_POST["nova_matricula"];

// Abre o arquivo "cadastro.txt" para leitura e escrita
$arquivo = fopen("cadastro.txt", "r+") or die("Não foi possível abrir o arquivo.");

// Percorre o arquivo linha por linha
while (!feof($arquivo)) {
    // Lê a próxima linha
    $linha = fgets($arquivo);
    
    // Separa os campos da linha
    $dados = explode(";", $linha);

    // Verifica se a matrícula atual é igual à matrícula informada no formulário
    if (trim($dados[2]) == trim($_POST["matricula"])) {
        // Se sim, atualiza os campos necessários com os valores informados no formulário
        $dados[0] = $_POST["nome"];
        $dados[1] = $_POST["cpf"];
        $dados[2] = $nova_matricula;
        $dados[3] = $_POST["dtingresso"];
        
        // Armazena a nova linha com os campos atualizados
        $linha_atualizada = implode(";", $dados) . "\n";
    } else {
        // Se não, mantém a linha original
        $linha_atualizada = $linha;
    }

    // Escreve a linha atualizada no arquivo temporário
    fwrite($temp_arquivo, $linha_atualizada);
}

// Fecha os arquivos
fclose($arquivo);
fclose($temp_arquivo);

// Renomeia o arquivo temporário para "cadastro.txt"
rename("temp_cadastro.txt", "cadastro.txt");
?>
