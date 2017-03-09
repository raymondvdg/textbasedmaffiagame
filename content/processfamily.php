<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/maffia/config/dbCnnct.php');

if (isset($_POST['name'], $_POST['description'])){
  if($_POST['description'] == ""){
    print "You must enter a description for your family.";
         print "<a href='javascript:history.go(-1)'>Go back.</a>";

  } elseif ($_POST['name'] == "") {
        print "You must enter a name for your family.";
             print "<a href='javascript:history.go(-1)'>Go back.</a>";

  
  } else {

date_default_timezone_set ("Europe/Berlin");
$name= $_POST['name'];
$description= $_POST['description'];
$place= $_POST['place'];

$name= strip_tags($name);
$description= strip_tags($description);

//vars schoonmaken

$name = preg_replace('/[^A-Za-z0-9\-]/', ' ', $name); 
$name = preg_replace('!\s+!', ' ', $name); 
$name = ucwords(strtolower($name));
$description = preg_replace('/[^A-Za-z0-9\-]/', ' ', $description); 
$description = preg_replace('!\s+!', ' ', $description);


  $db = new database();
  $conn = $db->connect();
  $isfam=$conn->prepare("SELECT * from familyTbl where name=:name");
  $isfam->execute(array('name'=>$name));
  $checkfam = $isfam->fetchAll(PDO::FETCH_OBJ);
  if($checkfam)
  {
     print "This family name allready exists.<br />";
     print "<a href='javascript:history.go(-1)'>Go back.</a>";
  }
  else
    {
      $SQL = $conn->prepare("INSERT into familyTbl (name, description, rank1, place, creationdate) VALUES (:name,:description,:rank1,:place,NOW())"); 
      $SQL->execute(array('name'=> $name, 'description'=>$description,'place'=>$place,'rank1'=>$id));
      //voeg nu ID van family bij speler
    $querygetid = $conn->prepare("SELECT familyID FROM familyTbl WHERE name=:name");
    $querygetid->execute(array('name'=> $name));
    $querygetid->setFetchMode(PDO::FETCH_ASSOC);
    while($rowgetid = $querygetid->fetch()) {
    $thefamid = $rowgetid['familyID'];

    }
      $SQL2 = $conn->prepare("UPDATE accTbl SET familyID=:thefamid WHERE IDMAFFIA=:id");
      $SQL2->execute(array('thefamid'=> $thefamid, 'id'=>$id));

      print "Family succesfully created! You are now officialy a don!<br />Click <a href='play.php?act=family'>here</a> go to your family page.";
    }
  }
}
  else {
    print "You must fill in all fields. <Br />";
    print "<a href='javascript:history.go(-1)'>Go back.</a>";

  }

    
?>
 
 