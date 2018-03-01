<?php

include"conn.php";
include"dbclasses.php";
$class = new classes();
$firstsafe = $class->secure($_POST["password"]);
$secondsafe = $class->hashish($firstsafe);
$create = $dbh->prepare("INSERT INTO User (fldName,fldLastname,fldMail,fldPassword) VALUES (?,?,?,?)");
$create->bindValue(1, $_POST["First_Name"], PDO::PARAM_STR);
$create->bindValue(2, $_POST["Last_Name"], PDO::PARAM_STR);
$create->bindValue(3, $_POST["email"], PDO::PARAM_STR);
$create->bindValue(4, $secondsafe, PDO::PARAM_STR);
$create->execute();
$getuser = $dbh->prepare("SELECT * FROM User WHERE fldName = ? AND fldLastname = ? ;");
$getuser->bindValue(1, $_POST["First_Name"], PDO::PARAM_STR);
$getuser->bindValue(2, $_POST["Last_Name"], PDO::PARAM_STR);
$getuser->execute();
$record = $getuser->fetch(PDO::FETCH_ASSOC);
$create_right = $dbh->prepare("INSERT INTO privaterights (UserID,Create_events,Delete_Events,Acces_Rights_System) VALUES (".$record["UserID"] .",0,0,0)");
$create_right->execute();


header("location: index.php");





?>
