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


 ?>
