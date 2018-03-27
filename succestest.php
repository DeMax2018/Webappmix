<?php
include"conn.php";
$box = json_decode(file_get_contents('php://input'), true);
$mail = str_replace("_","@",$box["mail"]);

$checkmail = $dbh->prepare("SELECT fldMail FROM user; ");
$checkmail->execute();
while($checker = $checkmail->fetch(PDO::FETCH_ASSOC)){
  if($mail === $checker["fldMail"]){
    echo json_encode(array('false' => true));
    $error = "yes";
    break;
  }
}
if(!isset($error)){
  echo json_encode(array('success' => true));
}




?>
