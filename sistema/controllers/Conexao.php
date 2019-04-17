<?php
/**
 * Created by PhpStorm.
 * User: alunos
 * Date: 02/04/19
 * Time: 21:42
 */

class Conexao{

    private static $instance;

    private function __construct(){
    }

    public static function getInstance(){
        if(!isset(self::$instance)) {
            self::$instance = new PDO( 'mysql:host=localhost;dbname=pw2_20191paula', 'desenv','123456');

                        self::$instance->setAttribute( PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }

        return self::$instance;
    }


}