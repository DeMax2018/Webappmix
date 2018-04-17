<?php

include"conn.php";
include"dbclasses.php";
if(isset($_GET["profilepreload"])){
  $getprofilepic = $dbh->prepare("SELECT * FROM user WHERE fldMail = '".$_GET["profilepreload"]."'");
  $getprofilepic->execute();
  $profilepic = $getprofilepic->fetch(PDO::FETCH_ASSOC);
  ?>
  <figure class="avatar">
    <img src="profilepics/<?php  if(isset($profilepic["fldProfilePic"])){ echo$profilepic["fldProfilePic"];}else{ echo "avatar.png";} ?>">
  </figure>
  <?php
}
elseif(isset($_GET["checkmail"])){
  $box = json_decode(file_get_contents('php://input'), true);
  $getmail = $dbh->prepare("SELECT * FROM user WHERE fldMail = '".$box["mail"]."'");
  $getmail->execute();

  if($getmail->rowCount() == 0){
    echo json_encode( ['success'=>false] );
  }
  else{
    echo json_encode( ['success'=>true] );
  }

}
else{
  $class = new classes();
  $firstsafe = $class->secure($_POST["password"]);
  $secondsafe = $class->registerhash($firstsafe);
  $create = $dbh->prepare("INSERT INTO User (fldName,fldLastname,fldMail,fldPassword,salt) VALUES (?,?,?,?,?)");
  $create->bindValue(1, $_POST["First_Name"], PDO::PARAM_STR);
  $create->bindValue(2, $_POST["Last_Name"], PDO::PARAM_STR);
  $create->bindValue(3, $_POST["email"], PDO::PARAM_STR);
  $create->bindValue(4, $secondsafe[0], PDO::PARAM_STR);
  $create->bindValue(5, $secondsafe[1], PDO::PARAM_STR);
  $create->execute();
  $getuser = $dbh->prepare("SELECT * FROM User WHERE fldName = ? AND fldLastname = ? ;");
  $getuser->bindValue(1, $_POST["First_Name"], PDO::PARAM_STR);
  $getuser->bindValue(2, $_POST["Last_Name"], PDO::PARAM_STR);
  $getuser->execute();
  $record = $getuser->fetch(PDO::FETCH_ASSOC);
  echo $record["UserID"];
  $create_right = $dbh->prepare("INSERT INTO privaterights (UserID,Create_events,Delete_Events,Acces_Rights_System) VALUES (".$record["UserID"] .",0,0,0)");
  $create_right->execute();
  $insertgroups = $dbh->prepare("INSERT INTO user_group (UserID,cifpcm,admin,user) VALUES (".$record["UserID"].",0,0,1)");
  $insertgroups->execute();
  header("location: index.php");
}





?>
