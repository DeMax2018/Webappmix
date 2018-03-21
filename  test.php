<?php
session_start();
include"conn.php";
$_SESSION["userid"] = 1;
$getcredentials = $dbh->prepare("SELECT * FROM privaterights WHERE Create_events = 1 or Create_events = 0 and UserID = ".$_SESSION["userid"]);
$getcredentials->execute();
if() 


?>
