<?php

namespace App\utils;

/* Importing the SingletonReadConfig class from the App\utils namespace and renaming it to
ReadConfig. It is also importing the PDOException class from the global namespace. */
use App\utils\SingletonReadConfig as ReadConfig;
use PDOException;



/* The SingletonDataBaseMariaDB class is a singleton class that creates a PDO object to connect to a
MariaDB database. */
class SingletonDataBaseMariaDB
{

    public $cnx;
    private static $instance;
    private static $dsn = null; //data source name
    private static $username = null;// Nom d'utilisateur
    private static $password = null; // Mots de passe



/**
 * If the connection is not already established, then establish it.
 */
    private function __construct() {
        try {
            self::$dsn = "mysql:host=".ReadConfig::getInstance()->getValue("server","localhost").":".ReadConfig::getInstance()->getValue("port","3306").";dbname=".ReadConfig::getInstance()->getValue("database","gestionnaire_de_competence");
            self::$username = ReadConfig::getInstance()->getValue("username","user");
            self::$password = ReadConfig::getInstance()->getValue("password","123+aze");
        $this->cnx = new \PDO(self::$dsn, self::$username, self::$password);
        } catch(PDOException $e) {
            echo "<pre>", print_r($e, true),"</pre>";
        }
    }



/**
 * If the instance is null, create a new instance of the class and return it. Otherwise, return the
 * existing instance
 * 
 * @return SingletonDataBaseMariaDB The instance of the class.
 */
    public static function getInstance() : SingletonDataBaseMariaDB{
        if (self::$instance == null){
            self::$instance = new SingletonDataBaseMariaDB();
        }
        return self::$instance;
    }
}    
