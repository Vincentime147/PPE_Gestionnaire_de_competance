<?php

namespace App\Utils;


/* It reads a config file and returns the value of a key in a section. */
class SingletonReadConfig
{
    private $ini_array = [];
    private static $instance;



    /**
     * It parses the config.ini file and stores it in an array.
     */
    private function __construct(){
        $this->ini_array = parse_ini_file("../config.ini", true);
    }
        

    /**
     * If the instance is null, create a new instance of the class and return it. If the instance is not
     * null, return the instance.
     * 
     * @return The instance of the class.
     */
    public static function getInstance() {
        if (self::$instance == null){

            self::$instance = new SingletonReadConfig();
        
        }
        return self::$instance;
    }


    /**
     * It returns the value of the key in the section of the ini file.
     * 
     * @param key The key of the value you want to get.
     * @param section The section of the ini file you want to get the value from.
     * 
     * @return The value of the key in the section.
     */
    public function getValue($key, $section) {
        
        return $this->ini_array[$section][$key];

    }

}
