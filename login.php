<?php

    include 'class/Usuario.php';

?>

<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
    </head>

    <body>

        <h1>Usuário</h1>

        <form method="post">
            <input type="email" name="email" placeholder="Seu email">
            <input type="password" name="senha" placeholder="Senha">
            <input type="submit" name="enviar" value="Enviar">
        </form>

        <?php

            if(isset($_POST['enviar'])){

                $email = $_POST['email'];
                $senha = $_POST['senha'];

                $loginUsuario = new Usuario(null, null, null);

                $loginUsuario->logarUsuario($email, $senha);

            }

        ?>
        
    </body>

</html>