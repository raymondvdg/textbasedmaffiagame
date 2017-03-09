<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/maffia/config/dbCnnct.php');

if (isset($_POST['submit'])) // name of submit button
{

    $db = new Database();
    $conn = $db->connect();
    $username=$_POST['username'];
    $password=$_POST['password'];
    $username=strip_tags($username);
    $username = preg_replace('/[^A-Za-z0-9\-]/', ' ', $username); // Replace special chars with space.
    $username = preg_replace('!\s+!', ' ', $username); // Replaces all spaces with one spcace.
    $username = ucwords(strtolower($username));
    $password = md5($password);
    $check = $conn->prepare('select * from usrtbl where nameMAFFIA=:username and passMAFFIA=:password'); 
    $check->execute(array(':username' => $username, ':password' => $password));
    $rows = $check->fetchAll(PDO::FETCH_OBJ);
    if($rows)
    {
    session_start();
    $now = time();
    $_SESSION['last_activity'] = $now;
    $_SESSION['username'] = $username;
    header("Location: play.php");
    }
    else
    {
       print "Verkeerde username of password.";
    }
}

?>