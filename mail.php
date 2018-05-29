<?php
include"conn.php";
include"dbclasses.php";
include "phpmail.php";
session_start();
if(isset($_GET["roommail"])){
  $qr = new classes();
  $rent = 0;
  $id = $dbh->prepare("SELECT * FROM ticket WHERE OwnerID = ? ORDER BY TicketID DESC LIMIT 1");
  $id->bindValue(1,$_SESSION["userid"],PDO::PARAM_STR);
  $id->execute();
  $rows = $id->fetch(PDO::FETCH_ASSOC);
  $_SESSION["test"] = $rows["Special_Number"];
  $qr->qrcode($rows["Special_Number"]);
  $mail = new PHPMailer;
  $mail->setFrom('ggame968@gmail.com', 'Nick Langens');
  $mail->addAddress($_SESSION["mail"], $_SESSION["name"]." ".$_SESSION["lastname"]);
  $mail->AddEmbeddedImage('jaa.png', 'logo_2u');
  $mail->Subject  = 'Your ticket has been processed';
  $mail->Body     = '<p>Bring this ticket with you</p>
  <img src="cid:logo_2u">';
  $mail->IsHTML(true);
  if(!$mail->send()) {
    echo 'Message was not sent.';
    echo 'Mailer error: ' . $mail->ErrorInfo;
  } else {
    echo 'Message has been sent.';
  }



}
elseif(isset($_GET["event"])){
  $event = new classes();
  $code = $event->hashishnosalt($_SESSION["eventid"]);
  $insertintotickets = $dbh->prepare("INSERT INTO ticket (EventID,OwnerID,Special_Number) VALUES (".$_SESSION["eventid"].",".$_SESSION["userid"].",'".$code."') ");
  $insertintotickets->execute();
  $insertintotickets->debugDumpParams();
  $qr = new classes();
  $rent = 1;
  $id = $dbh->prepare("SELECT * FROM ticket WHERE OwnerID = ? ORDER BY TicketID DESC LIMIT 1");
  $id->bindValue(1,$_SESSION["userid"],PDO::PARAM_STR);
  $id->execute();
  $rows = $id->fetch(PDO::FETCH_ASSOC);
  $_SESSION["test"] = $rows["Special_Number"];
  $qr->qrcode($rows["Special_Number"]);
  $mail = new PHPMailer;
  $mail->setFrom('ggame968@gmail.com', 'cifpcm-reservations');
  $mail->addAddress($_SESSION["mail"], $_SESSION["name"]." ".$_SESSION["lastname"]);
  $mail->AddEmbeddedImage('ticket.png', 'logo_2u');
  $mail->Subject  = 'Your ticket has been processed';
  $mail->Body     = '<p>Bring this ticket with you</p>
  <img src="cid:logo_2u">';
  $geteventspecs = $dbh->prepare("SELECT Sold_Ticket FROM real_tenerife.event WHERE EventID = ".$_SESSION["eventid"]);
  $geteventspecs->execute();
  $eventspecs = $geteventspecs->fetch(PDO::FETCH_ASSOC);
  $newnum = $eventspecs["Sold_Ticket"] + 1;
  $lowerdefence =  $dbh->prepare("SET SQL_SAFE_UPDATES=0;");
  $lowerdefence->execute();
  $addparticipant = $dbh->prepare("UPDATE real_tenerife.event SET Sold_Ticket = ".$newnum." WHERE EventID = ".$_SESSION["eventid"]);
  $addparticipant->execute();
  $mail->IsHTML(true);
  if(!$mail->send()) {
    echo 'Message was not sent.';
    echo 'Mailer error: ' . $mail->ErrorInfo;
  } else {
    echo 'Message has been sent.';
  }

$addparticipant->debugDumpParams();
  header("location:index.php");


}
elseif(isset($_GET["eventdel"])){
  $geteventspecs = $dbh->prepare("SELECT Sold_Ticket FROM event WHERE EventID = ".$_SESSION["eventid"]);
  $geteventspecs->execute();
  $eventspecs = $geteventspecs->fetch(PDO::FETCH_ASSOC);
  $newnum = $eventspecs["Sold_Ticket"] - 1;
  $lowerdefence = $dbh->prepare("SET SQL_SAFE_UPDATES=0;");
  $lowerdefence->execute();
  $addparticipant = $dbh->prepare("UPDATE real_tenerife.event SET Sold_Ticket = ".$newnum." WHERE EventID = ".$_SESSION["eventid"]);

  $addparticipant->execute();

  $delete = $dbh->prepare("DELETE FROM ticket WHERE OwnerID = ".$_SESSION["userid"]." AND EventID = ".$_SESSION["eventid"]);
  $delete->execute();
}


 ?>
