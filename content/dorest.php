<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/maffia/config/dbCnnct.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/maffia/functions/seshandle.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/maffia/functions/activity.php');


$required = array('id', 'answer');

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
$answer = $_POST['answer'];
}

print "<div class='field1'><br /><br /><center><div class='fieldinfield'>";

if($answer == "9"){
resetFatique($id);
print "You wake up feeling a lot better! You're ready for some action again.";


} else{
    print "$answer is the wrong answer! <A href='javascript:history.go(-1)'>Go back</a>";
}

print "</div></center><br /><br /></div>";

?>
