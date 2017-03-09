<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/maffia/config/dbCnnct.php');

// ivm update MYSQL to MYSQLI
require_once($_SERVER['DOCUMENT_ROOT'].'/maffia/config/dbCnnctMYSQLI.php');


date_default_timezone_set ("Europe/Berlin");
$successtring = "";
$errorstring = "";
$name= $_POST['username'];
$password= $_POST['password'];
$passwordConfirm = $_POST['passwordConfirm'];
$agree = $_POST['agree'];
$name= strip_tags($name);
$email= $_POST['email'];
$email= strip_tags($email);

//username schoonmaken
$name = preg_replace('/[^A-Za-z0-9\-]/', ' ', $name); // speciale characters spaties maken
$name = preg_replace('!\s+!', ' ', $name); // meerdere spaties 1 spatie maken
$name = ucwords(strtolower($name));
$email = filter_var($email, FILTER_VALIDATE_EMAIL);

//passwoord hashen en zouten
//$cost = 13; // hoe hoger hoe beter
//$salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.'); // de random salt maken
//$salt = sprintf("$2a$%02d$", $cost) . $salt;
//$hashedPassword = crypt($password, $salt);
// MCRYPT INSTALLEREN!
// DB INSERT FF AANPASSEN


if (!empty($_SERVER['HTTP_CLIENT_IP'])){
  $ip=$_SERVER['HTTP_CLIENT_IP']; //Is het een proxy
}elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
  $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
}else{
  $ip=$_SERVER['REMOTE_ADDR'];
} //waarde van ip is nu nog bv 192.0.34.166
$ip = ip2long($ip); // $ip versimpelen naar bv 5473732954
$registerIP= $_SERVER['REMOTE_ADDR'];

if(empty($_POST['agree'])){
        print "You must agree with terms with terms.";    }

    else{

    }

 
if ($password==$passwordConfirm)
{


  $isplayer="SELECT * from usrTbl where nameMAFFIA='$name'";
  $isplayer3=mysqli_fetch_array(mysqli_query($link, $isplayer));
               
  if(!$_POST['password'] || !$_POST['passwordConfirm'])
  {
     print "U heeft geen wachtwoord ingevuld.";
  }
  /* !!!!!!!!!!!!!!! else if($isplayer3 || strlen($name)<3)
  {
     print "Deze gebruikersnaam is al in gebruik of minder dan 3 characters.";
  }
  else*/
    {
      $password=md5($password);
    //deze methode wordt aangepast zoals boven beschreven
      $SQL = "INSERT into usrTbl(nameMAFFIA, passMAFFIA, emailMAFFIA, ipMAFFIA, registerMAFFIA)
            VALUES ('$name','$password','$email','$registerIP',NOW())";
      mysqli_query($link, $SQL) or die("could not add user");
      // via ID nu skill points geven
    $userstats="SELECT * from usrTbl where nameMAFFIA='$name'";
    $userstats3=mysqli_fetch_array(mysqli_query($link, $userstats));
    $getID = $userstats3['IDMAFFIA'];
    print $getID;
    $skillinput = "INSERT into accTbl(IDMAFFIA, killskill, protection, lifehealth, thieving, drugs, weapons)
            VALUES ('$getID','0','0','100','0', '0', '0')";
    mysqli_query($link, $skillinput) or die("could not input account details");
    $giveweapon = "INSERT into equipTbl(IDMAFFIA, type, itemID, equip)
            VALUES ('$getID','weapon','1','1')";
    mysqli_query($link, $giveweapon) or die("could not input first weapon");
    $givemoney = "INSERT into wealthTbl(IDMAFFIA, moneyInv, moneySafe)
            VALUES ('$getID','0','250')";
    mysqli_query($link, $givemoney) or die("could not input first money");

      print "registration successful.\nClick to <a href='play.php'>Play</a> or return to <a href='index.php'>Home</a>";
    }
  }


else
{

  print "Your passwords didn't match or you did not enter a password";
}
?>
 
 