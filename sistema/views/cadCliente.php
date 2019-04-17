<?php
require_once "../models/Cliente.php";
require_once "../controllers/ClienteController.php";

$cliente = new Cliente();

if(isset($_POST['salvar'])){
    $cliente->setId(0);
    $cliente->setNome($_POST['nome']);
    $cliente->setCpf($_POST['cpf']);
    $cliente->setEndereco($_POST['endereco']);
    $cliente->setEmail($_POST['email']);
    $cliente->setSenha(md5($_POST['senha']));
    $cliente->setTelefone($_POST['telefone']);

    ClienteController::inserir($cliente);
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
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="">Nome</label>
                            <input type="text" class="form-control" placeholder="Nome" name="nome">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">CPF</label>
                            <input type="text" class="form-control" placeholder="999.999.999-99" name="cpf">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="">Endereço</label>
                            <input type="text" class="form-control" placeholder="Rua tal, n 00, Setor, Bairro, Cidade" name="endereco">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">E-mail</label>
                            <input type="email" class="form-control" placeholder="exemplo@email.com" name="email">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">Senha</label>
                            <input type="password" class="form-control" placeholder="Senha de 7 digitos" name="senha">
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

