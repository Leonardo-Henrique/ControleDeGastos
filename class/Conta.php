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
            header('Content-Type: application/json');

            $dadosConta = [
                'descricao' => $this->descricao,
                'valor'     => $this->valor,
                'id'        => $this->id
            ];

            $sql = "INSERT into conta (descricao, valor, usuario_id) values (:descricao, :valor, :id)";

            $stmt = $this->pdo->prepare($sql);

            $stmt->execute($dadosConta);

        }

        public function selecionarContas($id){
            header('Content-Type: application/json');

            $sql = "SELECT * from conta WHERE usuario_id = $id";

            echo json_encode($dados = $this->pdo->query($sql)->fetchAll());


        }

        public function totalContas($id){

            $sql = "SELECT sum(valor) from conta WHERE usuario_id = $id";

            $dados = $this->pdo->query($sql)->fetchAll();

            foreach($dados as $linha){
                echo "<span class='value'>R$ ".$linha['sum(valor)']."</span>";
            }

        }

    }