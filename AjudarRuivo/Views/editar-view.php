
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>EDITAR USUÁRIO</h1>
    <form method="post" action="../Controllers/controller.php?action=editar-action">
        <label>Id</label>
        <input id="id_user" name="id" type="text" value="<?php echo $user->getIdUser() ?>">
        <label>Nome</label>
        <input id="name" name="nome" type="text" maxlength="40" value="<?php echo $user->getNomeUser() ?>">
        <label>Senha</label>
        <input id="password" name="senha" type="password" maxlength="40" value="<?php echo $user->getSenha() ?>">
        <button type="submit" value="Enviar">Enviar</button>
    </form>

