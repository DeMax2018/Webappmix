<?php
session_start();
$box = json_decode(file_get_contents('php://input'), true);

if(isset($box["numberinput"])){
  $_SESSION["roomids"] = $box["numberinput"];
}
else{
  $_SESSION["date"] = $box["date"];
}

?>
