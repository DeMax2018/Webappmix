<?php
session_start();
include"conn.php";

$box = json_decode(file_get_contents('php://input'), true);
if(isset($_GET["group"])){
  $user = explode(" ",$box["name"]);
  $getid = $dbh->prepare("SELECT UserID FROM user WHERE fldName = '".$user[0]."' and fldLastname = '".$user[1]."'");
  $getid->execute();
  $userid = $getid->fetch(PDO::FETCH_ASSOC);
  if($box["type"] == 1){
    $sql = $dbh->prepare("UPDATE user_group SET cifpcm = ".$box["checked"]." WHERE UserID = ".$userid["UserID"]);
    $checkforadmin = $dbh->prepare("SELECT admin FROM user_group WHERE UserID = ".$userid["UserID"]);
    $checkforadmin->execute();
    $admin = $checkforadmin->fetch(PDO::FETCH_ASSOC);
    if($admin["admin"] == 0){
      $adjust = $dbh->prepare("UPDATE privaterights set Create_events = ".$box["checked"]);
      $adjust->execute();
    }
    $sql->execute();
  }
  elseif($box["type"] == 2){
    $sql = $dbh->prepare("UPDATE user_group SET admin = ".$box["checked"]." WHERE UserID = ".$userid["UserID"]);
    $checkforteacher = $dbh->prepare("SELECT cifpcm FROM user_group WHERE UserID = ".$userid["UserID"]);
    $checkforteacher->execute();
    $teacher = $checkforteacher->fetch(PDO::FETCH_ASSOC);
    if($teacher["cifpcm"] == 1){
      $adjust = $dbh->prepare("UPDATE privaterights set Create_events = 1 , Delete_Events = ".$box["checked"]." , Acces_Rights_System = ".$box["checked"]." WHERE UserID = ".$userid["UserID"]);
      $adjust->execute();
    }
    else{
      $adjust = $dbh->prepare("UPDATE privaterights set Create_events = ".$box["checked"]." , Delete_Events = ".$box["checked"]." , Acces_Rights_System = ".$box["checked"]." WHERE UserID = ".$userid["UserID"]);
      $adjust->execute();
    }
    $sql->execute();
  }
  elseif($box["type"] == 3){
    $sql = $dbh->prepare("UPDATE user_group SET user = ".$box["checked"]." WHERE UserID = ".$userid["UserID"]);
    $sql->execute();
  }
}
else{
  $user = explode(" ",$box["name"]);
  $getid = $dbh->prepare("SELECT UserID FROM user WHERE fldName = '".$user[0]."' and fldLastname = '".$user[1]."'");
  $getid->execute();
  $userid = $getid->fetch(PDO::FETCH_ASSOC);
  if($box["type"] == 1){
    $sql = $dbh->prepare("UPDATE privaterights SET Create_events = ".$box["checked"]." WHERE UserID = ".$userid["UserID"]." WHERE UserID = ".$userid["UserID"]);
  }
  elseif($box["type"] == 2){
    $sql = $dbh->prepare("UPDATE privaterights SET Delete_Events = ".$box["checked"]." WHERE UserID = ".$userid["UserID"]." WHERE UserID = ".$userid["UserID"]);
  }
  elseif($box["type"] == 3){
    $sql = $dbh->prepare("UPDATE privaterights SET Acces_Rights_System = ".$box["checked"]." WHERE UserID = ".$userid["UserID"]." WHERE UserID = ".$userid["UserID"]);
  }

  $sql->execute();

}








 ?>
