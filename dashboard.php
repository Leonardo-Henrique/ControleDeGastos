<?php

    session_start();

    if($_SESSION['id']){




?>

<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>

        
    </head>

    <body>

        <h1>Cadastrar conta</h1>

        <form action="" method="post" id="cadastrar_conta">
            <input type="date" name="data">
            <input type="text" name="descricao" placeholder="Descrição da conta" id="descricao">
            <input type="number" name="valor" placeholder="Valor" id="valor">
            <input type="submit" name="enviar" value="Adicionar">

        </form>

    </body>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/script.js"></script>
</html>

<?php

    }else{
        header('Location: login.php');
    }

?>