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

        
        
    </body>
</html>

<?php

    }else{
        header('Location: login.php');
    }

?>