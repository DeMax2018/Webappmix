<?php
session_start();
include"conn.php";

$box = json_decode(file_get_contents('php://input'), true);

$user = explode(" ",$box["name"]);
echo $user[1]."first";
$getid = $dbh->prepare("SELECT UserID FROM user WHERE fldName = '".$user[0]."' and fldLastname = '".$user[1]."'");
$getid->execute();
$userid = $getid->fetch(PDO::FETCH_ASSOC);
echo $userid["UserID"]."jajaa";
if($box["type"] == 1){
  $sql = $dbh->prepare("UPDATE privaterights SET Create_events = ".$box["checked"]." WHERE UserID = ".$userid["UserID"]."");
}
elseif($box["type"] == 2){
  $sql = $dbh->prepare("UPDATE privaterights SET Delete_Events = ".$box["checked"]." WHERE UserID = ".$userid["UserID"]."");
}
elseif($box["type"] == 3){
  $sql = $dbh->prepare("UPDATE privaterights SET Acces_Rights_System = ".$box["checked"]." WHERE UserID = ".$userid["UserID"]."");
}

$sql->execute();








 ?>
