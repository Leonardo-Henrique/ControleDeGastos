<?php

    session_start();


    if($_SESSION['id']){
        
        include 'class/Conta.php';

        $id_Conta = $_GET['conta'];

        $conta = new Conta(null, null, null, null, null);

?>
<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Conta</title>
        <link rel="stylesheet" type="text/css" href="css/dashboard-style.css" />
        <link rel="stylesheet" type="text/css" href="css/conta-single.css" />
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;400;500;600&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/9ac6cfa819.js" crossorigin="anonymous"></script>
    </head>

    <body>

        <div class="container">

            <div class="col-left">

                <nav class="menu">

                    <li>
                     <form class="search">
                        <i class="fas fa-search"style="color: #b7b7b7;"></i><input type="text" placeholder="Pesquisar por contas" id="pesquisar">
                            <!-- <input type="submit">    -->
                        </form>
                    </li>

                    <li><i class="fas fa-home" style="color: #b7b7b7;"></i><a href="dashboard.php">Dashboard</a></li>
                    <li class="li-active"><i class="fas fa-copy" style="color: #fff;"></i><a href="" style="color:#fff;">Contas</a></li>
                    <li><i class="fas fa-cog" style="color: #b7b7b7;"></i><a href="">Configurações</a></li>
                    <li><i class="fas fa-power-off" style="color: #b7b7b7;"></i><a href="sair.php">Sair</a></li>

                </nav>
            
            </div><!-- LEFT COLUMN -->

            <div class="col-right">

               

                <div class="header">
                    <h1>Conta</h1>
                </div>

                <div class="bill-single">

                    <?php

                        $conta->buscarContaSingle($_SESSION['id'], $id_Conta);

                    ?>
                

                    <div class="clear"></div>

                    <div class="bills-action">

                        <div class="bills-buttons">
                            <a href="">Editar</a>
                            <a href='excluir-conta.php?conta=<?php echo $id_Conta;  ?>' style="background: #ED303C;">Excluir</a>
                        </div>

                        <div class="clear"></div>
                    </div>
                
                </div>
            </div>

        </div><!-- container -->
        
    </body>
</html>
<?php

    }else{
        header("Location: login.php");

    
    }

?>