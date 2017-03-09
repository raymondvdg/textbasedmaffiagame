                      <?php
                      print "<div class='field1'>";
                      
                      print "<h1><center>Practice Attacking Skills</h1></center>";
                     
                      if($killskilllvl == "Rookie"){
                      print "<form method='POST' action='play.php?act=doattackpr'>";
                      print "<center><i>Stage 1: Time for some gun training!</i></center>";
                      print "<center><div class='fieldinfield'>";
                      print "<table>";
                      print "<tr><td><input type='radio' name='attack' value='stage11'>Shoot a target</td></tr>";
                      print "<tr><td><input type='radio' name='attack' value='stage12'>Duck & shoot a target</td></tr>";
                      print "<tr><td><input type='radio' name='attack' value='stage13'>Shoot a target while moving</td></tr>";
                    print "<tr><td><input type='hidden' name='id' value='$id'></td></tr>";
                    print "<tr><td><input type='submit' name='submit' value='Go'></tr></td>";
                      print "</table></form>";                    
                      } elseif($killskilllvl == "Beginner"){
                      print "<form method='POST' action='play.php?act=doattackpr'>";
                      print "<center><i>Stage 2: Let's put our training into practice, but don't get caught by police!</i></center>";
                       print "<center><div class='fieldinfield'>";
                      print "<table>";
                      print "<tr><td><input type='radio' name='attack' value='stage21'>Beat a guy up at the bar</td></tr>";
                      print "<tr><td><input type='radio' name='attack' value='stage22'>Threaten the school bully that always picked on you</td></tr>";
                      print "<tr><td><input type='radio' name='attack' value='stage23'>Set a boat on fire for insurance money</td></tr>";
                      print "<tr><td><input type='hidden' name='id' value='$id'></td></tr>";
                    print "<tr><td><input type='submit' name='submit' value='Go'></td></tr>";
                      print "</table></form>";
                      } else {
                        }
                      print "</div></center><Br /><br /></div>";


?>
