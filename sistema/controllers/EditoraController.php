<?php

require_once "../models/Editora.php";
require_once "Conexao.php";


class EditoraController
{
    public static function salvar(Editora $editora)
    {

        if ($editora->getId() > 0) {
            return self::alterar($editora);

        } else {
            return self::inserir($editora);
        }
    }

    public static function alterar(Editora $editora)
    {

        $sql = "UPDATE editora SET nome = :nome WHERE id = :id";

        $db = Conexao::getInstance();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':nome', $editora->getNome());
        $stmt->bindValue(':id', $editora->getId());
        $stmt->execute();
    }


    public static function inserir(Editora $editora)
    {

        $sql = "INSERT INTO editora(nome) VALUES (:nome)";

        $db = Conexao::getInstance();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':nome', $editora->getNome());

        $stmt->execute();

        return "OK!";

    }

    private static function popularEditora($itemLista)
    {

        $editora = new Editora();
        $editora->setId($itemLista["id"]);
        $editora->setNome($itemLista["nome"]);
        return $editora;
    }

    public static function trazerEditoras()
    {

        $sql = "SELECT * FROM editora ORDER BY nome";
        $db = Conexao::getInstance();
        $stmt = $db->query($sql);
        $listagem = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $arrRetorno = array();
        foreach ($listagem as $itemLista) {
            $arrRetorno[] = self::popularEditora($itemLista);
        }

        return $arrRetorno;
    }

    public static function visualizar($id)
    {
        $sql = "SELECT * FROM editora WHERE id = :id";
        $db = Conexao::getInstance();

        $stmt = $db->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();

        $listagem = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($listagem) > 0) {
            return self::popularEditora($listagem[0]);

        }

    }




    public static function excluir($id)
    {

        $sql = "DELETE FROM editora WHERE id = :id";
        $db = Conexao::getInstance();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
    }


}

