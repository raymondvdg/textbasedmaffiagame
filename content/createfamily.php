<?php

print "<div class='field1'><center>Start your own family<br>";
if($getStats[5] == 0){
print "<form id='createForm' action='play.php?act=processfamily' method='post' accept-charset='UTF-8'>";
print "<Table border='0'><tr>";
print "<td>Family name:</td>";
print "<td><input type='text' name='name' maxlength='20' /></td></tr>";
print "<tr><td>Description:</td>";
print "<td><textarea style='resize:none' wrap='soft' cols='40' name='description' rows='3' maxlength='75'></textarea></td></tr>";
print "<tr><td>Select hometown of your new family:</td>";
print "<td><select name='place'><option id='place' value='amsterdam'>Amsterdam</option><option id='place' value='berlin'>Berlin</option><option id='place' value='madrid'>Madrid</option><option id='place' value='napoli'>Napoli</option></select></tr></td>";
print "<input type='hidden' name='IDMAFFIA' value='$userstats3[IDMAFFIA]' />";
print "<tr><td></td></tr>";
print "</Table><input type='submit' class='submit' value='Submit' /></input>";
print "</form></center></div>";
} else {
    print "You are already part of the family: $getFamily[1].<br /> You must leave the family before you can start your own. ";
}

   ?>