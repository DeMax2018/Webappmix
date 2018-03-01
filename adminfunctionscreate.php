<?php
session_start();
include"conn.php";

$box = json_decode(file_get_contents('php://input'), true);
if($box["type"] == 1){
  $sql = $dbh->prepare("UPDATE privaterights SET Create_events = ".$box["checked"]." WHERE UserID = ".$box["name"]."");
}
elseif($box["type"] == 2){
  $sql = $dbh->prepare("UPDATE privaterights SET Delete_Events = ".$box["checked"]." WHERE UserID = ".$box["name"]."");
}
elseif($box["type"] == 3){
  $sql = $dbh->prepare("UPDATE privaterights SET Acces_Rights_System = ".$box["checked"]." WHERE UserID = ".$box["name"]."");
}
$sql->execute();








 ?>
