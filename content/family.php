                      <?php

                      $db = new database();
                      $conn = $db->connect();
                      $sql1 = $conn->prepare("SELECT COUNT(:famid) AS total FROM accTbl WHERE familyID=:famid");
                      $sql1->execute(array('famid'=>$getStats[5]));
                      $totalmembers = $sql1->fetchColumn();

                      print "<div class='field1'>";
                      // 0=ID 1=NAME, 3=MONEY, 4= , 
                      if($getStats[5] != 0){
                                            
                      print "<center><h1>$getFamily[0]</h1><br /><i>$getFamily[17]</i></center><br />";
                      
                      // Family Menu
                      
                      print "<div class='familyleft'>";
                      print "<a href='play.php?act=family?&do=donate'><B><font color='green'>Donate</font></B></a><br />";
                      print "<a href='play.php?act=family?&do=memberlist'><B>Memberlist</B></a><br />";
                      print "<a href='play.php?act=family?&do=bonus'><B>Bonus</B></a><br />";
                      print "<a href='play.php?act=family?&do=donate'><B>Donate</B></a><br />";
                      print "<a href='play.php?act=family?&do=donate'><B>Donate</B></a><br />";
                      print "</div>";
                      
                      //Family Memberlist
                      print "<div class='familyleft'>";
                      print "<b>Memberlist:</b><br />";
                      loadFamMembers($getStats[5]);
                      print "</div>";
                      
                      
                      //Family overview
                      print "<div class='familyright'>";
                      print "<b>Family Overview:</b><br />";
                      print "Money: <b>$$getFamily[1]</b><br />";
                      print "<b> Hierarchy:</b><br />";
                      print "Don: <b>$getFamily[2]</b><br />";
                      print "Consigliere: <b>$getFamily[3]</b><br />";
                      print "Underbosses: <b>$getFamily[4] & $getFamily[5]</b><br />";
                      print "Capo's: <b>$getFamily[6], $getFamily[7] & $getFamily[8]</b><br />";
                      print "Total members:<b>$totalmembers[total]</b><br /><Br />";
                      print "Memberlist:<br />";
                      loadFamMembers($getStats[5]);
                      print "</div>";
                      
                      print "<br><Br>";
                      
                      print "<div class='familyleave'><a href='play.php?act=leavefamily'>Click here to leave the family.</a><br />";
                      print "</div>";
                      print "";


                      
                      } else {
                      print "<div class='familyleft'>You are not in a family!<br /><br />";
                      print "<a href='play.php?act=currentfamilies'>Click here</a> to join one.<br />";
                      print "Or <a href='play.php?act=createfamily'>click here</a> to start your own family.<br /></div>";


                      }
                      print "</div>";


?>
