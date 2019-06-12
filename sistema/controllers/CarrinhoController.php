<?php
require_once "../models/ItemCarrinho.php";
require_once "../controllers/LivroController.php";

class CarrinhoController
{
    public static function adicionarItem($livro)
    {
        if (!self::existeItemNoCarrinho($livro)) {
            $carrinho = array();
            if (isset($_SESSION['carrinho'])) {
                $carrinho = unserialize($_SESSION['carrinho']);
            }
            $itemCarrinho = new ItemCarrinho();
            $itemCarrinho->setLivro(LivroController::buscarLivro($_GET['livro']));
            $itemCarrinho->setQuantidade(1);
            $carrinho[] = $itemCarrinho;
            $_SESSION['carrinho'] = serialize($carrinho);
        }
    }
    private static function existeItemNoCarrinho($livro)
    {
        if (isset($_SESSION['carrinho'])) {
            $carrinho = unserialize($_SESSION['carrinho']);
            foreach ($carrinho as $itemCarrinho) {
                if ($livro == $itemCarrinho->getLivro()->getId()) {
                    return true;
                }
            }
        }
        return false;
    }
    public static function removerItemCarrinho($posicao){
        if (isset($_SESSION['carrinho'])) {
            $carrinho = unserialize($_SESSION['carrinho']);
            array_splice($carrinho, $posicao, 1);
            if (count($carrinho) == 0){
                unset($_SESSION['carrinho']);
            }else{
                $_SESSION['carrinho'] = serialize($carrinho);
            }
        }
    }
}