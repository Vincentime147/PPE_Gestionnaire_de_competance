<?php
require_once '../vendor/autoload.php';
use App\controllers\DefaultController;




//https://www.youtube.com/watch?v=tbYa0rJQyoM
//https://www.youtube.com/watch?v=-iW6lo6wq1Y
//https://openclassrooms.com/fr/courses/2078536-developpez-votre-site-web-avec-le-framework-symfony2-ancienne-version/2079345-le-routeur-de-symfony2

//echo "<pre>" . print_r($_SERVER, true) . "<pre>";

if (isset($_SERVER["PATH_INFO"])) {
    $path = trim($_SERVER["PATH_INFO"], "/");
} else {
    $path = "";
}


$fragments = explode("/", $path);

//var_dump($fragment);

$control = array_shift($fragments);
//echo "control : $control <hr>";
switch ($control) {
    case '' :
    { //l'url est /
        defaultRoutes_get($fragments);
        break;
    }
    case "test":
        //URL login
        loginRoutes($fragments);
        break;
    case "pompier" :
    {
        //echo "Gestion des routes pour pompier <hr>";
        //calling function to prevend all hard code here
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            pompierRoutes_get($fragments);
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            pompierRoutes_post($fragments);
        }
        break;
    }
    case "login":
        //URL login
        loginRoutes($fragments);
        break;
    case "login_verif":
        loginVerifRoutes($fragments);
        break;
    case "register":
        registerRoutes($fragments);
        break;
    case "register_verif":
        register_verifRoutes($fragments);
        break;

    default :
    {
        //Gestion du probleme
        echo "Erreur URL";
    }
}
function registerRoutes($fragments){
    call_user_func_array([new \fireman\controllers\DefaultController(), "register"], $fragments);
}
function register_verifRoutes($fragments){
    call_user_func_array([new \fireman\controllers\DefaultController(), "register_verif"], $fragments);
}

function loginRoutes($fragments){
    call_user_func_array([new \fireman\controllers\DefaultController(), "login"], $fragments);
}
function loginVerifRoutes($fragments){
    call_user_func_array([new \fireman\controllers\DefaultController(), "login_verif"], $fragments);
}


function defaultRoutes_get($fragments)
{
    
    call_user_func_array([new \App\controllers\DefaultController(), "index"], $fragments);
}


function pompierRoutes_get($fragments)
{
    //var_dump($fragment);

    $action = array_shift($fragments);
    //var_dump($action);

    switch ($action) {
        case "affiche" :
        {
            //http://127.0.0.1:8080/pompier/affiche/ke?p=25&a=12
            //echo "Calling pompierController->show <hr>";
            call_user_func_array([new \fireman\controllers\PompierController(), "showAll"], $fragments);
            break;
        }
        case "detail" :
        {
            //http://127.0.0.1:8080/pompier/demo/1/45?p=2
            //echo "Calling pompierController->demo_test <hr>";
            //var_dump($fragments);
            call_user_func_array([new \fireman\controllers\PompierController(), "show"], $fragments);
            break;
        }
        case "delete" :
        {
            //echo "Calling pompierController->del <hr>";
            //Access permission can be checked here too
            call_user_func_array([new fireman\controllers\PompierController(), "confirmDelete"], $fragments);
            break;
        }
        case "edit" :
        {
            //echo "Calling pompierController->del <hr>";
            call_user_func_array([new \fireman\controllers\PompierController(), "edit"], $fragments);
            break;
        }
        case "search" :
        {
           
            //echo "Calling pompierController->showByName <hr>";
            call_user_func_array([new \fireman\controllers\PompierController(), "showByName"], $fragments);
            break;
        }
        case "add" :
            {
                //echo "Calling pompierController->showByName <hr>";
                call_user_func_array([new \fireman\controllers\PompierController(), "insert"], $fragments);
                break;
            }
     case "update" :
            {
                //echo "Calling pompierController->showByName <hr>";
                call_user_func_array([new \fireman\controllers\PompierController(), "update"], $fragments);
                break;
            }

        default :
        {
            echo "Action '$action' non defini <hr>";
            //Gestion du probleme
        }
    }
}

function pompierRoutes_post($fragments)
{

    $action = array_shift($fragments);
    switch ($action) {
        case "delete":
            //Access permission can be checked here too
            call_user_func_array([new \fireman\controllers\PompierController(), "delete"], $fragments);
            break;
        case "add" :
                {
                    //echo "Calling pompierController->showByName <hr>";
                    call_user_func_array([new \fireman\controllers\PompierController(), "confirm_insert"], $fragments);
                    break;
                }
        case "update" :
            {
                //echo "Calling pompierController->showByName <hr>";
                call_user_func_array([new \fireman\controllers\PompierController(), "confirm_update"], $fragments);
                break;
            }
        default:
            echo "Action '$action' non defini <hr>";
            break;
    }
}

function caserneRoutes_get($fragments)
{
    $action = array_shift($fragments);
    switch ($action) {
        case "affiche":
            call_user_func_array([new \fireman\controllers\CaserneController(), "showAll"], $fragments);
            break;
        case "detail" :
            call_user_func_array([new \fireman\controllers\CaserneController(), "detail"], $fragments);
            break;
        case "add" :
            call_user_func_array([new \fireman\controllers\CaserneController(), "add"], $fragments);
            break;
        case "search" :
            call_user_func_array([new \fireman\controllers\CaserneController(), "showByName"], $fragments);
            break;

        default:
            echo "Action '$action' non defini <hr>";
            break;
    }
}

function caserneRoutes_post($fragments)
{
    $action = array_shift($fragments);
    switch ($action) {
        case "recherche":
            call_user_func_array([new \fireman\controllers\CaserneController(), "showByNamee"], $fragments);
            break;
        case "delete" :
            call_user_func_array([new \fireman\controllers\CaserneController(), "delete"], $fragments);
            break;
        case "add" :
            call_user_func_array([new \fireman\controllers\CaserneController(), "do_add"], $fragments);
            break;
        default:
            break;
    }
}
