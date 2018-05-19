<?php
include"conn.php";
error_reporting(0);
session_start();
if($_GET["switch"] === "false" and !isset($_GET["right"])){
  $_SESSION["switch"] = "off";
  ?>
  <div class="flexing" style="justify-content:center;">
    <div  onchange="" class="percentage">
      <label>Specifications</label>
      <select id="filter-menu"  placeholder="ja" data-native-menu="false" multiple>
          <?php
          $all = $dbh->prepare("SELECT * FROM details WHERE SortingID != '';");
          $all->execute();
          while($records = $all->fetch(PDO::FETCH_ASSOC)){ ?>
            <option value="<?php echo $records["fldname"]; ?>"><?php echo $records["fldname"]; ?></option>
          <?php }
          ?>
      </select>
    </div>


  </div><button type="button" onclick="addfielts();" name="button">generate fields</button>
  <div id="filterresults" class="flexing" style="display: block;">

  </div>
<?php }
elseif($_GET["switch"] === "true" and !isset($_GET["right"])){
    $_SESSION["switch"] = "on";
  ?>
  <div class="flexing" style="justify-content:center;">
    <div  onchange="" class="percentage">
      <label>Modify a room</label>
      <select id="room-menu" onchange="showselect()" placeholder="ja" data-native-menu="false" >
        <option value="clear"><i class="fas fa-home"></i></option>
          <?php
          $all = $dbh->prepare("SELECT * FROM room_details WHERE DetailsID = 4 GROUP BY RoomID;");
          $all->execute();
          while($records = $all->fetch(PDO::FETCH_ASSOC)){ ?>
            <option value="<?php echo $records["RoomID"]; ?>"><?php echo $records["Textawn"]; ?></option>
          <?php }
          ?>
      </select>
      <div id="loadfilters">

      </div>
    </div>


  </div><button type="button" onclick="addfielts();" name="button">Show Specifications</button>
  <div id="filterresults" class="flexing" style="display: block;">

  </div>
<?php }
elseif(isset($_GET["right"])){ ?> <table>
  <?php
  $_SESSION["rightsearch"] = "group";
  $sth = $dbh->prepare("SELECT * from User WHERE fldName like ? ");
$sth->bindValue(1, "%".$_GET['filter']."%", PDO::PARAM_STR);
    $sth->execute(); ?>
    <tr class="headcol">
      <th class="accounta">Account</th>
      <?php
      $numright = $dbh->prepare("SELECT * FROM `group`");
      $numright->execute();
      while($record = $numright->fetch(PDO::FETCH_ASSOC)){ ?>
      <th class="is-hidden-touch"><?php echo $record["fldName"] ?></th>

      <?php
       if($record["GroupID"] == 1){
         echo "<th class='is-hidden-desktop'><img src='images/teacher.png'style='width: 1.5em;height: 1.5em;' alt=''></th>";
       }
       elseif ($record["GroupID"] == 3) {
         echo "<th class='is-hidden-desktop'><img src='images/admin.png'style='width: 1.5em;height: 1.5em;' alt=''></th>";
       }
       elseif ($record["GroupID"] == 4) {
         echo "<th class='is-hidden-desktop'><img src='images/user.png'style='width: 1.5em;height: 1.5em;' alt=''></th>";
       }
     }; ?>
   </tr><?php
  while($record = $sth->fetch(PDO::FETCH_ASSOC)){ ?>
    <tr class="is-light">
      <td id="names" class="accounta"><?php echo $record["fldName"]." ".$record["fldLastname"] ?></td>
      <?php

      $checkbox = $dbh->prepare("SELECT * FROM user_group WHERE UserID = ".$record["UserID"]);
      $checkbox->execute();

      while ($rows = $checkbox->fetch(PDO::FETCH_ASSOC)) {
        if($rows["cifpcm"] == 1){
           echo '<td><input type="checkbox" id="cifpcm'.$record["fldName"].' '.$record["fldLastname"].'" data-role="flipswitch" name="'.$record["fldName"].' '.$record["fldLastname"].'" onchange="group(this.name,1);" data-on-text="" data-off-text="" data-wrapper-class="custom-label-flipswitch" checked></td>';
        }
        else{
          echo '<td><input type="checkbox" id="cifpcm'.$record["fldName"].' '.$record["fldLastname"].'" data-role="flipswitch" name="'.$record["fldName"].' '.$record["fldLastname"].'" onchange="group(this.name,1);" data-on-text="" data-off-text="" data-wrapper-class="custom-label-flipswitch"></td>';
        }
        if($rows["admin"] == 1){
           echo "<td><input  id='admin".$record["fldName"]." ".$record["fldLastname"]."' data-role='flipswitch' name='".$record["fldName"]." ".$record["fldLastname"]."' onchange='group(this.name,2);' checked type='checkbox' data-on-text='' data-off-text='' data-wrapper-class='custom-label-flipswitch'></td>";
        }
        else{
          echo "<td><input  id='admin".$record["fldName"]." ".$record["fldLastname"]."' data-role='flipswitch'  name='".$record["fldName"]." ".$record["fldLastname"]."' onchange='group(this.name,2);' type='checkbox' data-on-text='' data-off-text='' data-wrapper-class='custom-label-flipswitch'></td>";
        }
        if($rows["user"] == 1){
           echo "<td><input  id='user".$record["fldName"]." ".$record["fldLastname"]."' data-role='flipswitch'  name='".$record["fldName"]." ".$record["fldLastname"]."' onchange='group(this.name,3);' checked type='checkbox' data-on-text='' data-off-text='' data-wrapper-class='custom-label-flipswitch'></td>";
        }
        else{
          echo "<td><input  id='user".$record["fldName"]." ".$record["fldLastname"]."' data-role='flipswitch'  name='".$record["fldName"]." ".$record["fldLastname"]."' onchange='group(this.name,3);' type='checkbox' data-on-text='' data-off-text='' data-wrapper-class='custom-label-flipswitch'></td>";
        }
      }
      ?>
    </tr>


<?php }  ?>


</table> <?php
}




?>
