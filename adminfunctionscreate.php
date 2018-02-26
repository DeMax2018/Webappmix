<?php
session_start();
include"conn.php";
$box = json_decode(file_get_contents('php://input'), true);

$user = explode(" ",$box["name"]);

$getuser = $dbh->prepare("SELECT * FROM user WHERE fldName = ? AND fldLastname = ? ");
$getuser->bindValue(1,$user[0], PDO::PARAM_STR);
$getuser->bindValue(2,$user[1], PDO::PARAM_STR);
$_SESSION["checked"] = $user[0];

$getuser.execute();
$userid = $getuser->fetch(PDO::FETCH_ASSOC);
$sql = $dbh->prepare("UPDATE privaterights SET Create_event = ? WHERE UserID = ?");
$sql->bindValue(1,$box["checked"],PDO::PARAM_STR);
$sql->bindValue(2,$userid["UserID"],PDO::PARAM_STR);

$sql.execute();








 ?>
