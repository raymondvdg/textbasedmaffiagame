<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/maffia/config/dbCnnct.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/maffia/functions/seshandle.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/maffia/functions/stats.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/maffia/functions/family.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/maffia/functions/friends.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/maffia/functions/activity.php');


?>


<?php
if (isset($_SESSION['username'])) 
  {
    $db = new database();
    $conn = $db->connect();
    $username =$_SESSION['username'];
    $userstats=$conn->prepare('SELECT * from usrTbl where nameMAFFIA=:username');
    $userstats->execute(array(':username' => $username));
    $userstats2=$userstats->fetchAll(PDO::FETCH_ASSOC);
    // Vars to use:
    $getUser= loadUserDetails($username); // 0=IDMAFFIA, 1=nameMAFFIA 2=emailMAFFIA, 3=ipMAFFIA, 4=lastloginMAFFIA, 5=status
    $id = $getUser[0];
    
    $getStats= loadAllStats($id); // 0=killskill, 1=protection, 2=lifehealth, 3=thieving, 4=drugs 5=familyID 6=fatique
    $getFamily= loadFamily($getStats[5]); //0=name, 1=money, 2/7=rank, 8=policeinfluence, 9=armorboost, 10=weaponboost, 11/16(1-6)=compspot 17=description
    $getMoney= loadMoney($id); // 0=moneyInv, 1=moneySafe
    //load de ranks per skill
 
    $killskilllvl = skillLevel($getStats[0]);
    $protectionlvl = skillLevel($getStats[1]);
    $thievinglvl = skillLevel($getStats[3]);
    $drugslvl = skillLevel($getStats[4]);
    
include("topbarnavigation.php");

$FileExt = ".php";
$IncPath = "./content/";
$NotFound = "overview";
$Default = "overview";

if(empty($_GET['act'])) { $act = $Default; }
else { $act = $_GET['act']; }
if (!preg_match("/^[a-z]+$/",$act)) {
die("Page doesn't exist pls return <a href='javascript:javascript:history.go(-1)'>back to previous page</a> "); }
if(file_exists($IncPath.$act.$FileExt)) {
include($IncPath.$act.$FileExt);
} else {
include($IncPath.$NotFound.$FileExt); die(); }

  
  print "<div class='downbar'>";
 include("downbarnavigation.php");
 print "</div>";
    }
  
else
  {

  print "<center><br><br><br><form method='POST' action='authenticate.php'>";
  print "<table><tr><td>Username</td> <td><input type='text' name='username' maxlength ='15' size='20'></td></tr>";
  print "<tr><td>Password:</td>  <td><input type='password' name='password' size='20' mask='x'></td></tr>";
  print "<tr><td><input type='submit' value='submit' name='submit'></td></tr></table>";
  print "<br><br>Not registered? Please <A href='createaccount.php'>Register</a><br> Forgot password? <A href='getpass.php'>Get Password</a><br><br></center>";

  
  }

  ?>
        
