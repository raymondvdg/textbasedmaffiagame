<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/maffia/config/dbCnnct.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/maffia/functions/stats.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/maffia/functions/seshandle.php');



    
    if(isset($_POST['leave'])){
    leaveDeleteFamily(1);
    }
        
        
    function leaveDeleteFamily($true){
    $username =$_SESSION['username'];
    $getUser= loadUserDetails($username); // 0=IDMAFFIA, 1=nameMAFFIA 2=emailMAFFIA, 3=ipMAFFIA, 4=lastloginMAFFIA, 5=status
    $id = $getUser[0];
        if($true == "1"){
    $db = new database();
    $conn = $db->connect();
    $query = $conn->prepare("SELECT familyID FROM accTbl WHERE IDMAFFIA=:id");
    $query->execute(array('id'=>$id));
    $pak = $query->fetch();
    $result = $pak['familyID'];

    if($result != 0){
    $SQL2 = $conn->prepare("UPDATE accTbl SET familyID=0 WHERE IDMAFFIA=:id");
    $SQL2->execute(array('id'=>$id));
    $SQL3 = $conn->prepare("DELETE from familyTbl WHERE familyID=:result");
    $SQL3->execute(array('result'=>$result));
    print "<Div>You have left the family.</div>";
    }
    }
    else {
    print "Didnt werk.";

    }
    }


function leaveFamily(){
    $username =$_SESSION['username'];
    $getUser= loadUserDetails($username); // 0=IDMAFFIA, 1=nameMAFFIA 2=emailMAFFIA, 3=ipMAFFIA, 4=lastloginMAFFIA, 5=status
    $id = $getUser[0];
    $db = new database();
    $conn = $db->connect();
    $query = $conn->prepare("SELECT familyID FROM accTbl WHERE IDMAFFIA=:id");
    $query->execute(array('id'=>$id));
    $pak = $query->fetch();
    $result = $pak['familyID'];

    if($result != 0){
    $SQL2 = $conn->prepare("UPDATE accTbl SET familyID=0 WHERE IDMAFFIA=:id");
    $SQL2->execute(array('id'=>$id));
    print "<Div>You have left the family.</div>";
    }   else {

    }
}

if(checkDon($id) == $id){
print "Are you sure you want to leave the family?<Br />You are the Don of your family, if you leave the family it will no longer exist.";
print "<form method='post' action='play.php?act=leavefamily'><input type='hidden' value='leave' name='leave'><input type='submit' name='continue' value='Choose'></form><br /><Br /><a href=''>Don't Leave</a>";
} else {
    leaveFamily();
}


    ?>