<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form action="#" method="post">
    <input type="number" name="patinhos">
    <input type="submit" value="Enviar" name="enviar">
</form>

<?php

if(isset($_POST['enviar'])) {
    for ($i = $_POST["patinhos"]; $i >=1; $i--) {
        echo $i. " patinhos foram passear<br>";
        echo "além das montanhas para brincar<br>";
        echo "a mamãe patinha fez quá quá quá<br>";
        if ($i == 1){
            echo "mas nenhum patinho voltou de lá<br>";}
        else {
            echo "mas somente ".($i-1)." patinhos voltaram de lá. <br><br>";
        }

    }



    $mensagem= $_POST["mensagem"];
    echo "<h1>$mensagem</h1>";


    for($i=0; $i<=4; $i++) {
        echo $mensagem;
    }
}

?>

</body>
</html>




