<?php
require_once "../models/Livro.php";
require_once "../controllers/LivroController.php";
require_once "../controllers/GeneroController.php";
require_once "../controllers/EditoraController.php";
$livro = new Livro();
if (isset($_GET['id'])){
    $livro = LivroController::buscarLivro($_GET['id']);
}
if(isset($_POST['salvar'])){
    $foto = $_FILES["capa"];
    // Pega extensão da imagem
    preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
    // Gera um nome único para a imagem
    $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
    // Caminho de onde ficará a imagem
    $caminho_imagem = "images/" . $nome_imagem;
    // Faz o upload da imagem para seu respectivo caminho
    move_uploaded_file($foto["tmp_name"], $caminho_imagem);
    $livro->setId($_POST['id']);
    $livro->setTitulo($_POST['titulo']);
    $livro->setDescricao($_POST['descricao']);
    $livro->setAutor($_POST['autor']);
    $livro->setValor($_POST['valor']);
    $livro->setAno($_POST['ano']);
    $livro->setGenero(GeneroController::buscarGenero($_POST['genero']));
    $livro->setEditora(EditoraController::buscarEditora($_POST['editora']));
    $livro->setCapaImagem($nome_imagem);
    LivroController::salvar($livro);
    header('Location:listaLivros.php');
    //echo var_dump($livro);
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
            <!--Menu-->
            <?php
            include_once "menu.php";
            ?>
        </div>

        <div class="col-md-10">
            <!--Conteúdo-->
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Cadastro de Livros</h3>
                </div>
                <div class="card-body">
                    <form action="cadLivro.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $livro->getId();?>">
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label for="">Título</label>
                                <input type="text" class="form-control" placeholder="Título do livro" name="titulo" value="<?php echo $livro->getTitulo();?>">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="">Ano</label>
                                <input type="text" class="form-control" placeholder="1984" name="ano" value="<?php echo $livro->getAno();?>">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">Descrição</label>
                                <textarea name="descricao" id="" cols="30" rows="6" class="form-control"><?php echo $livro->getDescricao();?></textarea>
                            </div>
                            <div class="form-group col-md-8">
                                <label for="">Autor</label>
                                <input type="text" class="form-control" placeholder="Deitel" name="autor" value="<?php echo $livro->getAutor();?>">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="">Valor</label>
                                <input type="text" class="form-control" placeholder="50,00" name="valor" value="<?php echo $livro->getValor();?>">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="">Genero</label>
                                <select name="genero" id="" class="form-control">
                                    <?php
                                    $listaGeneros = GeneroController::trazerTodos();
                                    foreach($listaGeneros as $genero){
                                        if ($livro->getGenero()->getId() == $genero->getId()){
                                            echo "<option value = '" . $genero->getId() . "' selected>" . $genero->getNome() . "</option>";
                                        }else {
                                            echo "<option value = '" . $genero->getId() . "'>" . $genero->getNome() . "</option>";
                                        }
                                    }
                                    ?>
                                </select>

                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Editora</label>
                                <select name="editora" id="" class="form-control">
                                    <?php
                                    $listaEditoras = EditoraController::trazerTodos();
                                    foreach($listaEditoras as $editora){
                                        if ($livro->getEditora()->getId() == $editora->getId()){
                                            echo "<option value = '".$editora->getId()."' selected>".$editora->getNome()."</option>";
                                        }else{
                                            echo "<option value = '".$editora->getId()."'>".$editora->getNome()."</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">Capa do livro</label>
                                <input type="file" class="form-control" name="capa">
                            </div>
                            <button class="btn btn-primary" type="submit" name="salvar">Salvar</button>
                        </div><!--form-row-->
                    </form>
                </div><!--card-body-->
            </div><!--card-->
        </div>
    </div>
</div>

<script src="js/jquery-3.3.1.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>