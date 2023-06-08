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
    $servername = "localhost";
    $username = "user";
    $password = "123+aze";
    $database = "gestionnaire_de_competence";

    try{
        $connection = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        echo "Database connected - YAY";
        echo "<br><br> Good work Asuka";
    } catch (PDOException $exception) {
        echo "Database not connected. " , $exception;
    }
    

    ?>
</body>
</html>