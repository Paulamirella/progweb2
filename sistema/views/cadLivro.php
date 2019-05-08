<?php
require_once "../models/Livro.php";
require_once "../controllers/LivroController.php";
require_once "../controllers/GeneroController.php";
require_once "../controllers/EditoraController.php";


$livro = new Livro();

if (isset($_GET['id'])) {
    $livro = LivroController::visualizar($_GET['id']);
}


if(isset($_POST['salvar'])){
    $livro->setId($_POST['id']);
    $livro->setTitulo($_POST['titulo']);
    $livro->setDescricao($_POST['descricao']);
    $livro->setAutor($_POST['autor']);
    $livro->setValor(md5($_POST['valor']));
    $livro->setAno($_POST['ano']);

    $livro->setGenero(GeneroController::visualizar($_POST['genero']));
    $livro->setEditora(EditoraController::visualizar($_POST['editora']));


   LivroController::salvar($livro);
    header('Location: listaLivros.php');  // adicionar no banco de dados
    // echo var_dump($livro); // mostrar os dados na tela após salvar

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
                    <h3 class="text-center">Cadastro de Livros</h3>
                </div>
                <div class="card-body">
                    <form action="cadCliente.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $livro->getId();?>"> <!--ocultar o ID-->
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label for="">Título</label>
                                <input type="text" class="form-control" placeholder="Título do Livro" name="titulo" value="<?php echo $livro->getTitulo();?>">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="">Ano</label>
                                <input type="text" class="form-control" placeholder="1984" name="ano" value="<?php echo $livro->getAno();?>">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">Descrição</label>
                                <textarea name="descricao" id="" cols="30" rows="10" class="form-control" value="<?php echo $livro->getDescricao();?>">
                                </textarea>


                                <input type="text" class="form-control" placeholder="Rua tal, n 00, Setor, Bairro, Cidade" name="endereco">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">E-mail</label>

                                <?php if ($livro->getId()>0) {?>

                                    <input type="email" class="form-control" placeholder="exemplo@email.com" name="email" disabled>

                                <?php } else { ?>
                                    <input type="email" class="form-control" placeholder="exemplo@email.com" name="email">
                                <?php } ?>

                            </div>
                            <div class="form-group col-md-3">
                                <label for="">Senha</label>

                                <?php if ($livro->getId()<=0) { ?>

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

