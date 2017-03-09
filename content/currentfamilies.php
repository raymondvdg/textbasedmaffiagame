                      <?php

                      $db = new database();
                      $conn = $db->connect();
                      $sql1 = $conn->query("SELECT * FROM familyTbl ORDER BY RAND() LIMIT 5");
                      $sql1->setFetchMode(PDO::FETCH_ASSOC);
                      

                      
                      print "<div class='field1'>";
                      // 0=ID 1=NAME, 3=MONEY, 4= , 
                      if($getStats[5] == 0){
                                            
                      print "<div><center><h1>Current families</h1></center><br /></div>";
                      
                      print "<div class='searchresult'>Family Name</div>
                      <div class='searchresultdescription'>Description</div>
                      <div class='searchresult'>Members</div>
                      <div class='searchresult'>Join</div><br />";
                      
                      while($row = $sql1->fetch()) {
                      
                      // count rows
                      $db = new database();
                      $conn = $db->connect();
                      $sql2 = $conn->prepare("SELECT COUNT(:famid) AS total FROM accTbl WHERE familyID=:famid");
                      $sql2->execute(array('famid'=>$row['familyID']));
                      $totalmembers = $sql2->fetchColumn();
                      // count rows
                                            
                      print "<div class='searchresult'>$row[name]</div>
                      <div class='searchresultdescription'>$row[description]</div>
                      <div class='searchresult'>$totalmembers</div>
                      <div class='searchresult'><a href='joinfamily&family=$row[familyID]'>Send request to join</a></div><br />";
                      }
                      print "<Br /><br />";
                      


                      
                      } else {
                      print "<div>You are already in a family!<br /><a href='play.php?act=leavefamily'>Click here to leave the family.</a><br />";
                      print "";
                      print "</div>";


                      }
                      print "</div>";


?>
