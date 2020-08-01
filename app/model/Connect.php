<?php

    #my namespace
    namespace app\model;
    #importing the PDO Class
    use PDO;
    #Importing the PDO Exception Class
    use PDOException;
    #Creating the CONNECT abstract class that connects to the database
    abstract class Connect
    {   
        #creating the static var Conn
        private static $conn;
        #this function uses the PDO Class to connect to the database
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