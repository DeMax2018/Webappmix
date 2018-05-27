<?php
session_start();
include "conn.php";
print_r($_SESSION["overview"]);
if(isset($_SESSION["Roomfilter"]) and $_SESSION["Roomfilter"] != "givenewvarplease"){
  $deleteroominfo = $dbh->prepare("DELETE FROM room_details WHERE RoomID = ".$_SESSION["Roomfilter"]);
  $deleteroominfo->execute();
  $delroom = $dbh->prepare("DELETE FROM room WHERE RoomID = ".$_SESSION["Roomfilter"]);
  $delroom->execute();
  $_SESSION["Roomfilter"] = "givenewvarplease";
}
$insertnewroom = $dbh->prepare("INSERT INTO room () VALUES ()");
$insertnewroom->execute();
$getroom = $dbh->prepare("SELECT * FROM room order by RoomID desc limit 1");
$getroom->execute();
$roomnumber = $getroom->fetch(PDO::FETCH_ASSOC);
$user = explode("_",$_SESSION["overview"]);
foreach($user as &$param){
  $typeoffield = $dbh->prepare("SELECT SortingID , DetailsID FROM details WHERE fldname = '".$param."' ");
  $typeoffield->execute();
  $fieldtype = $typeoffield->fetch(PDO::FETCH_ASSOC);
  switch ($param) {
    case "image":
      require_once "dbclasses.php";
      $image = new classes;
      $imagename = $image->uploadimage();
      echo "DIT IS HET ".$imagename."JAAAAAAAAAAAAAA";
      $insertquery = $dbh->prepare("INSERT INTO room_details (RoomID,DetailsID,Textawn) VALUES (".$roomnumber["RoomID"].",10,'".$imagename."')");
      $insertquery->execute();
      break;
    default:
      switch ($fieldtype["SortingID"]) {
        case 1:
          $insertquery = $dbh->prepare("INSERT INTO room_details (RoomID,DetailsID,Textawn) VALUES (".$roomnumber["RoomID"].",".$fieldtype["DetailsID"].",'".$_POST[$param]."')");
          $insertquery->execute();
          break;
          case 2:
            $insertquery = $dbh->prepare("INSERT INTO room_details (RoomID,DetailsID,Numberawn) VALUES (".$roomnumber["RoomID"].",".$fieldtype["DetailsID"].",".$_POST[$param].")");
            $insertquery->execute();
            break;
            case 3:
              $insertquery = $dbh->prepare("INSERT INTO room_details (RoomID,DetailsID,Textawn) VALUES (".$roomnumber["RoomID"].",".$fieldtype["DetailsID"].",'".$_POST[$param]."')");
              $insertquery->execute();
              echo $_POST[$param];
              break;
              case 4:
                switch ($_POST[$param]) {
                  case "on":
                    $insertquery = $dbh->prepare("INSERT INTO room_details (RoomID,DetailsID,Boolawn) VALUES (".$roomnumber["RoomID"].",".$fieldtype["DetailsID"].",1)");
                    $insertquery->execute();
                    break;
                    default:
                      $insertquery = $dbh->prepare("INSERT INTO room_details (RoomID,DetailsID,Boolawn) VALUES (".$roomnumber["RoomID"].",".$fieldtype["DetailsID"].",0)");
                      $insertquery->execute();
                      break;
                }
                break;
              default:
                # code...
                break;

      }
      break;
  }
}
header("location: admin.php");
?>
