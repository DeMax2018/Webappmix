<?php

include "phpmail.php";
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
