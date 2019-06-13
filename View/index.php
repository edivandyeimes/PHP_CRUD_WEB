<!DOCTYPE html>
<?php
session_start();
?>

<html>

    <head>
        <meta charset="UTF-8">

        <title>Pagina Inicial</title>

        <link rel="stylesheet" type="text/css" href="css/estilos.css" />
        <link rel='stylesheet' href="css/bootstrap.min.css">

        <script type="text/javascript" src="js/jquery.js" ></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/jquery.numeric.js" ></script>
        <script type="text/javascript" src="js/jquery.validate.js" ></script>
        <script type="text/javascript" src="js/jquery.mask.js" ></script>
        <script type="text/javascript" src="js/script.js" ></script>
        <script type="text/javascript" src="js/verifica.js" ></script>

    </head>

    <body>

        <nav class="navbar justify-content-between py-1" style="background: #066100">
            <a class="navbar-brand"></a>
            <a class="btn btn-light" href="lista.php">Listar</a>
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
        <div class="container-fluid">
            <div class="row justify-content-center" > 
                <form class="form" name="form" id="form" action="../Controll/process.php" method="POST" onSubmit="return validar();">
                    <label>
                        <h2>Bibloteca</h2>
                    </label>  

                    <div class="form-group">
                        <input type="hidden" name="id" value="<?php
                               if (isset($_SESSION['id'])) {
                                   echo $_SESSION['id'];
                               }
                               ?>">
                        <label>Nome do livro </label>
                        <br><input type="text" name="nome" id="nome" size="30" value="<?php
                               if (isset($_SESSION['nome'])) {
                                   echo $_SESSION['nome'];
                               }
                               ?>"/>
                    </div>
                    <div class="form-group">
                        <label>ISBN</label>
                        <br><input  type="text" name="isbn" id="isbn" size="30" value="<?php
                               if (isset($_SESSION['isbn'])) {
                                   echo $_SESSION['isbn'];
                               }
                               ?>"/>
                    </div>
                    <div class="form-group">
                        <label>Autor</label>
                        <br><input  type="text" name="autor" id="autor" size="30" value="<?php
                                    if (isset($_SESSION['autor'])) {
                                        echo $_SESSION['autor'];
                                    }
                                    ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="genero"> Gênero</label>
                        <br><select name="genero" id="genero" value="<?php
                                    if (isset($_SESSION['genero'])) {
                                        echo $_SESSION['genero'];
                                    }
                                    ?>">
                            <option value="romance"> Romance </option>
                            <option value="ficcao"> Ficcao </option>
                            <option value="drama"> Drama </option>
                            <option value="terror"> Terror </option>
                        </select>
                    </div>
                    <div class="form-group">

                        <label>Data de Publicacao</label>
                        <br><input  type="text" name="publi" id="publi" size="30" value="<?php
                        if (isset($_SESSION['publicacao'])) {
                            echo $_SESSION['publicacao'];
                        }
                        ?>"/>

                    </div>
                    <div class="form-text">
                        <label>Sobre o Livro</label>
                        <br><textarea   name="nota" id="nota" rows="10"><?php
                        if (isset($_SESSION['nota'])) {
                            echo $_SESSION['nota'];
                        }
                        ?></textarea>
                    </div>
                    <div class="form-group">
                        <?php if (isset($_SESSION['update'])) { ?>
                            <button type="submit" name="alterar" id="alterar" value="alterar">Alterar</button>
                        <?php } else { ?>
                            <button type="submit" name="salvar" id="salvar" value="salvar">Salvar</button>
                        <?php } ?>
                    </div>
                </form>
            </div>
        </div>
        <footer id="rodape" class="footer mt-auto py-1">
            <div class="container">
                <span> Biblioteca Municipal - Todos os direitos reservados.</span>
            </div>
        </footer>
    </body>
    <?php session_destroy() ?>

</html>

