<?php
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EXEMPLO</title>
</head>
<body>
<a href="?action=index">HOME</a>
    <table>
        <thead>
            <tr>
                <th>ID_USER</th>
                <th>NOME_USER</th>
                <th>SENHA</th>
            </tr>
        </thead>
            <tbody>
                <?php
                if($usuarios != null) {
                    foreach ($usuarios as $usuario): ?>
                        <tr>
                            <th scope="row"><?= $usuario['id_user'] ?></th>
                            <td><?= $usuario['nome_user'] ?></td>
                            <td><?= $usuario['senha'] ?></td>
                            <td><a href="?action=editar-view&codigo=<?= $usuario['id_user'] ?>">Editar</a> |
                                <a href="?action=excluiruser&codigo=<?= $usuario['id_user'] ?>">Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach;
                }else{
                    echo "<div>
            <div>
                <div>
                    <h2>Sem Usuários existentes</h2>
                </div>";
                    $usuarios = new Usuario();
                }
                ?>
            </tbody>
    </table>

