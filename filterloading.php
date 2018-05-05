
<?php
include"conn.php";
include "dbclasses.php";
session_start();

$_SESSION["ids"] = array();
if(isset($_GET["reloadpage"])){ ?>
  <form action="filterloading.php?createroom=true&postrequest=true" method="post"data-ajax="false" enctype="multipart/form-data">


<?php }
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
      if($type["DetailsID"] == 10){

          ?>
        <div class="percentage">
          <label>image</label>
          <input type="file" id="imageupload" name="imageupload" value="">
        </div>
      <?php
      if($stringposting === ""){
         $stringposting .= $namefil;
      }
      else{
         $stringposting .= "_".$namefil;
      }
     }
      elseif($type["SortingID"] == 1){ ?>
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
            <input class="input" type="number" name="<?php echo $namefil; ?>" id="<?php echo $namefil; ?>" value="<?php echo $value["Numberawn"] ?>">
          </div>
        <?php }
        else{ ?>
          <div class="percentage">
            <label><?php echo $namefil ?></label>
            <input class="input" type="number" name="<?php echo $namefil; ?>" id="<?php echo $namefil; ?>" value="">
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
        <div class="percentage" style="width:100%; text-align:left;">
          <label for=""><?php echo $namefil; ?></label>
          <div class="styled-select slate">
        <select id="<?php echo $namefil; ?>-menu"  placeholder="ja" class="selectpicker"  data-native-menu="false" >
            <option value="<?php echo $namefil; ?>" disabled><?php echo $namefil; ?></option>
            <option value="all">all</option>
            <?php
              $getoptions = $dbh->prepare("SELECT * FROM details WHERE listoption = ".$type["DetailsID"]);
              $getoptions->execute();
              while($options = $getoptions->fetch(PDO::FETCH_ASSOC)){ ?>
                <option value="<?php echo $options["fldname"] ?>"><?php echo $options["fldname"] ?></option>
      <?php
              }
            ?>
          </select>
        </div>
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
  } ?><?php
  if(isset($_GET["reloadpage"])){ ?>
    </div>

    <div class="newline">
      <?php if(isset($_SESSION["switch"]) and $_SESSION["switch"] === "on"){
        $_SESSION["postroom"] = $stringposting; ?>
        <button type="submit"  id="sending" class="button" value="<?php echo $stringposting ?>" name="button">modify room</button>
    <?php  }
    else{
      $_SESSION["postroom"] = $stringposting;?>
      <button type="submit" id="sending" class="button" value="<?php echo $stringposting ?>"  name="button">Create room</button>

<?php    } ?>
    </div>

  <?php }
  elseif(isset($_GET["fieldcreate"])){ ?>

    </div>

    <div class="newline">
      <?php if(isset($_SESSION["switch"]) and $_SESSION["switch"] === "on"){
        ?>
        <button type="button" onclick="modifyroom('<?php echo $stringposting ?>');" id="sending" class="button"  name="button">modify room</button>
    <?php  }
    else{ ?>
      <button type="button" onclick="createroom('<?php echo $stringposting ?>');" id="sending" class="button"  name="button">Create room</button>

<?php    } ?>
    </div>

  <?php } ?>
<?php }
elseif(isset($_GET["postrequest"])){
  if(isset($_GET["modify"])){
    $prep = $dbh->prepare("SET SQL_SAFE_UPDATES = 0;");
    $prep->execute();
    $del = $dbh->prepare("DELETE FROM room_details WHERE RoomID = ".$_SESSION["Roomfilter"]);
    $del->execute();
  }
  $valuespost = explode("_",$_SESSION["postroom"]);
  $preroom = $dbh->prepare("INSERT INTO room () VALUES ()");
  $preroom->execute();
  $getroom = $dbh->prepare("SELECT * FROM room order by RoomID desc limit 1");
  $getroom->execute();
  $roomnumber = $getroom->fetch(PDO::FETCH_ASSOC);
  foreach($valuespost as &$value){
    if($value === "image"){
      $image = new classes();
      $name = $image->uploadimage();
      $insertnameimage = $dbh->prepare("INSERT INTO room_details (Textawn,RoomID,DetailsID) VALUES ('".$name."',".$roomnumber["RoomID"].",10)");
      $insertnameimage->execute();

    }
    else{

      $check = $dbh->prepare("SELECT * FROM details WHERE fldname = '".$value."'");
      $check->execute();
      $resultcheck = $check->fetch(PDO::FETCH_ASSOC);
      if($resultcheck["SortingID"] == 1){

        $insert = $dbh->prepare("INSERT INTO room_details (Textawn,RoomID,DetailsID) VALUES ('".$_POST[$value]."',".$roomnumber["RoomID"].",".$resultcheck["DetailsID"].")");
        $insert->execute();
      }
      if($resultcheck["SortingID"] == 2){
          $insert = $dbh->prepare("INSERT INTO room_details (Numberawn,RoomID,DetailsID) VALUES (".$_POST[$value].",".$roomnumber["RoomID"].",".$resultcheck["DetailsID"].")");
        $insert->execute();
      }
      if($resultcheck["SortingID"] == 3){
        $insert = $dbh->prepare("INSERT INTO room_details (Boolawn,RoomID,DetailsID) VALUES (1,".$roomnumber["RoomID"].",".$resultcheck["DetailsID"].")");
        $insert->execute();
      }
      if($resultcheck["SortingID"] == 4){
        if(isset($_POST[$value])){
          $insert = $dbh->prepare("INSERT INTO room_details (Boolawn,RoomID,DetailsID) VALUES (1,".$roomnumber["RoomID"].",".$resultcheck["DetailsID"].")");
        }
        else{
          $insert = $dbh->prepare("INSERT INTO room_details (Boolawn,RoomID,DetailsID) VALUES (0,".$roomnumber["RoomID"].",".$resultcheck["DetailsID"].")");
        }
        $insert->execute();
      }
    }
  }
}
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
    elseif($resultcheck["SortingID"] == 2){
      $insert = $dbh->prepare("INSERT INTO room_details (Numberawn,RoomID,DetailsID) VALUES (".$solo[1].",".$roomnumber["RoomID"].",".$resultcheck["DetailsID"].")");
      $insert->execute();
    }
    elseif($resultcheck["SortingID"] == 3){
      $insert = $dbh->prepare("INSERT INTO room_details (Boolawn,RoomID,DetailsID) VALUES (1,".$roomnumber["RoomID"].",".$resultcheck["DetailsID"].")");
      $insert->execute();
    }
    elseif($resultcheck["SortingID"] == 4){
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
