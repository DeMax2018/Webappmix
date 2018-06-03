<?php
include"conn.php";
session_start();
$getconfirm = $dbh->prepare("SELECT * FROM ticket WHERE Special_Number = '".$_GET["code"]."'");
$getconfirm->execute();
$owner = $getconfirm->fetch(PDO::FETCH_ASSOC);
$count = $getconfirm->rowCount();
if($count == 0){
  $_SESSION["authcode"] = "false";
  header("location: verification.php");
}
else{
  $_SESSION["owner"] = $owner["OwnerID"];
  $_SESSION["authcode"] = "true";
  $_SESSION["idauthcode"] = $owner["EventID"];
  echo $_SESSION["owner"];
  header("location: verification.php");
}



 ?>
