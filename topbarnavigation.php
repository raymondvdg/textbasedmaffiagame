<nav>
	<ul>
		<li><a href="#">Statistics</a>
			<ul>
				<li>
                                <?php print "<table>";
                                print "<tr><td>Kill Skill:</font></td><td> $killskilllvl </td></tr>";
                                print "<tr><td>Protection:</td><td>$protectionlvl</td></tr>";
                                print "<tr><td>Thieving:</td><td>$thievinglvl</td></tr>";
                                print "<tr><td>Drugs:</td><td>$drugslvl</td></tr>";
                                print "<tr><td>------------------</td></tr>";
                                print "<tr><td>Health:</td><td>$getStats[2]</td></tr>";
                                print "<tr><td>Fatique:</td><td>$getStats[6]</td></tr></table>"; ?></li>
					</ul>
                                
                                <li><a href="#">Travel</a>
                                <ul>
				<li>
                                <?php print "<table><tr><td><A href='play.php?act=t'>Amsterdam</a></td></tr>";
                                print "<tr><td><A href='play.php?act=t'>Berlin</a></td></tr>";
                                print "<tr><td><A href='play.php?act=t'>Madrid</a></td></tr>";
                                print "<tr><td><A href='play.php?act=t'>Napoli</a></td></tr>";
                                print "<tr><td></td></tr></table>"; ?></li>
					</ul>
                                </li>
                                
                                <li><a href="#">Friends</a>
                                <ul>
				<li>
                                <?php print "<table> ";
                                getFriends($id);
                                print "<tr><td></td><td></td></tr>"; // need bit space
                                print "<tr><td></td><td></td></tr>"; // need bit space
                                print "<tr><td><a href='#' id='toggle1'>Add</a></td><td><a href='#' id='toggle2'>Remove</a></td></tr></table>";
                                print "<div class='toggle1' style='display:none;'>";
                                print "Name of friend to add:<br/>";
                                print "<form action='play.php?act=addfriend' method='post' accept-charset='UTF-8'><input  maxlength='15' type='text' name='name'  /><input type='submit' value='Add'>";
                                print "</form>";
                                print "</div>";
                                print "<div class='toggle2' style='display:none;'>";
                                print "Name of friend to remove:<br/>";
                                print "<form action='play.php?act=removefriend' method='post' accept-charset='UTF-8'><input  maxlength='15' type='text' name='name'  /><input type='submit' value='Add'>";
                                print "</form>";
                                print "</div>";
                                 ?></li>
					</ul>
                                </li>
                                
                                <li><a href="#">Account</a>
                                <ul>
				<li>
                                <?php print "<table><tr><td><a href='play.php?act=overview'>Overview</a></td></tr>";
                                print "<tr><td><a href='play.php?act=settings'>Settings</a></td></tr>";
                                print "<tr><td><a href='play.php?act=inbox'>Inbox</a></td></tr>";
                                print "<tr><td><a href='play.php?act=logout'>Logout</a></td><td></td></tr></table>"; ?></li>
					</ul>
                                </li>
                                
                                        <li><a href="play.php?act=family">Family</a></li>                       
			    
                                     
                                        <li><a href="play.php?act=franky">Franky</a></li> 
					
        </ul>
                                </li>

		</li>
                                

		<!-- <li><a href="#">Travel</a></li>
                <li><a href="#">Friends</a></li> -->
	</ul>
</nav>