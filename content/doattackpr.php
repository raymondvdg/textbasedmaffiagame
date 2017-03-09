<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/maffia/config/dbCnnct.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/maffia/functions/seshandle.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/maffia/functions/activity.php');


$required = array('id', 'attack');

// Loop over field names, make sure each one exists and is not empty
$error = false;

foreach($required as $field) {
  if (empty($_POST[$field])) {
    $error = true;
  }
}

if ($error) {
  echo "All fields are required.";
} else {
$id = $_POST['id'];
$attack = $_POST['attack'];
}

if($attack == "stage11"){
    $xp = 10;
    $minval = 3;
    $maxval = 10;

} elseif($attack == "stage12"){
    $xp = 12;
    $minval = 2;
    $maxval = 10;

} elseif($attack == "stage13"){
    $xp = 14;
    $minval = 1;
    $maxval = 10;

} elseif($attack == "stage21"){
    $xp = 15;
    $minval = 3;
    $maxval = 5;
} elseif($attack == "stage22"){
    $xp = 16;
    $minval = 2;
    $maxval = 5;
} elseif($attack == "stage23"){
    $xp = 17;
    $minval = 1;
    $maxval = 5;}

$extra = $getStats[0]/100;

if(checkFatique($id) < 5){
    
print "<div class='field1'><br /><br /><center><div class='fieldinfield'>";
if($killskilllvl == "Novice"){
    print "You don't need anymore practice!";
} else {
if(successFail($minval, $extra, $maxval)){
$type = "killskill";
addXP($type, $xp, $id);//add the xp
addFatique($id);// add fatique
print "Success! You gained $xp experience for Killskill.<br/><a href='play.php?act=attackpractice'>Train some more.</a>";
} else {
    print "Too bad, you failed!<br/> <a href='play.php?act=attackpractice'>Try again.</a>"; }
}


} else {
 doRest($id);   
}

print "</div></center><br /><br /></div>";
?>
