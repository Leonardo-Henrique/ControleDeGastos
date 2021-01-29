<?php

    session_start();

    if($_SESSION['id']){
        
    include 'class/Conta.php';

    $totalContas = new Conta(null, null, null, null, null);



?>

<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>

        <link rel="stylesheet" type="text/css" href="css/dashboard-style.css" />
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

                    <li class="li-active"><i class="fas fa-home" style="color: #fff;"></i><a href="" style="color:#fff;">Dashboard</a></li>
                    <li><i class="fas fa-copy" style="color: #b7b7b7;"></i><a href="">Contas</a></li>
                    <li><i class="fas fa-cog" style="color: #b7b7b7;"></i><a href="">Configurações</a></li>
                    <li><i class="fas fa-power-off" style="color: #b7b7b7;"></i><a href="sair.php">Sair</a></li>

                </nav>
            
            </div><!-- LEFT COLUMN -->

            <div class="col-right-pesquisa">
            
            </div>

            <div class="col-right">

                <div class="header">
                    
                    
                    <div class="header-l">

                    <span>Cadastrar conta rapidamente</span><br><br>


                        <form class="insert-bills" action="" id="cadastrar_conta">
                            <input type="text" name="descricao" placeholder="Descrição da conta" id="descricao">
                            <input type="number" name="valor" placeholder="Valor" id="valor" step="0.01">
                            <input type="submit" name="enviar" value="Adicionar">
                            <a href="cadastrar-conta.php">adicionar detalhes +</a>
                            <div class="clear"></div>
                        </form>
                       
                        <!-- <h1>Olá, Leonardo!</h1>
                        <p>O que vamos fazer hoje?</p> -->
                    </div>

                    <div class="header-r">
                        <div class="user">
                            <span>Leonardo Henrique </span><i class="fas fa-chevron-down"></i>
                        </div>
                    </div>
                
                </div>

                <div class="clear"></div>

                <div class="resume">

                    


                    <div class="resume-l">

                        <span>Resumo</span><br><br>

                        <div class="r-l-b1">

                            <span class="legend">contas em aberto</span><br>

                            <?php
                                $totalContas->totalContas($_SESSION['id']);
                            ?>

                        </div>

                        <div class="r-l-b1">

                            <span class="legend">em conta</span><br>
                            <span class="value">R$ 1330</span>
                            
                        </div>

                    </div>

                    <div class="clear"></div>
                </div>

                <div class="bills">
                    
                    <div class="bills-header">

                        <span class="left-span">Suas contas</span>
                        <span class="right-span"><a href="">Ver tudo</a></span>

                    </div>

                    <table>

                        <tr>
                            <th>Data</th>
                            <th>Informação</th>
                            <th>Valor</th>
                        </tr>

                    </table>
                    <table class="retorno">
                        

                        <!-- <tr class="retorno">

                        </tr> -->

                        <!-- <tr>
                            <td>23 de junho</td>
                            <td>Conta de luz</td>
                            <td>R$ 225,20</td>
                        </tr>

                        <tr>
                            <td>23 de junho</td>
                            <td>Conta de luz</td>
                            <td>R$ 225,20</td>
                        </tr>

                        <tr>
                            <td>23 de junho</td>
                            <td>Conta de luz</td>
                            <td>R$ 225,20</td>
                        </tr>

                        <tr>
                            <td>23 de junho</td>
                            <td>Conta de luz</td>
                            <td>R$ 225,20</td>
                        </tr>

                        <tr>
                            <td>23 de junho</td>
                            <td>Conta de luz</td>
                            <td>R$ 225,20</td>
                        </tr> -->
                    </table>

                </div>

            </div><!-- RIGHT COLUMN -->
        
        
        </div>






        <!-- <a href="sair.php">Sair</a>

        <h1>Cadastrar conta</h1>

        <form action="" method="post" id="cadastrar_conta">
            <input type="date" name="data">
            <input type="text" name="descricao" placeholder="Descrição da conta" id="descricao">
            <input type="number" name="valor" placeholder="Valor" id="valor">
            <input type="submit" name="enviar" value="Adicionar">

        </form>

        <div class="retorno">
            
        </div> -->


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="js/script.js"></script>
    </body>

   
</html>

<?php

    }else{
        header('Location: login.php');
    }

?>