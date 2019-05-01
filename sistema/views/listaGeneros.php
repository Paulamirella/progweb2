<?php

require_once "../controllers/GeneroController.php";

if(isset($_GET['excluir'])) {
    GeneroController::excluir($_GET['excluir']);

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

            <?php
            include_once "menu.php";
            ?>
        </div>
        <div class="col-md-10">
            <br>
            <a href="cadGenero.php" class="btn btn-success"> Novo </a>
            <table class="table table hover">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>-</th>
                </tr>
                </thead>
                <tbody>

                <?php
                $listaGeneros = GeneroController::trazerGeneros();
                foreach ($listaGeneros as $genero) {

                    echo "<tr>";
                    echo "<td>" . $genero->getNome() . "</td>";
                    echo "<td>";
                    echo "<a href='cadGenero.php?id=".$genero->getId()."' class = \"btn btn-primary\"> Editar </a>";
                    echo " ";
                    echo "<a href='listaGeneros.php?excluir=".$genero->getId()."' class = \"btn btn-danger\"> Remover </a>";

                    echo"</td>";
                    echo"</tr>";
                }
                ?>

                </tbody>
            </table>
        </div>

    </div>
</div>

<script src="js/jquery-3.3.1.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>

