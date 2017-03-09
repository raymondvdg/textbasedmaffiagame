   <?php
   if (isset($_SESSION['username'])) 
  {
        print "<h2>Account</h2>";
        print "<A href='play.php?act=settings'>Settings</A><br>";   
        print "<A href='play.php?act=logout'>Log Out</A><br>";
        
        print "<h2>Drugs</h2>";
        print "<A href='#'>Visit Your House</A><br>";
        print "<A href='#'>Visit Antonio</A><br>";


        print "<h2>Travel</h2>";
        print "<A href='#'>Amsterdam</A><br>";
        print "<A href='#'>Berlin</A><br>";
        print "<A href='#'>Krakow</A><br>";
        print "<A href='#'>Madrid</A><br>";
        print "<A href='#'>Napoli</A><br>";

  }
  else{ print "Please login or register."; }
?>