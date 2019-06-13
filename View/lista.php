<?php
include("../Controll/actions.php");

$registros = getLista();
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel='stylesheet' href="css/bootstrap.min.css">
        <script lang='javascript' src='js/bootstrap.min.js'></script>
        <title>Lista</title>
    </head>
    <body>
        <nav class="navbar justify-content-between py-1" style="background: #066100">
            <a class="navbar-brand"></a>
            <a class="btn btn-light" href="index.php">Início</a>
        </nav>  
        <?php if (isset($_SESSION['msg_type'])) { ?>

            <div class="alert alert-<?php echo $_SESSION['msg_type'] ?>" style="margin:0px">
                <?php
                if (isset($_SESSION['message'])) {
                    echo $_SESSION['message'];
                }
                ?>
            </div>
        <?php } ?>
        <div class='container-fluid'>

            <div class="row justify-content-center">
                <table class='table'>
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Autor</th>
                            <th>ISBN</th>
                            <th>Genero</th>
                            <th>Publicaçao</th>
                            <th>Sobre o Livro</th>
                            <th colspan="2">Opções</th>
                        </tr>
                    </thead>    
                    <?php
                    echo $registros;
                    ?>        
                </table>
            </div>
        </div>
    </body>
    <?php session_destroy() ?>
</html>
