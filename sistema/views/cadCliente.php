<?php
require_once "../models/Cliente.php";
require_once "../controllers/ClienteController.php";

$cliente = new Cliente();

if (isset($_GET['id'])) {
    $cliente = ClienteController::visualizar($_GET['id']);
}


if(isset($_POST['salvar'])){
    $cliente->setId($_POST['id']);
    $cliente->setNome($_POST['nome']);
    $cliente->setCpf($_POST['cpf']);
    $cliente->setEndereco($_POST['endereco']);
    $cliente->setEmail($_POST['email']);
    $cliente->setSenha(md5($_POST['senha']));
    $cliente->setTelefone($_POST['telefone']);

    ClienteController::salvar($cliente);
    header('Location: listaClientes.php');  // adicionar no banco de dados
    // echo var_dump($cliente); // mostrar os dados na tela após salvar

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
            <div class="card">
             <div class="card-header">
                <h3 class="text-center">Cadastro de Clientes</h3>
            </div>
            <div class="card-body">
                <form action="cadCliente.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $cliente->getId();?>"> <!--ocultar o ID-->
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="">Nome</label>
                            <input type="text" class="form-control" placeholder="Nome" name="nome" value="<?php echo $cliente->getNome();?>">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">CPF</label>
                            <input type="text" class="form-control" placeholder="999.999.999-99" name="cpf" value="<?php echo $cliente->getCpf();?>">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="">Endereço</label>
                            <input type="text" class="form-control" placeholder="Rua tal, n 00, Setor, Bairro, Cidade" name="endereco" value="<?php echo $cliente->getEndereco();?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">E-mail</label>

                            <?php if ($cliente->getId()>0) {?>

                            <input type="email" class="form-control" placeholder="exemplo@email.com" name="email" disabled value="<?php echo $cliente->getEmail();?>">

                        <?php } else { ?>
                                <input type="email" class="form-control" placeholder="exemplo@email.com" name="email" value="<?php echo $cliente->getEmail();?>">
                            <?php } ?>

                    </div>
                        <div class="form-group col-md-3">
                            <label for="">Senha</label>

                            <?php if ($cliente->getId()<=0) { ?>

                            <input type="password" class="form-control" placeholder="Senha de 7 digitos" name="senha">
                            <?php } ?>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">Telefone</label>
                            <input type="text" class="form-control" placeholder="(99)99999-9999" name="telefone">
                        </div>
                        <button class="btn btn-primary" type="submit" name="salvar">Salvar</button>
                     </div>
                </form>
              </div>
            </div>
       </div>
     </div>
   </div>


<script src="js/jquery-3.3.1.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>

