<?php
namespace App\controllers;

use App\controllers\BaseController ;
use App\utils\SingletonDataBaseMariaDB; 
use App\utils\SingletonReadConfig;
use App\utils\Renderer;
use App\utils\Auth;


class DefaultController extends BaseController{

    public function __construct() { 
        parent::__construct();
    }

    public function index(){
        //$cnx = SingletonDataBaseMariaDB::getInstance()->cnx;
        
        echo Renderer::render("Acceuil.php");
        
    }
    public function testUserComp(){

        echo Renderer::render("UtilisateurComp.php");
    }
    public function compRecap(){
        echo Renderer::render("CompetanceOnly.php");
    }
    /*
    public function login(){
        $ff = New Auth();
        $ff = $ff->logout();
        echo Renderer::render("Login.php");
    }
    public function login_verif(){
        $user = $_POST['User_name'];
        $mdp = $_POST['mdp'];
        $check = New Auth();
        $check= $check->check($user,$mdp);
        
        if ($check){
            echo Renderer::render("index.php");
        } else {
            echo Renderer::render("Login.php");
        }
    }
    
    public function register(){
        echo Renderer::render("Register.php");
    }  

    public function register_verif(){
        $user = $_POST['User_name']; //C'est le login
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $mdp = $_POST['mdp'];
        $mdp2 = $_POST['mdp2'];
        $role = $_POST['role'];

        $save_new_user = New Auth();
        $save_new_user = $save_new_user->new_user($user, $mdp, $mdp2, $nom, $prenom, $role);
        
        if ($save_new_user){
            echo Renderer::render("Login.php");
        }else{
            echo Renderer::render("Register.php");
        }
        
    }*/
}
