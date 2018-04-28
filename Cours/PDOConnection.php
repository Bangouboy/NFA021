<?php
class PDOConnection
{
        static $_instance;
        
        public static function getInstance(){
               if (!isset(self::$_instance))
                   self::$_instance = new PDO('mysql:host=localhost;dbname=ateliernfa021', 'root', '');
               
                    return self::$_instance;
        }
}
?>