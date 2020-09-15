<?php 
    require_once 'db.php';

    class Reserva{
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

        public function insert($id_func, $id_quarto, $id_cliente, $data_ini, $data_fim){
            try{
                $sql = "INSERT INTO reserva(id_func, id_quarto, id_cliente, data_ini, data_fim)
                        VALUES(:id_func, :id_quarto, :id_cliente, :data_ini, :data_fim)";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindparam(":id_func", $id_func);
                $stmt->bindparam(":id_quarto", $id_quarto);
                $stmt->bindparam(":id_cliente", $id_cliente);
                $stmt->bindparam(":data_ini", $data_ini);
                $stmt->bindparam(":data_fim", $data_fim);
                $stmt->execute();
                return $stmt;
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }

        public function Liberar($id){
          
        }
        
        public function redirect($url){
            header("Location: $url");
        }
    }
?>