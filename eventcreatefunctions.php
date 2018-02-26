<?php
include"conn.php";
$sql = $dbh->prepare("INSERT INTO Event (eventname,Limited_Ticket,Sold_Ticket,Start_Hour,Discription,EventOrRent,Active,date_event)
 values (?,?,0,?,?,0,1,?)");
$sql->bindValue(1, $_POST["Event_name"], PDO::PARAM_STR);
$sql->bindValue(2, $_POST["Limit_Ticket"], PDO::PARAM_STR);
$sql->bindValue(3, $_POST["Start_Hour"], PDO::PARAM_STR);
$sql->bindValue(4, $_POST["Discription"], PDO::PARAM_STR);
$sql->bindValue(5, $_POST["Date_event"], PDO::PARAM_STR);
$sql->execute();
header("location: index.php");


?>
