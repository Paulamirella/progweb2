<?php
require_once "../models/Cliente.php";
require_once "Conexao.php";


class ClienteController
{
    public static function inserir(Cliente $cliente){

            $sql = "INSERT INTO cliente (nome, cpf, endereco, email, telefone, senha) VALUES (:nome, :cpf, :endereco, :email, :telefone, :senha)";

            $db = Conexao::getInstance();
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':nome', $cliente->getNome());
            $stmt->bindValue(':cpf', $cliente->getCpf());
            $stmt->bindValue(':endereco', $cliente->getEndereco());
            $stmt->bindValue(':email', $cliente->getEmail());
            $stmt->bindValue(':telefone', $cliente->getTelefone());
            $stmt->bindValue(':senha', $cliente->getSenha());

            $stmt->execute();

                /*

            $sql .= '"' .$cliente-> getNome().     '",';
            $sql .= '"' .$cliente-> getCpf().      '",';
            $sql .= '"' .$cliente-> getEndereco(). '",';
            $sql .= '"' .$cliente-> getEmail(). '",';
            $sql .= '"' .$cliente-> getTelefone(). '",';
            $sql .= '"' .$cliente-> getSenha(). '")'; */





            // return $sql;
            //return var_dump($cliente);

    }



}