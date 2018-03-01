<?php
session_start();
include"conn.php";
include"dbclasses.php";
$safetyfirst = new classes;
$pass = $safetyfirst->secure($_POST["passlogin"]);
$mail = $safetyfirst->secure($_POST["maillog"]);
$hashpass = $safetyfirst->hashish($pass);
$ip = getHostByName(getHostName());
$loginsql = $dbh->prepare("SELECT * FROM User");
$loginsql->execute();
while ($rows = $loginsql->fetch(PDO::FETCH_ASSOC)) {
  if($rows["fldPassword"] === $safepass AND $rows["fldMail"] === $mail){
    $_SESSION["auth"] = $rows["GroupID"];
    header("location: index.php");
  }
}



?>
