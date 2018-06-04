
<?php
include"conn.php";
include "dbclasses.php";
session_start();

$_SESSION["ids"] = array();
?>


<?php
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
$_SESSION["overview"] = $_GET["get"];
  $start = 0;
  $check = true;
  $per4 = -1;
  //filterloading.php?createroom=true&postrequest=true
  ?>
  <form action="addroom.php" method="post"data-ajax="false" enctype="multipart/form-data">
  <div class="fullsize">
    <?php

  foreach($user as &$namefil){

    $namefil = str_replace("^"," ",$namefil);


      $gettype = $dbh->prepare("SELECT * FROM details WHERE fldname = '".$namefil."'");
      $gettype->execute();
      $type = $gettype->fetch(PDO::FETCH_ASSOC);
      if($per4 == 3){ ?>
      </div>
      <div class="fullsize">
<?php
        if($stringposting === ""){
           $stringposting .= $namefil;
        }
        else{
           $stringposting .= "_".$namefil;
        }
        $per4 = 0;
      }
      if($type["DetailsID"] == 10){

          ?>
        <div class="percentage">
          <label>image</label>
          <input type="file" id="imageupload" name="imageupload" value="">
        </div>
      <?php
      if($stringposting === ""){
         $stringposting .= "imageupload";
      }
      else{
         $stringposting .= "_"."imageupload";
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
            <input class="input" type="text" id="<?php echo $namefil; ?>" name="<?php echo $namefil; ?>" value="<?php echo $value["Textawn"]?>">
            <?php
          }
          else{ ?>
            <input class="input" type="text" id="<?php echo $namefil; ?>" name="<?php echo $namefil; ?>"value="">
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
      elseif($type["SortingID"] == 3){
      $insertexistinginfo = 0;
      if(isset($_SESSION["Roomfilter"]) and $_SESSION["Roomfilter"] != "givenewvarplease"){
      $getvalue = $dbh->prepare("SELECT Textawn FROM room_details WHERE DetailsID = ".$type["DetailsID"]." AND RoomID = ".$_SESSION["Roomfilter"]);
      $getvalue->execute();
      $value = $getvalue->fetch(PDO::FETCH_ASSOC);
      $insertexistinginfo = 1;
    }?>
        <div class="percentage" style="width:100%; text-align:left;">
          <label for=""><?php echo $namefil; ?></label>
          <div class="styled-select slate" style="width:100%; height:70%;border:none;">
        <select id="<?php echo $namefil; ?>-menu"name="<?php echo $namefil; ?>" style="width: 100%;height: 70% !important;"  placeholder="ja" class="selectpicker"  data-native-menu="false" >
            <option value="<?php echo $namefil; ?>" disabled><?php echo $namefil; ?></option>
            <option value="all">all</option>
            <?php
              $getoptions = $dbh->prepare("SELECT * FROM details WHERE listoption = ".$type["DetailsID"]);
              $getoptions->execute();
              while($options = $getoptions->fetch(PDO::FETCH_ASSOC)){
                if($insertexistinginfo == 1){
                  if($value["Textawn"] === $options["fldname"]){ ?>
                    <option selected value="<?php echo $options["fldname"] ?>"><?php echo $options["fldname"] ?></option>
                <?php  }
                else{ ?>
                  <option value="<?php echo $options["fldname"] ?>"><?php echo $options["fldname"] ?></option>

              <?php   }
                }
                else{
                ?>
                <option value="<?php echo $options["fldname"] ?>"><?php echo $options["fldname"] ?></option>
      <?php
              }}
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
      elseif($type["SortingID"] == 4){
        if(isset($_SESSION["Roomfilter"]) and $_SESSION["Roomfilter"] != "givenewvarplease"){
        $getvalue = $dbh->prepare("SELECT Boolawn FROM room_details WHERE DetailsID = ".$type["DetailsID"]." AND RoomID = ".$_SESSION["Roomfilter"]);
        $getvalue->execute();
        $value = $getvalue->fetch(PDO::FETCH_ASSOC);
      }?>
          <div class="percentage">
            <label><?php echo $namefil;"(Not available/available)" ?> </label><br>

            <?php
            if(isset($value["Boolawn"])){
            switch ($value["Boolawn"]) {
              case 1: ?>
                <input checked type="checkbox" data-role='flipswitch' data-on-text='' data-off-text='' data-wrapper-class='custom-label-flipswitch'name="<?php echo $namefil; ?>" v-model="registration.check" id="<?php echo $namefil; ?>">
                <?php break;
                case 0: ?>
                  <input type="checkbox"  data-role='flipswitch' data-on-text='' data-off-text='' data-wrapper-class='custom-label-flipswitch'name="<?php echo $namefil; ?>" v-model="registration.check" id="<?php echo $namefil; ?>">
                <?php  break;
              default:
                # code...
                break;
            }
          }
          else{ ?>
            <input type="checkbox" data-role='flipswitch' data-on-text='' data-off-text='' data-wrapper-class='custom-label-flipswitch'name="<?php echo $namefil; ?>" v-model="registration.check" id="<?php echo $namefil; ?>">
        <?php    }
            ?>
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
    $_SESSION["stringposting"] = $stringposting;
  } ?><?php
  if(isset($_GET["reloadpage"])){ ?>
    </div>

    <div class="newline">
      <?php if(isset($_SESSION["switch"]) and $_SESSION["switch"] === "on"){
        $_SESSION["postroom"] = $stringposting; ?>
        <input type="submit"  id="sending" class="button" value="modify room" name="button">
    <?php  }
    else{
      $_SESSION["postroom"] = $stringposting;?>
      <input type="submit" id="sending" class="button" value="modify room"  name="button">

<?php    } ?>
    </div>

  <?php }
  elseif(isset($_GET["fieldcreate"])){ ?>

    </div>

    <div class="newline">
      <?php if(isset($_SESSION["switch"]) and $_SESSION["switch"] === "on"){
        ?>
        <input type="submit" class="button"  name="button"value="modify room">
    <?php  }
    else{ ?>
      <input type="submit"   class="button"  name="button" value="Create room">

<?php
//onclick="createroom('echo $stringposting');"
} ?>
    </form>
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
    $del = $dbh->prepare("DELETE FROM room_details WHERE RoomID = ".$_SESSION["Roomfilter"]." AND DetailsID != 10");
    $del->execute();
    $del = $dbh->prepare("DELETE FROM room WHERE RoomID = ".$_SESSION["Roomfilter"]);
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
      $insert = $dbh->prepare("INSERT INTO room_details (Textawn,RoomID,DetailsID) VALUES (1,".$roomnumber["RoomID"].",".$resultcheck["DetailsID"].")");
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
  if($box["def"] == 1){
    $getdetail = $dbh->prepare("SELECT * FROM details WHERE fldname = '".$box["name"]."'");
    $getdetail->execute();
    $detail = $getdetail->fetch(PDO::FETCH_ASSOC);
    $getallid = $dbh->prepare("SELECT RoomID FROM room_details group by RoomID");
    $getallid->execute();
    while($allid = $getallid->fetch(PDO::FETCH_ASSOC)){
      $insertimplementation = $dbh->prepare("INSERT INTO room_details (RoomID,Boolawn,DetailsID) VALUES (".$allid["RoomID"].",1,".$detail["DetailsID"].")");
      $insertimplementation->execute();
    }
  }
}
elseif(isset($_GET["addbuilding"])){
  $box = json_decode(file_get_contents('php://input'), true);
  $sql = $dbh->prepare("INSERT INTO building (fldName) VALUES ('".$box["name"]."')");
  $sql2 = $dbh->prepare("INSERT INTO details (fldName,listoption) VALUES ('".$box["name"]."',5)");
  $sql->execute();
  $sql2->execute();
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
  <a href=""><i onclick="deleteroom();"class="fas fa-trash-alt" style="width:3em;height:6em;position: absolute;
margin-top: -5em;
margin-left: 19em;"></i></a>

<?php }
?>
