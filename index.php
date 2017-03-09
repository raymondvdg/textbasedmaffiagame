<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/maffia/config/layoutsettings.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/maffia/tmpl/tmpl_header.php');

?>
    
    <!-- Game Content -->
    <div class="maincontent">

        <!-- Linker Menu -->
        <div class="leftmenu">
    <?php include("leftmenu.php"); ?>
    </div>

    
    <!-- Middle Content -->
        <div class="maingame">
       <?php
        include("news.php"); 
        //include("frontpage.php");
        ?>
        </div>

    </div>
    
    <!-- Einde Game Content -->
    
    
    
<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/maffia/tmpl/tmpl_footer.php');
?> 