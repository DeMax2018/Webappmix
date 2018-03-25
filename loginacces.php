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
  if($rows["fldPassword"] === $hashpass AND $rows["fldMail"] === $mail){
    $_SESSION["userid"] = $rows["UserID"];
    $_SESSION["mail"] = $rows["fldMail"];
    $_SESSION["name"] = $rows["fldName"];
    $_SESSION["lastname"] = $rows["fldLastname"];
    $getrights = $dbh->prepare("SELECT * FROM privaterights WHERE UserID = ".$_SESSION["userid"]);
    $getrights->execute();
    $rights = $getrights->fetch(PDO::FETCH_ASSOC);
    $_SESSION["create"] = $rights["Create_events"];
    $_SESSION["acces"] = $rights["Acces_Rights_System"];
    $_SESSION["delete"] = $rights["Delete_Events"];
    header("location: index.php");
  }
}



?>
