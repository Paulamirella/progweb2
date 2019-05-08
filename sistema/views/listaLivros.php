<?php


require_once "../controllers/LivroController.php";


if(isset($_GET['excluir'])){
    ClienteController::excluir($_GET['excluir']);
}

?>


<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Document</title>
</head>
<body>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
            <!-- Menu -->
            <?php
            include_once "menu.php";
            ?>
        </div>
        <div class="col-md-10">

            <!--Conteúdo -->
            <br>
            <a href="cadLivro.php" class = "btn btn-success"> Novo </a>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>-</th>
                </tr>
                </thead>
                <tbody>

                <?php
                $listaLivros = LivroController::trazerTodos();
                foreach ($listaLivros as $livro) {

                    echo "<tr>";
                    echo "<td>" . $livro->getTitulo() . "</td>";
                    echo "<td>" . $livro->getAutorl() . "</td>";
                    echo "<td>";
                    echo "<a href='visualizarLivro.php?id=".$livro->getId()."' class = \"btn btn-info\"> Visualizar </a>";
                    echo " ";
                    echo "<a href='cadLivro.php?id=".$livro->getId()."' class = \"btn btn-primary\"> Editar </a>";
                    echo " ";
                    echo "<a href='listaLivros.php?excluir=".$livro->getId()."' class = \"btn btn-danger\"> Remover </a>";

                    echo "</td>";
                    echo "</tr>";


                }
                ?>

                </tbody>
            </table>


        </div>



        <script src="js/jquery-3.3.1.js"></script>
        <script src="js/bootstrap.min.js"></script>
</body>
</html>






