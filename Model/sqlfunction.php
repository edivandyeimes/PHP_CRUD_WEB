<?php

include("conection.php");

class Sqlfunction {
    var $conn;
   
    //contrutor da classe
    //ao construir a classe é criada uma conexao com BD para que os métodos funcionem
    function __construct() {
        $this->conn = new Conection();
        
    }
    
    //sql para inserir o livro no BD
    function inserir($livro) {

        $mysqli = $this->conn->getConection();

        mysqli_query($mysqli, "INSERT INTO tb_produto (Nome, Autor, ISBN, Genero, Publicacao, Nota) VALUES('$livro->nome', '$livro->autor', $livro->isbn, '$livro->genero', '$livro->publi', '$livro->nota')") or
                die($mysqli->error);
    }
    
    //sql para alterar o livro no BD
    function alterar($livro) {

        $mysqli = $this->conn->getConection();

        mysqli_query($mysqli, "UPDATE livro SET Nome = '$livro->nome', Autor = '$livro->autor', ISBN = $livro->isbn, Genero = '$livro->genero', Publicacao = '$livro->publi', Nota = '$livro->nota' WHERE Id = '$livro->id'") or die($mysqli->error());
     
    }
    
    //sql para deletar o livro no BD
    function deletar($livro) {

        $mysqli = $this->conn->getConection();
        
        mysqli_query($mysqli, "DELETE FROM livro WHERE Id='$livro->deletar'") or die($mysqli->error());
    }
    
    //sql para procurar os dados d livro a ser editado
    function editar($livro) {

        $mysqli = $this->conn->getConection();
        
        return mysqli_query($mysqli, "SELECT * FROM livro WHERE Id = '$livro'");
        
        
    }
    
    //sql para buscar todos os livros existentes no BD
    function listar() {

        $mysqli = $this->conn->getConection();
        
        return mysqli_query($mysqli, "SELECT * FROM livro");
        
        
    }

}
