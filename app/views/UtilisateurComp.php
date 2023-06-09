<?php

echo "<a href='/'>page de test</a>";
use App\utils\SingletonBDD;
use App\models\DAOEmployer;
require_once '../vendor/autoload.php';
    
     
$cnx = SingletonBDD::getInstance()->cnx;
$DAOEmployer = new DAOEmployer($cnx);
$listEmployer= $DAOEmployer->findAll();
//var_dump($listEmployer);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste Employer</title>
</head>
<body>
<table>
  <tr>
    <th>id</th>
    <th>nom</th>
    <th>prenom</th>
    <th>post</th>
    <th>Nombre de compétance</th>
  </tr>
  <?php 
  foreach ($listEmployer as $employer){ ?>
    <tr>
      <td><?=$employer->getId()?></td>
      <td><?=$employer->getNom()?></td>
      <td><?=$employer->getPrenom()?></td>
      <td><?=$employer->getPost()?></td>
      <?php $nbComp =  $DAOEmployer->countNBComp($employer->getId());?>
      <td><?=$nbComp[0]?></td>
      
    </tr>
  <?php } ?>
</table>
</body>
</html>
