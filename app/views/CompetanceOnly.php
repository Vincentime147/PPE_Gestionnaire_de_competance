<?php
echo "<a href='/'>page de test</a><br><br><br>";
use App\utils\SingletonBDD;
use App\models\DAOEmployer;
use App\models\DAOCompetence;
require_once '../vendor/autoload.php';

$cnx = SingletonBDD::getInstance()->cnx;
$DAOCompetence = new DAOCompetence($cnx);
$listComp= $DAOCompetence->findAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OnlyComp</title>
</head>
<body>
    Tableau de comp

    <table>
  <tr>
    <th>id</th>
    <th>Libelle</th>
    <th>Description</th>
    <th>Nb usage</th>
  </tr>
  <?php 
  foreach ($listComp as $comp){ ?>
  <?php $nbComp =  $DAOCompetence->countNBComp($comp->getIdCompetance());?>
    <tr >
      <td><?=$comp->getIdCompetance()?></td>
      <td><?=$comp->getLibelle()?></td>
      <td><?=$comp->getDescriptionComp()?></td>
      
      <td><?=$nbComp[0]?></td>
      
    </tr>
  <?php } ?>
  ?>
  
</table>
    
</body>
</html>