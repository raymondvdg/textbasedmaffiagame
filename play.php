<?php
session_start();

$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$start = $time;

require_once($_SERVER['DOCUMENT_ROOT'].'/maffia/config/layoutsettings.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/maffia/tmpl/tmpl_headergame.php');
?>

    <div class="maincontent">

    
    <!-- Middle Content -->

        <div class='playfield'>    
        <?php
        include("game.php");
        ?>
        
        </div>
        
<br><?php
$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$finish = $time;
$total_time = round(($finish - $start), 4);
print "Page generated in $total_time seconds.";
?> 
    </div>

   
<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/maffia/tmpl/tmpl_footergame.php');
?>
