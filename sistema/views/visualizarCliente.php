<?php


require_once "../controllers/ClienteController.php";

$cliente = new Cliente();

if (isset($_GET['id'])) {
    $cliente = ClienteController::visualizar($_GET['id']);
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
        <!--conteudo -->
                <h2> Dados do Cliente </h2>

                <div class = "container-fluid">

                <div class ="row">
                   <div class="cal-md-1"><b>Nome:</b> </div>
                   <div class="cal-md-7"><?php echo $cliente->getNome();?></div></div>
                   <div class="cal-md-1"><b>CPF:</b></div>
                   <div class="cal-md-7"><?php echo $cliente->getCpf();?></div>
                  </div>

                <div class="row">
                   <div class="cal-md-1"><b>Endereço:</b></div>
                   <div class="cal-md-7"><?php echo $cliente->getEndereco();?></div>
                </div>

                 <div class="row">
                   <div class="cal-md-1"><b>Telone:</b></div>
                   <div class="cal-md-7"><?php echo $cliente->getTelefone();?></div>
                 </div>

                <div class="row">
                   <div class="cal-md-1"><b>E-mail:</b></div>
                   <div class="cal-md-7"><?php echo $cliente->getEmail();?></div><br>
                 </div>

                 <a href="listaClientes.php" class="btn btn-primary">Voltar</a>
        </div>
</div>
</div>


    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>



