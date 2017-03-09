<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/maffia/config/dbCnnct.php');

if (isset($_POST['name'])){
  if($_POST['name'] == ""){
    print "You must enter a name.";
         print "<a href='javascript:history.go(-1)'>Go back.</a>";  
  } else {
$name= $_POST['name'];
$name= strip_tags($name);


//vars schoonmaken
$name = preg_replace('/[^A-Za-z0-9\-]/', ' ', $name); // Replace special chars with space.
$name = preg_replace('!\s+!', ' ', $name); // Replaces all spaces with one spcace.
$name = ucwords(strtolower($name));
  $db = new database();
  $conn = $db->connect();
  $isname=$conn->prepare("SELECT * from usrTbl where nameMAFFIA=:name");
  $isname->execute(array('name'=>$name));
  $checkname = $isname->fetchAll(PDO::FETCH_OBJ);
  if(!$checkname)
  {
     print "This username doesn't exist.<br />";
     print "<a href='javascript:history.go(-1)'>Go back.</a>";
  }
  else
    {
    $takeid=$conn->prepare("SELECT IDMAFFIA from usrTbl where nameMAFFIA=:name");
    $takeid->execute(array('name' => $name));
    $useid = $takeid->fetch();
    $finalid = $useid['IDMAFFIA'];
    $checkifinfriends = $conn->prepare("SELECT IDFRIEND FROM friendsTbl WHERE IDMAFFIA=:ownid AND IDFRIEND=:takeid");
    $checkifinfriends->execute(array('ownid'=>$id, 'takeid'=>$finalid));
  if($checkifinfriends->rowCount() > 0) {
    print "This user is allready on your friendslist.";
  } else {
    $SQL = $conn->prepare("INSERT into friendsTbl (IDMAFFIA, IDFRIEND) VALUES (:ownid,:takeid)"); 
    $SQL->execute(array('ownid'=> $id, 'takeid'=>$finalid));
      print "$name is added to your friends list.";
  }
      
    }
  }
}
  else {
    print "You must fill in the field. <Br />";
    print "<a href='javascript:history.go(-1)'>Go back.</a>";

  }

    
?>
 
 