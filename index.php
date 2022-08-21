<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Cadastro de Usuários</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="?page=index.php">Home</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="?page=novo">Novo Usuário</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="?page=listar">Listar Usuários</a>
                        </li>
                    </ul>
                </div>
        </div>
    </nav>

        <div class="container">
            <div class="row">
                <div class="col mt-5">
                    <?php
                        include("config.php");
                        switch($_REQUEST["page"]){
                            case "novo":
                                include("novo-usuario.php");
                                break;
                            case "listar":
                                include("listar-usuario.php");
                                break;
                            case "salvar":
                                include("salvar-usuario.php");
                                break;
                            case "editar":
                                include("editar-usuario.php");
                                break;
                            default:
                            print "<h1>Bem vindos!</h1>";    
                        }
                    ?>
                </div>
            </div>
        </div>

    <script src="js/script.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html> 