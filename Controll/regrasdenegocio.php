<?php

function formata_data($_data) {
    // o array $partes é um dos parâmetros de preg_match(), e retorna os padrões encontrados na string.
    if (preg_match("/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/", $_data, $partes)) {
        $data_formatada = $partes[3] . "-" . $partes[2] . "-" . $partes[1];
        return $data_formatada;
    }
}

function verifica($livro) {
    date_default_timezone_set('America/Sao_Paulo');
    $entrada = strtotime(formata_data($livro->publi));
    $hoje = time();

    //A data de publicação deve ser aterior a data de inserção no sistema
    if ($entrada > $hoje) {
        return "Erro, data de publicação posterior a atual";
    }
    //Campo nota não pode ser nulo
    if ($livro->nota == "") {
        return "Erro, é necessário dizer algo sobre o livro";
    }
    //O livro precisa da identificação ISBN
    if ($livro->isbn == "") {
        return "Erro, o livro precisa ter ISBN";
    }
    return 1;
}

?>
