<?php

class Conection {
    
    //endereço de conexao com o BD
    var $host = "127.0.0.1";
    var $user = "root";
    var $pass = "";
    var $base = "database";
    var $conn;

    function getConection() {

        $this->conn = mysqli_connect($this->host, $this->user, "", $this->base) or die("Erro ao conectar: " . $this->conn->connect_error);
        return $this->conn;
    
    }

       

}
