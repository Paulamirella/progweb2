<?php

require_once "../models/Genero.php";
require_once "Conexao.php";


class GeneroController{


    public static function salvar(Genero $genero)
    {

        if ($genero->getId() > 0) {
            return self::alterar($genero);

        } else {
            return self::inserir($genero);
        }
    }

    public static function alterar(Genero $genero)
    {

        $sql = "UPDATE genero SET nome = :nome WHERE id = :id";

        $db = Conexao::getInstance();
        $stmt = $db->prepare($sql);

        $stmt->bindValue(':nome', $genero->getNome());
        $stmt->bindValue(':id', $genero->getId());

        $stmt->execute();
    }


    public static function inserir(Genero $genero)
    {

        $sql = "INSERT INTO genero(nome) VALUES (:nome)";

        $db = Conexao::getInstance();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':nome', $genero->getNome());

        $stmt->execute();

        return "OK!";

    }

    private static function popularGenero($itemLista)
    {

        $genero = new Genero();
        $genero->setId($itemLista["id"]);
        $genero->setNome($itemLista["nome"]);

        return $genero;
    }

    public static function trazerGeneros()
    {

        $sql = "SELECT * FROM genero ORDER BY nome";
        $db = Conexao::getInstance();
        $stmt = $db->query($sql);
        $listagem = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $arrRetorno = array();
        foreach ($listagem as $itemLista) {
            $arrRetorno[] = self::popularGenero($itemLista);
        }

        return $arrRetorno;
    }


    public static function excluir($id)
    {

        $sql = "DELETE FROM genero WHERE id = :id";
        $db = Conexao::getInstance();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
    }

    public static function visualizar($id)
    {

        $sql = "SELECT * FROM genero WHERE id = :id";
        $db = Conexao::getInstance();

        $stmt = $db->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();

        $listagem = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($listagem) > 0) {
            return self::popularGenero($listagem[0]);
        }

    }
}


