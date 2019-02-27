<?php

require_once "BDconexao.php";
require_once "Usuario.php";

class CRUD_Usuario
{
    public function __construct() {
        $this->conexao = BDconexao::getConexao();
    }

    public function loginUser(Usuario $user)
    {
        $sql = $this->conexao->prepare("SELECT id_user, nome_user, senha FROM usuario WHERE nome_user = '{$user->getNomeUser()}' AND senha = '{$user->getSenha()}'");
        $sql->execute();
        $count = $sql->rowCount();
        try {
            return $count;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function insertuser(Usuario $user){

        $this->conexao = BDconexao::getConexao();

        $sql = "INSERT INTO usuario (nome_user, senha) VALUES ('{$user->getNomeUser()}','{$user->getSenha()}')";
        try {
            $this->conexao->exec($sql);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function updateuser(Usuario $user){
        $sql = "UPDATE usuario SET id_user = '{$user->getIdUser()}', nome_user = '{$user->getNomeUser()}', senha = '{$user->getSenha()}' WHERE id_user = '{$user->getIdUser()}'";
        try{
            $this->conexao->exec($sql);
        }catch (PDOException $e){
            return $e->getMessage();
        }
    }

    public function deleteuser($codigo){
        $sql = "DELETE FROM usuario WHERE id_user = '{$codigo}'";
        try{
            $this->conexao->exec($sql);
        }catch (PDOException $e){
            return $e->getMessage();
        }
    }

    public function getusers(){
        $sql = "SELECT * FROM usuario";
        $resultado = $this->conexao->query($sql);
        $usuarios = $resultado->fetchAll(PDO::FETCH_ASSOC);
//        foreach ($usuarios as $usuario) {
//            $id = $usuario['id_user'];
//            $nome = $usuario['nome_user'];
//            $senha = $usuario['senha'];
//            $obj = new Usuario($id,$nome,$senha);
//            $listaUsuarios[] = $obj;
//        }
        return $usuarios;
    }

    public function getuser($id){
        $sql = "SELECT * FROM usuario WHERE id_user =" . $id;
        $resultado = $this->conexao->query($sql);
        $usuario = $resultado->fetch(PDO::FETCH_ASSOC);
        $id = $usuario['id_user'];
        $nome = $usuario['nome_user'];
        $senha = $usuario['senha'];
        $objUser = new Usuario($id,$nome,$senha);
        return $objUser;
    }
}