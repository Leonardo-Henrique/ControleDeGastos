<?php

  session_start();

  $var = 'n';
  echo $var;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar nova Conta</title>
    <link rel="stylesheet" type="text/css" href="css/dashboard-style.css" />
    <link rel="stylesheet" type="text/css" href="css/conta-single.css" />
    <link rel="stylesheet" type="text/css" href="css/cadastrar-conta.css" />
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
            <h1>Cadastrar conta</h1>
        </div>

        <div class="bill-single">

          <form id="cad" action="" method="post">

              <div class="inpt-box">
                <span>Data</span>
                <input type="date" name="data">
              </div>
              

              <div class="inpt-box">
                <span>Identificação</span>
                <input type="text" name="nome" placeholder="" name="nome">
              </div>

              <div class="inpt-box">
                <span>Descrição</span>    
                <input type="text" name="descricao" placeholder="" name="descricao">
              </div>

              <div class="inpt-box">
                <span>Valor</span>
                <input type="text" name="valor" placeholder="" name="valor">
              </div>

              <div class="inpt-box">
                <input type="submit" value="Cadastrar" name="cadastrar">
              </div>
          </form>

            <div class="clear">

              
            </div>
        </div>

        <?php

          if(isset($_POST['cadastrar'])){

            $data = $_POST['data'];
            $descricao = $_POST['descricao'];
            $nome = $_POST['nome'];
            $valor = $_POST['valor'];

            include 'class/Conta.php';

            $novaConta = new Conta($data, $descricao, $valor, $_SESSION['id'], $nome);

            $novaConta->cadastrarContaCompleta();


          }

        ?>

    </div>

    </div><!-- container -->

    
    
</body>
</html>