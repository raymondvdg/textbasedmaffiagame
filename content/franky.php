                      <?php


                      print "<div class='field1'>";
                      print "<center><h1>Franky</h1></center>";
                      if($killskilllvl == "Rookie")
                      {
                      print "<div class='frankyleft'><b>Franky:</b> Hey $username.<br>
                      So, you want to become a gangster huh? Hahahaha, you're a long way from there buddy.<br>
                      Good thing you came to me. I might have a few jobs you can do for me..   <br>
                      But first I need you to get familiar with handling weapons. I bet you never even held a gun!<br /><br />
                      
                      <b><a href='play.php?act=attackpractice'>Start taking your first babysteps in the underworld.</a></b></div>";
                      } elseif ($killskilllvl == "Beginner"){
                      print "<div class='frankyleft'><b>Franky:</b> Great, now that you held a weapon for once in your life you may be of use to me.<br />
                      But before I let you do some jobs for me, I would like you to gain some street experience.<br /><br />
                      <b><a href='play.php?act=attackpractice'>Go out and commit your first small crimes.</a></div>";
                      } elseif ($killskilllvl == "Novice"){
                      print "<div class='frankyleft'><b>Franky:</b> Great, time to quit fooling around.<br>
                      I think you're ready for the harder work. Now don't think you're a whole something.. you're still a nobody.<br>
                      You can come to me every once in a while to check if I have a job for you.<br>
                      That way you can show me what you're made of and you can make yourself some pocket money.<br>
                      <br>
                      I don't have any work for you right now, check back later.</div>";
                      }
                      print "";
                                            // Franky Menu

                      
                      
                      print "<div class='frankyright'>";
                      print "<b>Franky's Services</b><br />
                      - <a href='play.php?act=fshire'>Hire Scout</a><br />
                      - <a href='play.php?act=fssell'>Sell Goods</a><br />";
                      print "</div>";
                      
                      print "</div>";
                      



?>
