<?php

try{
        $test = SingletonBDD::getInfoDataBase();
        var_dump($test);
        echo "<br><br> Good work Asuka";
    } catch (PDOException $exception) {
        echo "Database not connected. " , $exception;
    }
    
    require_once '../vendor/autoload.php';

use App\utils\SingletonBDD;
use App\models\DAOEmployer;
$servername = "localhost";
$username = "user";
$password = "123+aze";
$database = "gestionnaire_de_competence";
$employer1;
try{
    $connection = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    echo "Database connected - YAY";
    echo "<br><br> Good work Asuka";
} catch (PDOException $exception) {
    echo "Database not connected. " , $exception;
}
echo "<br><br>";