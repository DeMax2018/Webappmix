<?php
include"../conn.php";
include"../dbclasses.php";
$secure = new classes();
session_start();
echo $_FILES["fileToUpload"]["name"];
if(!empty($_POST["pass"]) and isset($_FILES["fileToUpload"]["name"]) and $_FILES["fileToUpload"]["name"] != ""){
  echo"allesoke";
  $pass = $secure->registerhash($_POST["pass"]);
  $updateprofile = $dbh->prepare("UPDATE user SET fldName = ? , fldLastname = ? , fldMail = ? ,  fldTele = ? ,fldCity = ? , fldzipcode = ? , fldStreet = ? , fldNumber = ? , fldprofilepic = ? , fldPassword = ? , salt = ? WHERE UserID = ".$_SESSION["userid"]);
  $updateprofile->bindParam(1,$_POST["Name"], PDO::PARAM_STR);
  $updateprofile->bindParam(2,$_POST["lastname"], PDO::PARAM_STR);
  $updateprofile->bindParam(3,$_POST["mail"], PDO::PARAM_STR);
  $updateprofile->bindParam(4,$_POST["number"], PDO::PARAM_STR);
  $updateprofile->bindParam(5,$_POST["city"], PDO::PARAM_STR);
  $updateprofile->bindParam(6,$_POST["zipcode"], PDO::PARAM_STR);
  $updateprofile->bindParam(7,$_POST["street"], PDO::PARAM_STR);
  $updateprofile->bindParam(8,$_POST["housenumber"], PDO::PARAM_STR);
  $updateprofile->bindParam(9,$_FILES["fileToUpload"]["name"], PDO::PARAM_STR);
  $updateprofile->bindParam(10,$pass[0], PDO::PARAM_STR);
  $updateprofile->bindParam(11,$pass[1], PDO::PARAM_STR);
  $target_dir = "../profilepics/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
  $updateprofile->execute();
  $renew = $dbh->prepare("SELECT * FROM user WHERE UserID = ".$_SESSION["userid"]);
  $renew->execute();
  $rows = $renew->fetch(PDO::FETCH_ASSOC);
  $_SESSION["userid"] = $rows["UserID"];
  $_SESSION["mail"] = $rows["fldMail"];
  $_SESSION["name"] = $rows["fldName"];
  $_SESSION["lastname"] = $rows["fldLastname"];
  $_SESSION["number"] = $rows["fldTele"];
  $_SESSION["city"] = $rows["fldCity"];
  $_SESSION["street"] = $rows["fldStreet"];
  $_SESSION["profilepic"] = $rows["fldProfilePic"];
  $_SESSION["zipcode"] = $rows["fldzipcode"];
  $_SESSION["housenumber"] = $rows["fldNumber"];
}
elseif(isset($_FILES["fileToUpload"]["name"]) and $_FILES["fileToUpload"]["name"] != ""){
  echo"issetfiles";
  $updateprofile = $dbh->prepare("UPDATE user SET fldName = ? , fldLastname = ? , fldMail = ? ,  fldTele = ? ,fldCity = ? , fldzipcode = ? , fldStreet = ? , fldNumber = ? , fldprofilepic = ? WHERE UserID = ".$_SESSION["userid"]);
  $updateprofile->bindParam(1,$_POST["Name"], PDO::PARAM_STR);
  $updateprofile->bindParam(2,$_POST["lastname"], PDO::PARAM_STR);
  $updateprofile->bindParam(3,$_POST["mail"], PDO::PARAM_STR);
  $updateprofile->bindParam(4,$_POST["number"], PDO::PARAM_STR);
  $updateprofile->bindParam(5,$_POST["city"], PDO::PARAM_STR);
  $updateprofile->bindParam(6,$_POST["zipcode"], PDO::PARAM_STR);
  $updateprofile->bindParam(7,$_POST["street"], PDO::PARAM_STR);
  $updateprofile->bindParam(8,$_POST["housenumber"], PDO::PARAM_STR);
  $updateprofile->bindParam(9,$_FILES["fileToUpload"]["name"], PDO::PARAM_STR);

  $target_dir = "../profilepics/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
  $updateprofile->execute();
  $renew = $dbh->prepare("SELECT * FROM user WHERE UserID = ".$_SESSION["userid"]);
  $renew->execute();
  $rows = $renew->fetch(PDO::FETCH_ASSOC);
  $_SESSION["userid"] = $rows["UserID"];
  $_SESSION["mail"] = $rows["fldMail"];
  $_SESSION["name"] = $rows["fldName"];
  $_SESSION["lastname"] = $rows["fldLastname"];
  $_SESSION["number"] = $rows["fldTele"];
  $_SESSION["city"] = $rows["fldCity"];
  $_SESSION["street"] = $rows["fldStreet"];
  $_SESSION["profilepic"] = $rows["fldProfilePic"];
  $_SESSION["zipcode"] = $rows["fldzipcode"];
  $_SESSION["housenumber"] = $rows["fldNumber"];
}
elseif(!empty($_POST["pass"])){
  echo"voorlaatste";
  $pass = $secure->registerhash($_POST["pass"]);
  $updateprofile = $dbh->prepare("UPDATE user SET fldName = ? , fldLastname = ? , fldMail = ? ,  fldTele = ? ,fldCity = ? , fldzipcode = ? , fldStreet = ? , fldNumber = ? , fldPassword = ? , salt = ? WHERE UserID = ".$_SESSION["userid"]);
  $updateprofile->bindParam(1,$_POST["Name"], PDO::PARAM_STR);
  $updateprofile->bindParam(2,$_POST["lastname"], PDO::PARAM_STR);
  $updateprofile->bindParam(3,$_POST["mail"], PDO::PARAM_STR);
  $updateprofile->bindParam(4,$_POST["number"], PDO::PARAM_STR);
  $updateprofile->bindParam(5,$_POST["city"], PDO::PARAM_STR);
  $updateprofile->bindParam(6,$_POST["zipcode"], PDO::PARAM_STR);
  $updateprofile->bindParam(7,$_POST["street"], PDO::PARAM_STR);
  $updateprofile->bindParam(8,$_POST["housenumber"], PDO::PARAM_STR);
  $updateprofile->bindParam(9,$pass[0], PDO::PARAM_STR);
  $updateprofile->bindParam(10,$pass[1], PDO::PARAM_STR);

  $updateprofile->execute();
  $renew = $dbh->prepare("SELECT * FROM user WHERE UserID = ".$_SESSION["userid"]);
  $renew->execute();
  $rows = $renew->fetch(PDO::FETCH_ASSOC);
  $_SESSION["userid"] = $rows["UserID"];
  $_SESSION["mail"] = $rows["fldMail"];
  $_SESSION["name"] = $rows["fldName"];
  $_SESSION["lastname"] = $rows["fldLastname"];
  $_SESSION["number"] = $rows["fldTele"];
  $_SESSION["city"] = $rows["fldCity"];
  $_SESSION["street"] = $rows["fldStreet"];
  $_SESSION["profilepic"] = $rows["fldProfilePic"];
  $_SESSION["zipcode"] = $rows["fldzipcode"];
  $_SESSION["housenumber"] = $rows["fldNumber"];
}
else{
  echo"laatste";
  $updateprofile = $dbh->prepare("UPDATE user SET fldName = ? , fldLastname = ? , fldMail = ? ,  fldTele = ? ,fldCity = ? , fldzipcode = ? , fldStreet = ? , fldNumber = ? WHERE UserID = ".$_SESSION["userid"]);
  $updateprofile->bindParam(1,$_POST["Name"], PDO::PARAM_STR);
  $updateprofile->bindParam(2,$_POST["lastname"], PDO::PARAM_STR);
  $updateprofile->bindParam(3,$_POST["mail"], PDO::PARAM_STR);
  $updateprofile->bindParam(4,$_POST["number"], PDO::PARAM_STR);
  $updateprofile->bindParam(5,$_POST["city"], PDO::PARAM_STR);
  $updateprofile->bindParam(6,$_POST["zipcode"], PDO::PARAM_STR);
  $updateprofile->bindParam(7,$_POST["street"], PDO::PARAM_STR);
  $updateprofile->bindParam(8,$_POST["housenumber"], PDO::PARAM_STR);
  $updateprofile->execute();
  $renew = $dbh->prepare("SELECT * FROM user WHERE UserID = ".$_SESSION["userid"]);
  $renew->execute();
  $rows = $renew->fetch(PDO::FETCH_ASSOC);
  $_SESSION["userid"] = $rows["UserID"];
  $_SESSION["mail"] = $rows["fldMail"];
  $_SESSION["name"] = $rows["fldName"];
  $_SESSION["lastname"] = $rows["fldLastname"];
  $_SESSION["number"] = $rows["fldTele"];
  $_SESSION["city"] = $rows["fldCity"];
  $_SESSION["street"] = $rows["fldStreet"];
  $_SESSION["profilepic"] = $rows["fldProfilePic"];
  $_SESSION["zipcode"] = $rows["fldzipcode"];
  $_SESSION["housenumber"] = $rows["fldNumber"];
}

header("location: ../changeuserinfo.php");
?>
