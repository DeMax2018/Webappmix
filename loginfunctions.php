<?php

include"conn.php";

  $sth = $dbh->prepare("INSERT INTO User (fldName,fldLastname,fldMail,fldPassword) VALUES (?,?,?,?)");
  $sth->bindValue(1, $_POST["First_Name"], PDO::PARAM_STR);
  $sth->bindValue(2, $_POST["Last_Name"], PDO::PARAM_STR);
  $sth->bindValue(3, $_POST["email"], PDO::PARAM_STR);
  $sth->bindValue(4, $_POST["password"], PDO::PARAM_STR);
  $sth->execute();


header("location: index.php");





?>
