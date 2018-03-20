<?php
include"conn.php";
session_start();
$_GET["createevent"] = "yes";
if(isset($_GET["createevent"])){
  /*var info = {
    name:nameevent,
    ticket:tickets,
    starttime:time,
    endtime:time2,
    discrip:discription
  }*/
  $data = json_decode(file_get_contents('php://input'), true);
  //$data["name"] = "nameevent";
  //$data["ticket"] = 25;
  //$data["starttime"] = "18:50";
  //$data["endtime"] = "20:50";
  //$data["discrip"] = "tis+gedaan";
  $soldtickets = 0;
  //$_SESSION["date"] = "16/03/2018";
  $_SESSION["userID"] = 1;
  $rent = 1;
  $pic = "yes";
  $active = 1;
  $nameev = str_replace("+"," ",$data["name"]);
  $discriptionreal = str_replace("+"," ",$data["discrip"]);
  $inserttimetable = $dbh->prepare("INSERT INTO roomhours (RoomID,fldDate,fldStartTime,fldEndTime) VALUES (?,?,?,?) ;");
  $inserttimetable->bindParam(1,$_SESSION["roomids"],PDO::PARAM_STR);
  $inserttimetable->bindParam(2,$_SESSION["date"],PDO::PARAM_STR);
  $inserttimetable->bindParam(3,$data["starttime"],PDO::PARAM_STR);
  $inserttimetable->bindParam(4,$data["endtime"],PDO::PARAM_STR);
  $inserttimetable->execute();
  $gettimetable = $dbh->prepare("SELECT Room_HoursID FROM roomhours order by Room_HoursID desc limit 1;");
  $gettimetable->execute();
  $timetable = $gettimetable->fetch(PDO::FETCH_ASSOC);
  $inserteventtable = $dbh->prepare("INSERT INTO event (eventname,CreatorID,Limited_Ticket,Discription,EventOrRent,Mainpicture,date_event,active,Sold_Ticket,Reservation) VALUES (?,?,?,?,?,?,?,?,?,?);");
  $inserteventtable->bindParam(1,$nameev,PDO::PARAM_STR);
  $inserteventtable->bindParam(2,$_SESSION["userID"],PDO::PARAM_STR);
  $inserteventtable->bindParam(3,$data["ticket"],PDO::PARAM_INT);
  $inserteventtable->bindParam(4,$discriptionreal, PDO::PARAM_STR);
  $inserteventtable->bindParam(5,$rent,PDO::PARAM_INT);
  $inserteventtable->bindParam(6,$data["imagename"],PDO::PARAM_STR);
  $inserteventtable->bindParam(7,$_SESSION["date"],PDO::PARAM_STR);
  $inserteventtable->bindParam(8,$active,PDO::PARAM_STR);
  $inserteventtable->bindParam(9,$soldtickets,PDO::PARAM_STR);
  $inserteventtable->bindParam(10,$timetable["Room_HoursID"],PDO::PARAM_STR);
  $inserteventtable->execute();
  $inserteventtable->debugDumpParams();

}
elseif(isset($createbooking)){

}




?>
