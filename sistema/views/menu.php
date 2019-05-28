<?php
require_once "../models/Cliente.php";
session_start();
if (isset($_SESSION['user'])){
    $cliente = new Cliente();
    $cliente = unserialize($_SESSION['user']);
    echo "Bem vindo ".$cliente->getNome()."<br>";
    echo "<a class='btn btn-primary' href='login.php?logout=true'>Sair</a>";
}else{
    header("Location: login.php");
}


?>
<ul class="nav flex-column">

    <!--ATALHO PARA CRIAR as 3 linhas abaixo, digitar e tab: li.nav-item*3>a.nav-link.active -->

    <li class="nav-item">
        <a class="nav-link active" href="listaClientes.php">Gerenciar Clientes</a>

    <li class="nav-item">
        <a class="nav-link active" href="listaEditoras.php">Gerenciar Editoras</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="listaGeneros.php">Gerenciar Gêneros</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="listaLivros.php">Gerenciar Livros</a>
    </li>

    </ul>