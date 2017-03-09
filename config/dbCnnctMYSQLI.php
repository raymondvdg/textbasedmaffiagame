<?php
$DB["dbName"] = "db_maffia";
$DB["host"] = "127.0.0.1";
$DB["user"] = "root";
$DB["pass"] = "test";
$link = mysqli_connect($DB['host'], $DB['user'], $DB['pass']) or die("<center>An Internal Error has Occured. Please report following error to the webmaster.<br><br>".mysql_error()."'</center>");
mysqli_select_db($link, $DB['dbName']);

?>