<?php

include ('../Model/sqlfunction.php');
include ('regrasdenegocio.php');

session_start();

//insere o livro no banco de dados
if (isset($_POST['salvar'])) {

    //A variavel livro recebe os dados passados pelo metodo POST
    $livro = (object) $_POST;
    //verifica se o livro respeita as regras de negocio
    $verifica = $verifica = verifica($livro);;

    if ($verifica == 1) {

        $function = new Sqlfunction();
        $function->inserir($livro);

        $_SESSION['message'] = 'Registro foi salvo com sucesso!';
        $_SESSION['msg_type'] = 'success';
        
        //Depois de inserido retorna a página principal
        header("location: ../View/index.php");
    } else {
        
        $_SESSION['message'] = $verifica;
        $_SESSION['msg_type'] = 'danger';

        header("location: ../View/index.php");
    }
}

//deleta o livro
if (isset($_GET['deletar'])) {
    
    //A variavel livro recebe o valor do ID passado por GET
    $livro = (object) $_GET;
    $function = new Sqlfunction();

    $function->deletar($livro);

    $_SESSION['message'] = 'Registro foi deletado com sucesso!';
    $_SESSION['msg_type'] = 'success';
    
    //Depois de deletado retorna a página principal
    header("location: ../View/index.php");
}

//Busca os dados no banco para serem alterados na pagina do formulario (index.php)
if (isset($_GET['editar'])) {
    
    $function = new Sqlfunction();
    $update = true;
    $result = $function->editar($_GET['editar']);
    $count = (is_array($result) ? count($result) : 1);
    
    //verifica se a busca retornou um livro para alteração
    if ($count == 1) {
        //passa os dados por sessão para o formulário de alteração
        $row = $result->fetch_array();
        $_SESSION['id'] = $row['Id'];
        $_SESSION['nome'] = $row['Nome'];
        $_SESSION['autor'] = $row['Autor'];
        $_SESSION['isbn'] = $row['ISBN'];
        $_SESSION['genero'] = $row['Genero'];
        $_SESSION['publicacao'] = $row['Publicacao'];
        $_SESSION['nota'] = $row['Nota'];
        $_SESSION['update'] = $update;

        header("location: ../View/index.php");
    }
    else {
        
        $_SESSION['message'] = "Erro ao buscar livro para alteração!";
        $_SESSION['msg_type'] = 'danger';
        header("location: ../View/lista.php");
    }
}

if (isset($_POST['alterar'])) {
    
    //recebe os dados passados por POST
    $livro = (object) $_POST;
    //verifica se o livro respeita as regras de negocio
    $verifica = verifica($livro);
    
    if ($verifica == 1) {

        $function = new Sqlfunction();
        $function->alterar($livro);

        $_SESSION['message'] = 'Registro foi alterado com sucesso!';
        $_SESSION['msg_type'] = 'info';

        header("location: ../View/index.php");
    } else {
        
        $_SESSION['message'] = $verifica;
        $_SESSION['msg_type'] = 'danger';

        header("location: ../View/index.php");
    }
}