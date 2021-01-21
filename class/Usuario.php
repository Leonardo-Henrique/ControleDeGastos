<?php

    class Usuario{

        public $nome;
        public $email;
        protected $senha;

        function __construct($nome, $email, $senha){
            $this->nome = $nome;
            $this->email = $email;
            $this->senha = $senha;
            include 'conexao.php';
            $this->pdo = $pdo;
        }

        public function cadastrarUsuario(){

            $dadosUsuario = [

                'nome' => $this->nome,
                'email' => $this->email,
                'senha' => $this->senha

            ];

            $sql = "INSERT into usuario (nome, email, senha) values (:nome, :email, :senha)";

            $stmt = $this->pdo->prepare($sql);

            $stmt->execute($dadosUsuario);

            echo "Cadastrado";

            
        }

        public function logarUsuario($email, $senha){

            $cont = 0;

            $sql = "SELECT * from usuario WHERE email = '$email' and senha = '$senha'";

            $dados = $this->pdo->query($sql)->fetchAll();

            foreach ($dados as $linha) {
                $cont++;
            }

            if($cont > 0){

                session_start();


                $sql = "SELECT * from usuario WHERE email = '$email' and senha = '$senha'";

                $dados = $this->pdo->query($sql)->fetchAll();

                foreach ($dados as $linha) {
                    $_SESSION['id'] = $linha['id']; //id do usuário
                }

                echo "Usuário encontrado";
                header('Location: dashboard.php');

            }else{

                echo "Usuário não encontrado";

            }
        }

        public function deslogar(){
            session_start();
            session_destroy();
            header('Location: index.php');
        }

    }

?>