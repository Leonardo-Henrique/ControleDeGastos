<?php

    session_start();
    include 'class/Conta.php';


    $descricao = $_POST['descricao'];
    $valor = $_POST['valor'];

    $novaConta = new Conta($descricao, $valor, $_SESSION['id']);

    $novaConta->cadastrarConta();


?>