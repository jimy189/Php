<?php 
    require_once 'db.php';

    class Quarto{
        private $conn;

        public function __construct()
        {
            $database = new Database();
            $db = $database->dbConnection(); 
            $this->conn = $db;           
        }

        public function runQuery($sql){
            $stmt = $this->conn->prepare($sql);
            return $stmt;
        }
        //inserir cliente no banco
        public function insert($descricao, $disponibilidade, $valor){
            try{
                $sql = "INSERT INTO quarto(descricao, disponibilidade, valor)
                VALUES(:descricao, :disponibilidade, :valor)";

                $stmt = $this->conn->prepare($sql);
                $stmt->bindparam(":descricao", $descricao); // atribuir os valores aos parametros
                $stmt->bindparam(":disponibilidade", $disponibilidade);
                $stmt->bindparam(":valor", $valor);
                $stmt->execute(); //executa a instrução SQL no banco de dados
                return $stmt;
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }        
        public function update($descricao, $disponibilidade, $valor, $id){
            try{
                $sql = "UPDATE quarto SET
                        descricao = :descricao, disponibilidade= :disponibilidade, valor= :valor
                        WHERE id = :id";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindparam(":descricao", $descricao);
                $stmt->bindparam(":disponibilidade", $disponibilidade);
                $stmt->bindparam(":valor", $valor);
                $stmt->bindparam(":id", $id);
                $stmt->execute();
                return $stmt;
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }        
        public function delete($id){
            try{
                $sql = "DELETE FROM quarto WHERE id = :id";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindparam(":id", $id);
                $stmt->execute();
                return $stmt;
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }

        public function redirect($url){
            header("Location: $url");
        }
        public function updateStatus($disponibilidade, $id){
            try{
                $sql = "UPDATE quarto SET
                        disponibilidade= :disponibilidade
                        where id = :id";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindparam(":disponibilidade", $disponibilidade);
                $stmt->bindparam(":id", $id);
                $stmt->execute();
                return $stmt;
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }
    }
?>