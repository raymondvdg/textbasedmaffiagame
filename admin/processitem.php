<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/maffia/config/dbCnnct.php');

$name = $_POST['name'];
$value = $_POST['value'];
$strength = $_POST['strength'];
$accuracy = $_POST['accuracy'];
$protection = $_POST['protection'];
$requiredlvl = $_POST['requiredlvl'];
$skill = $_POST['skill'];

      $SQL = "INSERT into itemTbl(name, value, strength, accuracy, protection, requiredlvl, skill)
            VALUES ('$name','$value','$strength','$accuracy','$protection', '$requiredlvl', '$skill')"; 
      mysql_query($SQL) or die("could not add user");
         print "Item added successfully.\nClick to <a href='additem.php'>add more</a>.";
    

?>
 
 