<?php
include "parameters.php";
$db = new dbparameters();
try {
  $dbh = new PDO("mysql:host=$db->dbhost.';dbname='.$db->dbname, $db->dbusern, $db->dbpass, array(PDO::ATTR_PERSISTENT => true));
  echo $dbh;
    foreach($dbh->query('SELECT') as $row) {
        print_r($row);
    }
    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>
