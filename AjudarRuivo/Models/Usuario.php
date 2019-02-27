<?php

class Usuario
{
    private $id_user;
    private $nome_user;
    private $senha;

    public function __construct($id_user=null,$nome_user=null,$senha=null)
    {
        $this->id_user = $id_user;
        $this->nome_user = $nome_user;
        $this->senha = $senha;
    }


    public function getIdUser()
    {
        return $this->id_user;
    }


    public function setIdUser($id_user)
    {
        $this->id_user = $id_user;
    }


    public function getNomeUser()
    {
        return $this->nome_user;
    }


    public function setNomeUser($nome_user)
    {
        $this->nome_user = $nome_user;
    }


    public function getSenha()
    {
        return $this->senha;
    }


    public function setSenha($senha)
    {
        $this->senha = $senha;
    }


}