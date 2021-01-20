<?php

    class Conta{

        // public $data;
        public $descricao;
        public $valor;
        protected $id_usuario;

        function __construct($descricao, $valor, $id_usuario){
            $this->descricao = $descricao;
            $this->valor = $valor;
            include 'conexao.php';
            $this->pdo = $pdo;
            $this->id = $id_usuario;
        }

        public function cadastrarConta(){

            $dadosConta = [
                'descricao' => $this->descricao,
                'valor'     => $this->valor,
                'id'        => $this->id
            ];

            $sql = "INSERT into conta (descricao, valor, usuario_id) values (:descricao, :valor, :id)";

            $stmt = $this->pdo->prepare($sql);

            $stmt->execute($dadosConta);

        }

    }