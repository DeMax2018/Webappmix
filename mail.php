<?php
session_start();
include"conn.php";
include"dbclasses.php";
include "phpmail.php";
$data = json_decode(file_get_contents('php://input'), true);
$qr = new classes();
$id = $dbh->prepare("SELECT * FROM ticket WHERE OwnerID = ? and EventID = ? ");
$id->bindValue(1,1,PDO::PARAM_STR);
$id->bindValue(2,1,PDO::PARAM_STR);
$id->execute();
$rows = $id->fetch(PDO::FETCH_ASSOC);
$_SESSION["test"] = $rows["Special_Number"];
$qr->qrcode($rows["Special_Number"]);
$mail = new PHPMailer;
$mail->setFrom('ggame968@gmail.com', 'Nick Langens');
$mail->addAddress('nick.langens@gmail.com', 'Rob Langens');
$mail->AddEmbeddedImage('jaa.png', 'logo_2u');
$mail->Subject  = 'Your ticket has been processed';
$mail->Body     = '<p>het is precies wel gelukt ni??</p>
<img src="cid:logo_2u">';
$mail->IsHTML(true);
if(!$mail->send()) {
  echo 'Message was not sent.';
  echo 'Mailer error: ' . $mail->ErrorInfo;
} else {
  echo 'Message has been sent.';
}



 ?>
