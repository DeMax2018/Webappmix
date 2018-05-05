<?php

include"dbclasses.php";
$image = new classes();
$name = $image->uploadimage();
echo "////".$name;

echo $_POST["life"];

 ?>
