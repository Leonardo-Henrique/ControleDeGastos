<?php

    class Conta{

        public $data;
        public $descricao;
        public $valor;
        protected $id_usuario;
        public $nome;

        function __construct($data, $descricao, $valor, $id_usuario, $nome){
            $this->data = $data;
            $this->descricao = $descricao;
            $this->valor = $valor;
            include 'conexao.php';
            $this->pdo = $pdo;
            $this->id = $id_usuario;
            $this->nome = $nome;
        }
        
        //cadastro rapido
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

        public function cadastrarContaCompleta(){

            $dadosConta = [
                'data'      => $this->data,
                'descricao' => $this->descricao,
                'valor'     => $this->valor,
                'id'        => $this->id,
                'nome'      => $this->nome
            ];

            $sql = "INSERT INTO conta (data, descricao, valor, usuario_id, nome) values (:data, :descricao, :valor, :id, :nome)";

            $stmt = $this->pdo->prepare($sql);

            $stmt->execute($dadosConta);

            header("Location: dashboard.php");
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

        public function buscarContaSingle($usuario_id, $id_conta){
            $sql = "SELECT * from conta WHERE usuario_id = $usuario_id and id = $id_conta";

            $dados = $this->pdo->query($sql)->fetchAll();

            foreach($dados as $linha){
                echo "<div class='data'><span>".implode("/",array_reverse(explode("-",$linha['data'])))."</span></div>";
                echo "<div class='info-box'><span class='info-title'>Descrição</span><p>".$linha['descricao']."</p>
            </div>";
                echo "<div class='info-box'>
                <span class='info-title'>Valor</span>
                <p>R$ ".$linha['valor']."</p>
            </div>";
            }


        }

        public function apagarConta($usuario_id, $id_conta){

            $sql = "DELETE FROM conta WHERE usuario_id = $usuario_id and id = $id_conta";

            $stmt = $this->pdo->prepare($sql);

            $stmt->execute();

            header("Location: dashboard.php");
        }

    }