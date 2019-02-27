<?php
if (isset($_SESSION['logado'])) {
    echo "session on";
}else{
    echo "session off";
}
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <?php if(empty($_SESSION['logado'])) { ?>
        <h3>Logar Usuário</h3>
        <form method="post" action="../Controllers/controller.php?action=logar">
            <label>Nome</label>
            <input id="name" name="nome" type="text" maxlength="40" required>
            <label>Senha</label>
            <input id="password" name="senha" type="password" maxlength="40" required>
            <button type="submit" VALUE="Enviar">Logar</button>
        </form>

        <br>
    <?php } ?>

    <h3>Cadastrar Usuário</h3>
    <form method="post" action="../Controllers/controller.php?action=cadastrar">
        <label>Nome</label>
        <input id="name" name="nome" type="text" maxlength="40" required>
        <label>Senha</label>
        <input id="password" name="senha" type="password" maxlength="40" required>
        <button type="submit" VALUE="Enviar">Cadastrar</button>
    </form>

    <br>

    <?php if(isset($_SESSION['logado'])) { ?>
        <a href="../Controllers/controller.php?action=tabela_user">Tabela Usuario</a>
    <?php } ?>



