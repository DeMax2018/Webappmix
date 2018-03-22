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
  $specialcode = $hashing->hashish($event["EventID"]);
  $createticket->bindParam(3,$specialcode,PDO::PARAM_STR);
  $createticket->execute();
}




?>
