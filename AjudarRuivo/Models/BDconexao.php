<?php

class BDconexao {

    const HOST      = "localhost";
    const NOMEBANCO = "usuario";
    const USUARIO   = "root";
    const SENHA     = "";//pq é windows
//!!!Substitua daqui para baixo

    public static $conexao = null;


    public static function getConexao(){

        try{
            if(self::$conexao == null){
                self::$conexao = new PDO("mysql:host=".self::HOST.";dbname=".self::NOMEBANCO.";charset=utf8", self::USUARIO, self::SENHA);
                self::$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }

            return self::$conexao;

        }catch(PDOException $e){
            die("Falhou a conexao ou ocorreu um erro banco: " . $e->getMessage());
        }

        return $conexao;
    }
}
//teste conexao
$con = new BDconexao();
$con->getConexao();