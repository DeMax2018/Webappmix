<?php
session_start();
if($_session["auth"] != true){
  header("location: index.php");
}


?>
