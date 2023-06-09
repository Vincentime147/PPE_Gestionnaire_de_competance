<?php

namespace App\utils; 
use PDO;
use PDOException;


class SingletonBDD {
    private static $_instance;
    public $cnx;

    private static $_ServerName = "10.30.103.63";//"localhost"
    private static $_User = "user";
    private static $_Psw = "123+aze";
    private static $_DataBase = "gestionnaire_de_competence";
    
    //private static $_dsn = "mysql:host=localhost;dbname=gestionnaire_de_competence";
    private static $_dsn = "mysql:host=10.30.103.63;dbname=gestionnaire_de_competence";


    public static function getInstance(){
        if(is_null(self::$_instance)){
            self::$_instance = new SingletonBDD();
        }
        return self::$_instance;
    }
    public static function getInfoDataBase(){
        return self::$_ServerName;
    }

    private function __construct() {
        try{
            //$_dsn = "mysql:host="+self::$_ServerName+";dbname="+self::$_DataBase;
            //$_dsn = "mysql:host=localhost;dbname=gestionnaire_de_competence";
            $this->cnx = new PDO(self::$_dsn, self::$_User, self::$_Psw);
            
            

        }catch(PDOException $e) {
            echo "<pre>", print_r($e, true),"</pre>";
        }
    }
    
}