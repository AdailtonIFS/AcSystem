<?php

    namespace app\model;
    use PDO;
    use PDOException;


    abstract class Connect
    {   
        private static $conn;

        public static function getConn()
        {
            
            try{
                if(self::$conn == null){
                    self::$conn = new PDO('mysql:host='.DBHOST.';dbname='.DBNAME,DBUSER,DBPASSWORD);
                }
                return self::$conn;
            }catch (PDOException $e) {
                echo 'Connection failed: ' . $e->getMessage();
            }
        }
    }