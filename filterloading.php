
<?php
include"conn.php";
session_start();

$_SESSION["ids"] = array();

//error_reporting(0);
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
  $per4 = 0;
  ?>
  <div class="fullsize">
    <?php
  while($check == true){

    $start++;

    if($user[$start] != ""){
      $gettype = $dbh->prepare("SELECT * FROM details WHERE fldname = '".$user[$start]."'");
      $gettype->execute();
      $type = $gettype->fetch(PDO::FETCH_ASSOC);
      if($per4 == 4){ ?>
      </div>
      <div class="fullsize">
<?php
        if($stringposting === ""){
           $stringposting .= $user[$start];
        }
        else{
           $stringposting .= "_".$user[$start];
        }
      }
      if($type["SortingID"] == 1){ ?>
          <div class="percentage">
            <label><?php echo $user[$start] ?></label>
            <input class="input" type="text" id="<?php echo $user[$start]; ?>" value="">
          </div>
<?php
        if($stringposting === ""){
           $stringposting .= $user[$start];
        }
        else{
           $stringposting .= "_".$user[$start];
        }
      }
      elseif($type["SortingID"] == 2){ ?>
          <div class="percentage">
            <label><?php echo $user[$start] ?></label>
            <input class="input" type="number" id="<?php echo $user[$start]; ?>" value="">
          </div>
<?php
        if($stringposting === ""){
           $stringposting .= $user[$start];
        }
        else{
           $stringposting .= "_".$user[$start];
        }
      }
      elseif($type["SortingID"] == 3){ ?>
          <div class="percentage">
            <label><?php echo $user[$start] ?></label>
            <input type="text" class="input" id="<?php echo $user[$start]; ?>" value="">
          </div>
<?php
        if($stringposting === ""){
           $stringposting .= $user[$start];
        }
        else{
           $stringposting .= "_".$user[$start];
        }
      }
      elseif($type["SortingID"] == 4){ ?>
          <div class="percentage">
            <label><?php echo $user[$start];"(Not available/available)" ?> </label><br>
            <label style="margin-left:0 !important; .ui-mobile label{display:contents}" class="switch">
              <input type="checkbox" v-model="registration.check" id="<?php echo $user[$start]; ?>">
              <span class="slider round"></span>
            </label>
          </div>
<?php
        if($stringposting === ""){
           $stringposting .= $user[$start];
        }
        else{
           $stringposting .= "_".$user[$start];
        }
      }


    }
    else{
      $check = false;
    }
    $per4++;
  } ?><?php if(isset($_GET["fieldcreate"])){ ?>

    </div>

    <div class="newline">
      <button type="button" onclick="createroom('<?php echo $stringposting ?>');" id="sending" class="button"  name="button">Create room</button>
    </div>

  <?php } ?>
<?php }
elseif(isset($_GET["createroom"])){
  $preroom = $dbh->prepare("INSERT INTO room () VALUES ()");
  $preroom->execute();
  $getroom = $dbh->prepare("SELECT * FROM room order by RoomID desc limit 1");
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
      echo"inserted text";
      $insert = $dbh->prepare("INSERT INTO room_details (Textawn,RoomID,DetailsID) VALUES ('".$solo[1]."',".$roomnumber["RoomID"].",".$resultcheck["DetailsID"].")");
      $insert->execute();
    }
    if($resultcheck["SortingID"] == 2){
      echo"inserted number";
      $insert = $dbh->prepare("INSERT INTO room_details (Numberawn,RoomID,DetailsID) VALUES (".$solo[1].",".$roomnumber["RoomID"].",".$resultcheck["DetailsID"].")");
      $insert->execute();
    }
    if($resultcheck["SortingID"] == 3){
      echo"inserted select";
      $insert = $dbh->prepare("INSERT INTO room_details (Boolawn,RoomID,DetailsID) VALUES (1,".$roomnumber["RoomID"].",".$resultcheck["DetailsID"].")");
      $insert->execute();
    }
    if($resultcheck["SortingID"] == 4){
      echo"inserted switch";
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
