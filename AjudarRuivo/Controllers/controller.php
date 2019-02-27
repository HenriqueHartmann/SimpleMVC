<?php
    session_start();
    require_once "../Models/CRUD_Usuario.php";

    if (isset($_GET['action'])) {
        $action = $_GET['action'];
    } else {
        $action = 'index';
    }

    switch ($action){
        case 'index':
            include_once "../Views/index.php";
            include_once "../Views/logout.php";
            break;

        case 'tabela_user':
            $crud = new CRUD_Usuario();
            $usuarios = $crud->getusers();
            include_once "../Views/tabela_user.php";
            include_once "../Views/logout.php";
            break;

        case 'logar':
            if(isset($_POST['nome']) and isset($_POST['senha'])) {
                $user = new Usuario(null,$_POST['nome'], $_POST['senha']);
                $usercrud = new CRUD_Usuario();
                if ($usercrud->loginUser($user) == 1){
                    $_SESSION['logado'] = true;
                    header('location: ?action=index');
//                    if (isset($_SESSION['logado'])){
//                        echo "sim";
//                    }else {
//                        echo "não";
//                    }
                } else {
                    header('location: controller.php?action=index&erro=1');
                }
            }
            break;

        case 'logout':
            session_destroy();
            header('location: ?action=index');
            break;

        case 'cadastrar':
            $user = new Usuario(null,$_POST['nome'], $_POST['senha']);
//            echo $user->getNomeUser();
//            echo $user->getSenha();
            $usercrud = new CRUD_Usuario();
            $usercrud->insertuser($user);
            header('location: ?action=tabela_user');
            break;

        case 'editar-view':
            $codigo = $_GET['codigo'];
            $usercrud = new CRUD_Usuario();
            $user = $usercrud->getuser($codigo);
            include_once "../Views/editar-view.php";
            include_once "../Views/logout.php";
            break;

        case 'editar-action':
            $s_user = new Usuario($_POST['id'], $_POST['nome'], $_POST['senha']);
            $usercrud = new CRUD_Usuario();
            $user = $usercrud->updateuser($s_user);
            header('location: ?action=tabela_user');
            break;

        case 'excluiruser':
            $codigo = $_GET['codigo'];
            $cruduser = new CRUD_Usuario();
            $cruduser->deleteuser($codigo);
            header('location: ?action=tabela_user');
            break;
    }