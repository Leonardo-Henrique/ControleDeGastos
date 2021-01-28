<?php

    session_start();
    include 'class/Conta.php';

    echo $id_conta = $_GET['conta'];

    $conta = new Conta(null, null, null);

    $conta->apagarConta($_SESSION['id'], $id_conta);
?>