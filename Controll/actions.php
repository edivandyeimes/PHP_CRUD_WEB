<?php

include("../Model/sqlfunction.php");

function getLista() {

    //instancia a classe Sqlfunction para buscar os dados no BD
    $registros = new Sqlfunction();

    //usa o método listar da classe Sqlfunction para buscar os dados e passa para variavel $result
    $result = $registros->listar();

    //cria a variavel para receber a tabela dos livros encontrados no BD
    $table = "";

    //loop para criação da tabela dos livros
    while ($row = mysqli_fetch_assoc($result)) {

        $table = $table . " <tr>
    <td> " . $row['Nome'] . "</td>
    <td>" . $row['Autor'] . "</td>
    <td>" . $row['ISBN'] . "</td>
    <td>" . $row['Genero'] . "</td>
    <td>" . $row['Publicacao'] . "</td>
    <td>" . $row['Nota'] . "</td>
    <td>" . "<a href='../Controll/process.php?editar=" . $row['Id'] .
                "'class='btn btn-info' id='editar' name='editar'>Editar</a>
    <a href='../Controll/process.php?deletar=" . $row['Id'] .
                "'class='btn btn-danger' id='deletar' name='deletar'>Deletar</a>
                </td>
    </tr>";
    }

    return $table;
}
