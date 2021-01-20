<?php

    include 'class/Usuario.php';

?>
<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro de Usuário</title>
    </head>

    <body>

        <h1>Cadastro de usuário</h1>
        
        <form method="post" action="">

            <input type="text" name="nome" placeholder="Seu nome"><br>

            <input type="email" name="email" placeholder="Seu e-mail"><br>

            <input type="password" name="senha" placeholder="Senha"><br>

            <input type="submit" name="enviar" value="Cadastrar">

        </form>

        <?php

            if(isset($_POST['enviar'])){

                $nome = $_POST['nome'];
                $email = $_POST['email'];
                $senha = $_POST['senha'];

                $novoUsuario = new Usuario($nome, $email, $senha);

                $novoUsuario->cadastrarUsuario();

            }
        
        ?>

    </body>
</html>