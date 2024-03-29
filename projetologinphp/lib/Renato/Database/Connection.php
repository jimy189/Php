<?php

    //localiza classe com nomes iguais em pastas diferentes
    
    namespace Renato\Database;

    abstract class Connection
    {

        private static $conn;


        public static function getConn()
        {
            if (!self::$conn) {
                self::$conn = new \PDO('mysql: host=localhost; dbname=login;', 'root', '');
            }
            return self::$conn;
        }

    }