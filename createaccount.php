<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/maffia/config/layoutsettings.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/maffia/tmpl/tmpl_headercreateaccount.php');
?>
    
    <!-- Game Content -->
    <div class="maincontent">

        <!-- Linker Menu -->
        <div class="leftmenu">
    <?php include("leftmenu.php"); ?>
    </div>

    
    <!-- Middle Content -->
        <div class="maingame">
        Maak een nieuw account aan.<br><br>


Cre&euml;er een nieuw account<br>

<form id='createForm' action='processform.php' method='post' accept-charset='UTF-8'>
<Table border="0">
<tr>
<td><label for="username" >Gebruikersnaam: </label></td>
<td><input type="text" name="username" id="username" maxlength="13" /></td>
</tr>
    <tr>
<td><label for="password" >Wachtwoord:</label></td>
<td><input type="password" name="password" id="password" maxlength="50" /></td>
    </tr>
        <tr>
    <td><label for="passwordConfim" >Wachtwoord: (ter bevestiging)</label></td>
    <td><input type="password" name="passwordConfirm" id="passwordConfirm" maxlength="50" onblur="checkPasswordMatch();" /></td>
    </tr>
        <tr>
        <td><div class="registrationFormAlert" id="divCheckPasswordMatch"></div></td>
        </tr>
    <tr>
<td><label for="email" >Email: (niet vereist)</label></td>
<td><input type="text" name="email" id="email" maxlength="50" /></td>

    </tr>
    <tr>
    <td><label for="agree">*Do you agree to our policy?</label></td>
    <td><input type="checkbox" class="checkbox" id="agree" name="agree" value="yes"/></td>
</tr>
    
 </Table>
<input type="submit" class="submit" value="Doorgaan" /></input>
</form>
        </div>

    </div>
    <!-- Einde Game Content -->
    
    
    
<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/maffia/tmpl/tmpl_footer.php');
?> 