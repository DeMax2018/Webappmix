<?php
include"conn.php";
session_start();

$_SESSION["ids"] = array();

error_reporting(0);
if(isset($_GET["fieldcreate"])){
  if($_GET["fieldcreate"] != "all"){
  $stringposting = "";
  $user = explode("_",$_GET["get"]);
}
else{
  $user = array();
  $stringposting = "";
  $getfilter = $dbh->prepare("SELECT * FROM details");
  $getfilter->execute();
  while($filters = $getfilter->fetch(PDO::FETCH_ASSOC)){
    array_push($user, $filters["fldname"]);
  }
}

  $start = 0;
  $check = true;
  while($check == true){
    $start++;

    if($user[$start] != ""){
      $gettype = $dbh->prepare("SELECT * FROM details WHERE fldname = '".$user[$start]."'");

      $gettype->execute();
      $type = $gettype->fetch(PDO::FETCH_ASSOC);

      if($type["SortingID"] == 1){
        if(!isset($_GET["fieldcreate"])){
        ?>
        <div  onchange="" class="percentage">
        <?php } ?>
          <label>Name of<?php echo $type["fldname"] ?></label>
        <input type="text" style="width:20em !important" class="input" placeholder="how many <?php echo $user[$start]?> are there available?" id="<?php echo $user[$start]?>" name="" value="">
    <?php if(!isset($_GET["fieldcreate"])){ ?>
      </div>
  <?php  }

      if($stringposting === ""){
        $stringposting .= $user[$start];
      }
      else{
        $stringposting .= "_".$user[$start];
      }
        }
      elseif($type["SortingID"] == 2){
        if(!isset($_GET["fieldcreate"])){
        ?>
        <div  onchange="" class="percentage">
        <?php } ?>
          <label>Amount of <?php echo $type["fldname"] ?></label>
        <input type="number" class="input" placeholder="how many <?php echo $user[$start]?> are there available?" id="<?php echo $user[$start]?>" name="" value="">
        <?php if(!isset($_GET["fieldcreate"])){ ?>
          </div>
      <?php  }


      if($stringposting === ""){
        $stringposting .= $user[$start];
      }
      else{
        $stringposting .= "_".$user[$start];
      }
          }
      elseif($type["SortingID"] == 3){
        if(!isset($_GET["fieldcreate"])){
        ?>
        <div  onchange="" class="percentage">
        <?php } ?>
        <select type="text" class="input" placeholder="how many <?php echo $user[$start]?> are there available?" id="<?php echo $user[$start]?>" name="" value="">
        </select>
        <?php if(!isset($_GET["fieldcreate"])){ ?>
          </div>
      <?php  }

      if($stringposting === ""){
        $stringposting .= $user[$start];
      }
      else{
        $stringposting .= "_".$user[$start];
      }
      }
      elseif($type["SortingID"] == 4){
        if(!isset($_GET["fieldcreate"])){
        ?>
        <div  onchange="" class="percentage">
        <?php } ?>
          <label><?php echo $type["fldname"]."(off/on)" ?> </label>
        <?php if(!isset($_GET["fieldcreate"])){ ?>
          <label class="switch">
          <?php }
          else{ ?>
            <label style="margin-left:0 !important" class="switch">
          <?php } ?>
            <input type="checkbox"id="<?php echo $user[$start]?>">
          <span class="slider round"></span>
          </label>        <?php if(!isset($_GET["fieldcreate"])){ ?>
                </div>
            <?php  }

      if($stringposting === ""){
        $stringposting .= $user[$start];
      }
      else{
        $stringposting .= "_".$user[$start];
      }
      }
      ?>

    <?php }
    else{
      $check = false;
    }
  } ?><?php if(isset($_GET["fieldcreate"])){ ?><button type="button" onclick="createroom('<?php echo $stringposting ?>');" id="sending"  name="button">Create room</button><?php } ?>
<?php }
elseif(isset($_GET["createroom"])){
  $preroom = $dbh->prepare("INSERT INTO room (fldName, BuildingID) VALUES ('".$_GET["roomname"]."',".$_GET["buildingpick"].")");
  $preroom->execute();
  $getroom = $dbh->prepare("SELECT * FROM room WHERE fldName = '".$_GET["roomname"]."'");
  $getroom->execute();
  $roomnumber = $getroom->fetch(PDO::FETCH_ASSOC);
  $addingarray = array();
  $addingarraycheck = array();
  $addingvariables = "";
  $addingvalues = "";
  $default = $dbh->prepare("SELECT * FROM details ;");
  $default->execute();
  while($defaultadd = $default->fetch(PDO::FETCH_ASSOC)){
    if($addingvariables === ""){
      $addingvariables = $defaultadd["fldname"];
      array_push($addingarray,$defaultadd["fldname"]);
    }
    else{
      $addingvariables .= ", ".$defaultadd["fldname"];
      array_push($addingarray,$defaultadd["fldname"]);
    }
  }
  $pair = explode("_",$_GET["variables"]);
  foreach ($pair as &$value) {
    $solo = explode("-",$value);
    $check = $dbh->prepare("SELECT * FROM details WHERE fldname = '".$solo[0]."'");
    $check->execute();
    $resultcheck = $check->fetch(PDO::FETCH_ASSOC);
    echo $solo[0]."dit is de solo";
    if($resultcheck["SortingID"] == 1){
      $insert = $dbh->prepare("INSERT INTO room_details (Textawn,RoomID,DetailsID) VALUES ('".$solo[1]."',".$roomnumber["RoomID"].",".$resultcheck["DetailsID"].")");
      $insert->execute();
    }
    if($resultcheck["SortingID"] == 2){
      $insert = $dbh->prepare("INSERT INTO room_details (Numberawn,RoomID,DetailsID) VALUES (".$solo[1].",".$roomnumber["RoomID"].",".$resultcheck["DetailsID"].")");
      $insert->execute();
    }
    if($resultcheck["SortingID"] == 3){
      $insert = $dbh->prepare("INSERT INTO room_details (Boolawn,RoomID,DetailsID) VALUES (1,".$roomnumber["RoomID"].",".$resultcheck["DetailsID"].")");
      $insert->execute();
    }
    if($resultcheck["SortingID"] == 4){
      if($solo[1] === "on"){
        $insert = $dbh->prepare("INSERT INTO room_details (Boolawn,RoomID,DetailsID) VALUES (1,".$roomnumber["RoomID"].",".$resultcheck["DetailsID"].")");
      }
      else{
        $insert = $dbh->prepare("INSERT INTO room_details (Boolawn,RoomID,DetailsID) VALUES (0,".$roomnumber["RoomID"].",".$resultcheck["DetailsID"].")");

      }
      $insert->execute();
    }
    //$param = $solo[0]." => ".$solo[1];
    //array_push($addingarraycheck,$param);
  }
}
elseif(isset($_GET["addfilter"])){
  $box = json_decode(file_get_contents('php://input'), true);
  $sql = $dbh->prepare("INSERT INTO details (fldname, SortingID) VALUES ('".$box["name"]."',". $box["type"].")");
  $sql->execute();
}
elseif(isset($_GET["addbuilding"])){
  $box = json_decode(file_get_contents('php://input'), true);
  $sql = $dbh->prepare("INSERT INTO building (fldName) VALUES ('".$box["name"]."')");
  $sql->execute();
}
?>
