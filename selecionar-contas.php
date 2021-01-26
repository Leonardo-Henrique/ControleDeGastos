<?php

    session_start();
    include 'class/Conta.php';

    $selecionaConta = new Conta(null, null, null);

    $selecionaConta->selecionarContas($_SESSION['id']);

?>