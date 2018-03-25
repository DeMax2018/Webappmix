
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
  foreach($user as &$namefil){




      $gettype = $dbh->prepare("SELECT * FROM details WHERE fldname = '".$namefil."'");
      $gettype->execute();
      $type = $gettype->fetch(PDO::FETCH_ASSOC);
      if($per4 == 4){ ?>
      </div>
      <div class="fullsize">
<?php
        if($stringposting === ""){
           $stringposting .= $namefil;
        }
        else{
           $stringposting .= "_".$namefil;
        }
      }
      if($type["SortingID"] == 1){ ?>
          <div class="percentage">
            <label><?php echo $namefil ?></label>
            <?php if(isset($_SESSION["switch"]) and $_SESSION["switch"] === "on"){
              $getvalue = $dbh->prepare("SELECT Textawn FROM room_details WHERE DetailsID = ".$type["DetailsID"]." AND RoomID = ".$_SESSION["Roomfilter"]);
              $getvalue->execute();
              $value = $getvalue->fetch(PDO::FETCH_ASSOC);
             ?>
            <input class="input" type="text" id="<?php echo $namefil; ?>" value="<?php echo $value["Textawn"]?>">
            <?php
          }
          else{ ?>
            <input class="input" type="text" id="<?php echo $namefil; ?>" value="">
          <?php } ?>
          </div>
<?php
        if($stringposting === ""){
           $stringposting .= $namefil;
        }
        else{
           $stringposting .= "_".$namefil;
        }
      }
      elseif($type["SortingID"] == 2){ ?>
        <?php if(isset($_SESSION["switch"]) and $_SESSION["switch"] === "on"){
          $getvalue = $dbh->prepare("SELECT Numberawn FROM room_details WHERE DetailsID = ".$type["DetailsID"]." AND RoomID = ".$_SESSION["Roomfilter"]);
          $getvalue->execute();
          $value = $getvalue->fetch(PDO::FETCH_ASSOC);
         ?>
          <div class="percentage">
            <label><?php echo $namefil ?></label>
            <input class="input" type="number" id="<?php echo $namefil; ?>" value="<?php echo $value["Numberawn"] ?>">
          </div>
        <?php }
        else{ ?>
          <div class="percentage">
            <label><?php echo $namefil ?></label>
            <input class="input" type="number" id="<?php echo $namefil; ?>" value="">
          </div>
    <?php    } ?>

<?php
        if($stringposting === ""){
           $stringposting .= $namefil;
        }
        else{
           $stringposting .= "_".$namefil;
        }
      }
      elseif($type["SortingID"] == 3){ ?>
          <div class="percentage">
            <label><?php echo $namefil ?></label>
            <input type="text" class="input" id="<?php echo $namefil; ?>" value="">
          </div>
<?php
        if($stringposting === ""){
           $stringposting .= $namefil;
        }
        else{
           $stringposting .= "_".$namefil;
        }
      }
      elseif($type["SortingID"] == 4){ ?>
          <div class="percentage">
            <label><?php echo $namefil;"(Not available/available)" ?> </label><br>
            <label style="margin-left:0 !important; .ui-mobile label{display:contents}" class="switch">
              <input type="checkbox" v-model="registration.check" id="<?php echo $namefil; ?>">
              <span class="slider round"></span>
            </label>
          </div>
<?php
        if($stringposting === ""){
           $stringposting .= $namefil;
        }
        else{
           $stringposting .= "_".$namefil;
        }
      }



    $per4++;
  } ?><?php if(isset($_GET["fieldcreate"])){ ?>

    </div>

    <div class="newline">
      <?php if(isset($_SESSION["switch"]) and $_SESSION["switch"] === "on"){ ?>
        <button type="button" onclick="modifyroom('<?php echo $stringposting ?>');" id="sending" class="button"  name="button">modify room</button>
    <?php  }
    else{ ?>
      <button type="button" onclick="createroom('<?php echo $stringposting ?>');" id="sending" class="button"  name="button">Create room</button>

<?php    } ?>
    </div>

  <?php } ?>
<?php }
elseif(isset($_GET["createroom"])){
  if(isset($_GET["modify"])){
    $prep = $dbh->prepare("SET SQL_SAFE_UPDATES = 0;");
    $prep->execute();
    $del = $dbh->prepare("DELETE FROM room_details WHERE RoomID = ".$_SESSION["Roomfilter"]);
    $del->execute();
  }

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
elseif(isset($_GET["showselects"])){
  $arrayinfo = array();
  $getallinfo = $dbh->prepare("SELECT * FROM room_details WHERE RoomID = ".$_GET["showselects"]);
  $getallinfo->execute();
  $_SESSION["Roomfilter"] = $_GET["showselects"];
  while($allinfo = $getallinfo->fetch(PDO::FETCH_ASSOC)){
    array_push($arrayinfo,$allinfo["DetailsID"]);
  }
  ?>
<label>Specifications</label>
  <select id="filter-menu"  placeholder="ja" data-native-menu="false" multiple>
      <?php
      $all = $dbh->prepare("SELECT * FROM details WHERE SortingID != '';");
      $all->execute();

      while($records = $all->fetch(PDO::FETCH_ASSOC)){
        if(in_array($records["DetailsID"],$arrayinfo)){ ?>
          <option selected value="<?php echo $records["fldname"]; ?>"><?php echo $records["fldname"]; ?></option>
        <?php }
        else{ ?>
          <option value="<?php echo $records["fldname"]; ?>"><?php echo $records["fldname"]; ?></option>

        <?php }
        ?>
      <?php }
      ?>
  </select>
<?php }
?>
