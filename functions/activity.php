<?php

function addXP($type, $xp, $id) {
    $db = new database();
    $conn = $db->connect();
    $allowed = array('killskill','sex','whatever');
    if (!in_array($type,$allowed))
    {
         throw new Exception("Invalid type");
    }
    $sql = "UPDATE accTbl SET `$type` = `$type` + :xp WHERE IDMAFFIA = :id";
    $stm = $conn->prepare($sql);
    $stm->execute(array('xp'=>$xp, 'id'=>$id));
}

function addFatique($id) {
    $db = new database();
    $conn = $db->connect();
    $sql = "UPDATE accTbl SET fatique = fatique + 1 WHERE IDMAFFIA = :id";
    $stm = $conn->prepare($sql);
    $stm->execute(array('id'=>$id));
}

function resetFatique($id) {
    $db = new database();
    $conn = $db->connect();
    $sql = "UPDATE accTbl SET fatique = 0 WHERE IDMAFFIA = :id";
    $stm = $conn->prepare($sql);
    $stm->execute(array('id'=>$id));
}


function checkFatique($id){
    $db = new database();
    $conn = $db->connect();
    $query0=$conn->prepare('SELECT * from accTbl where IDMAFFIA=:id');
    $query0->execute(array(':id' => $id));
    while($row0 = $query0->fetch()) {
    $fatique = $row0['fatique'];
    }
    return $fatique;
    
}

function doRest($id){

if(checkFatique($id) < 1){
    print "You dont need to rest.";
} else {
    print "<div class='field1'><center><h1>Rest</h1>You need some rest. Finish below sum to do a little nap.</center>";
print"<br /><br /><center><div class='fieldinfield'><form method='POST' action='play.php?act=dorest'><table>";
print "<tr><td>What is 3 * 3?</td></tr>";
print"<tr><td><input type='text' name='answer'><input type='hidden' value='$id' name='id'></tr></td>";
print "<tr><td><input type='submit' value='Go' name='submit'></td></tr></table></form></div></center></div>";
}
    
}

function addMoney($amount, $id) {
    $db = new database();
    $conn = $db->connect();
    $addMoney = $conn->prepare("update wealthTbl set moneyInv + :amount where IDMAFFIA = :id");
    $addMoney->execute(array('amount'=>$amount, 'id'=>$id));
}

function manageHealth($amount, $minusplus, $id) {
    $db = new database();
    $conn = $db->connect();
    $managehealth = $conn->prepare("update accTbl set lifehealth :minusplus :amount where IDMAFFIA = :id");
    $managehealth->execute(array('amount'=>$amount, 'id'=>$id, 'minusplus'=>$minusplus));
}

function successFail($minval, $extra, $maxval){
    $luck = rand($minval, $maxval);
    $luck += $extra;
    if ($luck > 5) {
        return true; }
        else {
            return false; }
}

function robPlayer($id, $robId) {
    $fatique = checkFatique($id);
    if($fatique == 5){
        print "You need to rest a little.";
        fatiqueDo();
    } else {
    $db = new database();
    $conn = $db->connect();
    $query5 = $conn->prepare("SELECT moneyInv FROM wealthTbl WHERE IDMAFFIA=:robId");
    $query5->execute(array('robId' => $robId));
    $query5->setFetchMode(PDO::FETCH_ASSOC);
    
    while($row5 = $query5->fetch()) {
    $moneyPlayer = $row5['moneyInv'];
    }
    $robbedAmount = $moneyPlayer/100*30;
    
    
    $db = new database();
    $conn2 = $db->connect();
    $minusMoney = $conn2->prepare("update wealthTbl set moneyInv - :robbedAmount where IDMAFFIA = :robId");
    $minusMoney->execute(array('robbedAmount'=>$robbedAmount, 'id'=>$robId));
    
    
    $db = new database();
    $conn3 = $db->connect();
    $plusMoney = $conn3->prepare("update wealthTbl set moneyInv + :robbedAmount where IDMAFFIA = :id");
    $plusMoney->execute(array('robbedAmount'=>$robbedAmount, 'id'=>$id));
          print "Robbed $robbedAmount.";
}
}


?>