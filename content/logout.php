<?php
    $_SESSION = array();
    session_destroy();
    print "succesful logout <a href='index.php'>return home</a>";
?>