<?php

include "dbCnnct.php";


$x = 1;
$y = 1;


while($x<5) {
      
while($y<5){

      $SQL = "INSERT into map1(x, y, mapType)
            VALUES ('$x','$y','green')"; 
      mysql_query($SQL) or die("could not register");

print "created map $x, $y, green<br />";
$y++;

}

$y = 1;
$x++;
    
}


?>