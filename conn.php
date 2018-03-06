<?php

$dbname = "real_tenerife";
$dbusern = "root";
$dbhost = "localhost";
$dbpass = "";
$charset = "utf8";

try {

  $dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbusern, $dbpass, array(PDO::ATTR_PERSISTENT => true));
} catch (PDOException $e) {
    echo "foutje!: " . $e->getMessage() . "<br/>";
    die();
}

?>
