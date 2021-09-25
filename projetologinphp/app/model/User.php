<?php

    use Renato\Database\Connection;

    class User
    {
        private $id;
        private $name;
        private $email;
        private $passowrd;

        public function validateLogin()
        {
            $conn = Connection::getConn();

            //Verifica se obj pdo ta passando
            var_dump($conn);
              //conectar banco de dados
            //selecionar o usuario que tenha o mesmo email do informado
            // se tiver no banco, cria uma session direcionar para tela de dashboard
            // se não ela redirecionar para tela inicial


            //selecionar o usuario que tenha o mesmo email do informado
            $sql = 'SELECT * FROM user WHERE email = :email';

            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':email', $this->email);
            $stmt->execute();
            var_dump("Email: " . $this->email);
            var_dump("Senha: " .$this->password);
            if ($stmt->rowCount()) {
                $result = $stmt->fetch();

                if ($result['pass'] === $this->password) {
                    $_SESSION['usr'] = array(
                        'id_user' => $result['id'], 
                        'name_user' => $result['name']
                    );
                    
                    return true;
                }
            }

            throw new \Exception('Login Inválido');
        }

        public function setEmail($email)
        {
            $this->email = $email;
        }

        public function setName($name)
        {
            $this->name = $name;
        }

        public function setPassword($password)
        {
            $this->password = $password;
        }


        public function getName()
        {
            return $this->name;
        }

        public function getEmail()
        {
            return $this->email;
        }

        public function getPassword()
        {
            return $this->password;
        }


    }