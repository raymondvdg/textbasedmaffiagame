<?php

function loadUserDetails($username){
    $db = new database();
    $conn = $db->connect();
    $query0=$conn->prepare('SELECT * from usrTbl where nameMAFFIA=:username');
    $query0->execute(array(':username' => $username));
    while($row0 = $query0->fetch()) {
    $id = $row0['IDMAFFIA'];
    $name = $row0['nameMAFFIA'];
    $email = $row0['emailMAFFIA'];
    $ip = $row0['ipMAFFIA'];
    $lastlogin = $row0['lastloginMAFFIA'];
    $status = $row0['status'];
    

    return array($id, $name, $email, $ip, $lastlogin, $status);
}
}

function loadAllStats($id) {
    $db = new database();
    $conn = $db->connect();
    $query=$conn->prepare('SELECT killskill, protection, lifehealth, thieving, drugs, familyID, fatique FROM accTbl WHERE IDMAFFIA=:id');
    $query->execute(array(':id' => $id));
    $query->setFetchMode(PDO::FETCH_ASSOC);
    
    while($row = $query->fetch()) {
    $killskill = $row['killskill'];
    $protection = $row['protection'];
    $lifehealth = $row['lifehealth'];
    $thieving = $row['thieving'];
    $drugs = $row['drugs'];
    $familyID = $row['familyID'];
    $fatique = $row['fatique'];

    
    return array($killskill, $protection, $lifehealth, $thieving, $drugs, $familyID, $fatique);
    
        //gebruiken als $getxp = loadAllStats(); print "<br>Str xp = $getxp[0]";
        //tip voor total xp:
        //echo "Total xp = " . ($getxp[0]+$getxp[1]+$getxp[2]+$getxp[3]+$getxp[4]);
}
}


    
    function skillLevel($xpVal) {

        if($xpVal >= 0 && $xpVal <= 100){
            $rank = "Rookie";
        } elseif($xpVal >= 101 && $xpVal <= 250){
            $rank = "Beginner";
        } elseif($xpVal >= 251 && $xpVal  <= 475){
            $rank = "Novice";
        } elseif($xpVal >= 476 && $xpVal  <= 926){
            $rank = "Experienced";
        } elseif($xpVal >= 927 && $xpVal  <= 10000){
            $rank = "Professional";
        }

        return "$rank";
    
}

function getNames($id){
    // get the name from id and return in str
    $db = new database();
    $conn = $db->connect();
    $query3 = $conn->prepare("SELECT nameMAFFIA FROM usrTbl WHERE IDMAFFIA=:id");
    $query3->execute(array('id' => $id));
    $fetch3 = $query3->fetch();
    $result3 = $fetch3['nameMAFFIA'];
    return $result3;

}

function getNamesFromFriends($id){
    //and print in html obj specially for friends
    $db = new database();
    $conn = $db->connect();
    $query4 = $conn->prepare("SELECT nameMAFFIA FROM usrTbl WHERE IDMAFFIA=:id");
    $query4->execute(array('id' => $id));
    $query4->setFetchMode(PDO::FETCH_ASSOC);
    while($row4 = $query4->fetch()){
    print "<tr><td>$row4[nameMAFFIA]</td><td><A href='play.php?act=friendmsg&id=$id'>Message</a></td></tr>";
    }

}

function getFriends($id){
    // fetch friend id's and convert to names via getNamesFromFriends
    $db = new database();
    $conn = $db->connect();
    $query6 = $conn->prepare("SELECT IDFRIEND FROM friendsTbl WHERE IDMAFFIA=:id");
    $query6->execute(array('id' => $id));
    $query6->setFetchMode(PDO::FETCH_ASSOC);
    while($row6 = $query6->fetch()){
     if ($query6->rowCount() > 0) {
        getNamesFromFriends($row6['IDFRIEND']);
     } else { print "<br />";}
     }
}


     


function loadMoney($id){
    $db = new database();
    $conn = $db->connect();
    $query5 = $conn->prepare("SELECT moneyInv, moneySafe FROM wealthTbl WHERE IDMAFFIA=:id");
    $query5->execute(array('id' => $id));
    $query5->setFetchMode(PDO::FETCH_ASSOC);
    
    while($row5 = $query5->fetch()) {
    $moneyInv = $row5['moneyInv'];
    $moneySafe = $row5['moneySafe'];
    return array($moneyInv, $moneySafe);
    }

}


?>