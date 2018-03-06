<?php
include "parameters.php";
$db = new dbparameters();
try {

  $dbh = new PDO("mysql:host=$db->dbhost;dbname=$db->dbname", $db->dbusern, $db->dbpass, array(PDO::ATTR_PERSISTENT => true));
} catch (PDOException $e) {
    echo "foutje!: " . $e->getMessage() . "<br/>";
    die();
}

?>
