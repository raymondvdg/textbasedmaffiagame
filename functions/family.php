<?php

function loadFamily($id) {
    $db = new database();
    $conn = $db->connect();
    $query8 = $conn->prepare('SELECT name, money, rank1, rank2, rank3, rank4, rank5, rank6, policeinfluence, armorboost, weaponboost, compspot1, compspot2, compspot3, compspot4, compspot5, compspot6, description FROM familyTbl WHERE familyID=:id');
    $query8->execute(array('id'=>$id));
    $query8->setFetchMode(PDO::FETCH_ASSOC);
    
    while($row8 = $query8->fetch()) 
    {
    $name = $row8['name'];
    $money = $row8['money'];
    // ranks pakken met namen
    //rank 1-6
    $rank1 = $row8['rank1'];
    if ($rank1 > 0) {
    $rank1 = getNames($row8["rank1"]);
    } else {
        $rank1 = "None";
    }
    
    $rank2 = $row8['rank2'];
    if ($rank2 > 0) {
    $rank2 = getNames($row8["rank2"]);
    } else {
        $rank2 = "None";
    }
    
    $rank3 = $row8['rank3'];
    if ($rank3 > 0) {
    $rank3 = getNames($row8["rank3"]);
    } else {
        $rank3 = "None";
    }
    
    $rank4 = $row8['rank4'];
    if ($rank4 > 0) {
    $rank4 = getNames($row8["rank4"]);
    } else {
        $rank4 = "None";
    }
    
    $rank5 = $row8['rank5'];
    if ($rank5 > 0) {
    $rank5 = getNames($row8["rank5"]);
    } else {
        $rank5 = "None";
    }
    
    $rank6 = $row8['rank6'];
    if ($rank6 > 0) {
    $rank6 = getNames($row8["rank6"]);
    } else {
        $rank6 = "None";
    }
    
    $policeinfluence = $row8['policeinfluence'];
    $armorboost = $row8['armorboost'];
    $weaponboost = $row8['weaponboost'];
    $compspot1 = $row8['compspot1'];
    $compspot2 = $row8['compspot2'];
    $compspot3 = $row8['compspot3'];
    $compspot4 = $row8['compspot4'];
    $compspot5 = $row8['compspot5'];
    $compspot6 = $row8['compspot6'];
    $description = $row8['description'];

    return array($name, $money, $rank1, $rank2, $rank3, $rank4, $rank5, $rank6, $policeinfluence, $armorboost, $weaponboost, $compspot1, $compspot2, $compspot3, $compspot4, $compspot5, $compspot6, $description);
    }
}


function loadFamMembers($famid){
    $db = new database();
    $conn = $db->connect();
    $query9 = $conn->prepare("SELECT IDMAFFIA FROM accTbl WHERE familyID=:famid");
    $query9->execute(array('famid'=>$famid));
    $query9->setFetchMode(PDO::FETCH_ASSOC);    
    while($row9 = $query9->fetch()){
    print getNames($row9['IDMAFFIA']);
    }

}

function checkDon($id){
    $db = new database();
    $conn1 = $db->connect();
    $query1 = $conn1->prepare("SELECT familyID FROM accTbl WHERE IDMAFFIA=:id");
    $query1->execute(array('id'=>$id));
    $pak = $query1->fetch();
    $famid = $pak['familyID'];
    
    $db = new database();
    $conn = $db->connect();
    $query = $conn->prepare("SELECT rank1 FROM familyTbl WHERE familyID=:famid");
    $query->execute(array('famid'=>$famid));
    $get = $query->fetch();
    $result = $get['rank1'];
        
    return $result;
}

?>