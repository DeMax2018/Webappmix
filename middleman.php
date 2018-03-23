<?php
session_start();
include"conn.php";


$grandaccescreateevent = "false";
if(isset($_SESSION["userid"])){
  $getcredentials = $dbh->prepare("SELECT * FROM privaterights WHERE UserID = ".$_SESSION["userid"]);
  $getcredentials->execute();
  $credentials = $getcredentials->fetch(PDO::FETCH_ASSOC);
  if($credentials["Create_events"] == 1){
    $grandaccescreateevent = "true";
  }
  if(isset($_GET["request"]) and $_GET["request"] === "event"){
    if($grandaccescreateevent === "true"){
      $_SESSION["bookaroom"] = "event";
      header("location: bookaroom.php");
    }
    else{
      header("location: index.php");
    }
  }
  else{
    $_SESSION["bookaroom"] = "rent";
    header("location: bookaroom.php");
  }
}
else{
  header("location: login.php");
}

?>
