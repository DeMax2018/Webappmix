<?php
include"conn.php";
include"dbclasses.php";
$safetyfirst = new classes;
$pass = $safetyfirst->secure($_POST["passlogin"]);
$mail = $safetyfirst->secure($_POST["maillog"]);
$ip = getHostByName(getHostName());
$loginsql = $dbh->prepare("SELECT * FROM User");
$loginsql->execute();
while ($rows = $loginsql->fetch(PDO::FETCH_ASSOC)) {
  if($rows["fldPassword"] === $pass AND $rows["fldMail"] === $mail){
    header("location: index.php");
  }
}



?>
