<?php
include"conn.php";
session_start();
include "dbclasses.php";

if(isset($_GET["createevent"])){
  $data = json_decode(file_get_contents('php://input'), true);
  $soldtickets = 0;
  $rent = 1;
  $active = 1;
  $nameev = str_replace("+"," ",$data["name"]);
  $discriptionreal = str_replace("+"," ",$data["discrip"]);
  $Necessitiesreal = str_replace("+"," ",$data["nessessit"]);
  $inserttimetable = $dbh->prepare("INSERT INTO roomhours (RoomID,fldDate,fldStartTime,fldEndTime) VALUES (?,?,?,?) ;");
  $inserttimetable->bindParam(1,$_SESSION["roomids"],PDO::PARAM_STR);
  $inserttimetable->bindParam(2,$_SESSION["date"],PDO::PARAM_STR);
  $inserttimetable->bindParam(3,$data["starttime"],PDO::PARAM_STR);
  $inserttimetable->bindParam(4,$data["endtime"],PDO::PARAM_STR);
  $inserttimetable->execute();
  $gettimetable = $dbh->prepare("SELECT Room_HoursID FROM roomhours order by Room_HoursID desc limit 1;");
  $gettimetable->execute();
  $timetable = $gettimetable->fetch(PDO::FETCH_ASSOC);
  $inserteventtable = $dbh->prepare("INSERT INTO event (eventname,CreatorID,Limited_Ticket,Discription,EventOrRent,date_event,active,Sold_Ticket,Reservation,Necessities) VALUES (?,?,?,?,?,?,?,?,?,?);");
  $inserteventtable->bindParam(1,$nameev,PDO::PARAM_STR);
  $inserteventtable->bindParam(2,$_SESSION["userID"],PDO::PARAM_STR);
  $inserteventtable->bindParam(3,$data["ticket"],PDO::PARAM_INT);
  $inserteventtable->bindParam(4,$discriptionreal, PDO::PARAM_STR);
  $inserteventtable->bindParam(5,$rent,PDO::PARAM_INT);
  $inserteventtable->bindParam(6,$_SESSION["date"],PDO::PARAM_STR);
  $inserteventtable->bindParam(7,$active,PDO::PARAM_STR);
  $inserteventtable->bindParam(8,$soldtickets,PDO::PARAM_STR);
  $inserteventtable->bindParam(9,$timetable["Room_HoursID"],PDO::PARAM_STR);
  $inserteventtable->bindParam(10,$Necessitiesreal,PDO::PARAM_STR);
  $inserteventtable->execute();
  $inserteventtable->debugDumpParams();
  $getlastevent = $dbh->prepare("SELECT * FROM real_tenerife.event order by EventID desc limit 1;");
  $getlastevent->execute();
  $lastevent = $getlastevent->fetch(PDO::FETCH_ASSOC);
  $_SESSION["eventupdateid"] = $lastevent["EventID"];

}
elseif(isset($_GET["createbooking"])){
  $rent = 0;
  $active = 1;
  $data = json_decode(file_get_contents('php://input'), true);
  $inserttimetable = $dbh->prepare("INSERT INTO roomhours (RoomID,fldDate,fldStartTime,fldEndTime) VALUES (?,?,?,?) ;");
  $inserttimetable->bindParam(1,$_SESSION["roomids"],PDO::PARAM_STR);
  $inserttimetable->bindParam(2,$_SESSION["date"],PDO::PARAM_STR);
  $inserttimetable->bindParam(3,$data["starttime"],PDO::PARAM_STR);
  $inserttimetable->bindParam(4,$data["endtime"],PDO::PARAM_STR);
  $inserttimetable->execute();
  $gettimetable = $dbh->prepare("SELECT Room_HoursID FROM roomhours order by Room_HoursID desc limit 1;");
  $gettimetable->execute();
  $timetable = $gettimetable->fetch(PDO::FETCH_ASSOC);
  $inserteventtable = $dbh->prepare("INSERT INTO event (CreatorID,Reservation,EventOrRent,Active,date_event) VALUES (?,?,?,?,?);");
  $inserteventtable->bindParam(1,$_SESSION["userid"],PDO::PARAM_STR);
  $inserteventtable->bindParam(2,$timetable["Room_HoursID"],PDO::PARAM_INT);
  $inserteventtable->bindParam(3,$rent,PDO::PARAM_INT);
  $inserteventtable->bindParam(4,$active,PDO::PARAM_INT);
  $inserteventtable->bindParam(5,$_SESSION["date"],PDO::PARAM_STR);
  $inserteventtable->execute();
  $inserteventtable->debugDumpParams();
  $getevent = $dbh->prepare("SELECT * FROM event ORDER BY EventID DESC LIMIT 1 ; ");
  $getevent->execute();
  $event = $getevent->fetch(PDO::FETCH_ASSOC);
  $createticket = $dbh->prepare("INSERT INTO ticket (EventID,OwnerID,Special_Number) VALUES (?,?,?)");
  $createticket->bindParam(1,$event["EventID"],PDO::PARAM_INT);
  $createticket->bindParam(2,$_SESSION["userid"],PDO::PARAM_INT);
  $hashing = new classes();
  $specialcode = $hashing->hashishnosalt($event["EventID"]);
  $createticket->bindParam(3,$specialcode,PDO::PARAM_STR);
  $createticket->execute();
}
elseif(isset($_GET["imageupload"])){
  $target_dir = "upload/";
  $target_file = $target_dir . basename($_FILES["mainpic"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  // Check if image file is a actual image or fake image
  if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["mainpic"]["tmp_name"]);
      if($check !== false) {
          echo "File is an image - " . $check["mime"] . ".";
          $uploadOk = 1;
      } else {
          echo "File is not an image.";
          $uploadOk = 0;
      }
  }
  // Check if file already exists
  if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
  }
  // Check file size
  if ($_FILES["mainpic"]["size"] > 500000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
  }
  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
  }
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
      if (move_uploaded_file($_FILES["mainpic"]["tmp_name"], $target_file)) {
          echo "The file ". basename( $_FILES["mainpic"]["name"]). " has been uploaded.";
      } else {
          echo "Sorry, there was an error uploading your file.";
      }
  }
  $nameimage = basename($_FILES["mainpic"]["name"])
  ;
  echo $nameimage;
  $updateevent = $dbh->prepare("UPDATE event SET Mainpicture = '".$nameimage."' WHERE EventID = ".$_SESSION["eventupdateid"]);
  $updateevent->execute();
}

header("location:index.php");


?>
