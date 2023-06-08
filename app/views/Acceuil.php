<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Test Acceuil</h1>

    <p>Bienvenue sur la page d'acceuil</p>
    <br>
    <br>
    <?php
    use App\utils\SingletonBDD;
    use App\models\DAOEmployer;
require_once '../vendor/autoload.php';
    
     
    $cnx = SingletonBDD::getInstance()->cnx;
    $DAOEmployer = new DAOEmployer($cnx);
    $employer1= $DAOEmployer->findById(1);
    var_dump($employer1);

    ?>
</body>
</html>