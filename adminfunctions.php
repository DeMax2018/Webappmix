
<table>

    <?php
    include"conn.php";
session_start();

if(isset($_GET["filter"]) === true){
  if(isset($_GET["user"])){
    $_SESSION["rightsearch"] = "user";
  }
  if($_SESSION["rightsearch"] === "user"){
    $sth = $dbh->prepare("SELECT * from User WHERE fldName like ? ");
  $sth->bindValue(1, "%".$_GET['filter']."%", PDO::PARAM_STR);
      $sth->execute(); ?>
      <tr class="headcol">
        <th class="accounta">Account</th>
        <?php
        $numright = $dbh->prepare("SELECT * FROM `Right`");
        $numright->execute();
        while($record = $numright->fetch(PDO::FETCH_ASSOC)){ ?>
        <th class="is-hidden-touch"><?php echo $record["fldName"] ?></th>

        <?php
         if($record["RightID"] == 1){
           echo "<th class='is-hidden-desktop'><i class='fas fa-calendar-plus'><i></th>";
         }
         elseif ($record["RightID"] == 2) {
           echo "<th class='is-hidden-desktop'><i class='fas fa-calendar-times'><i></th>";
         }
         elseif ($record["RightID"] == 3) {
           echo "<th class='is-hidden-desktop'><i class='fas fa-edit'><i></th>";
         }
       }; ?>
     </tr><?php
    while($record = $sth->fetch(PDO::FETCH_ASSOC)){ ?>
      <tr class="is-light">
        <td id="names" class="accounta"><?php echo $record["fldName"]." ".$record["fldLastname"] ?></td>
        <?php

        $checkbox = $dbh->prepare("SELECT * FROM PrivateRights WHERE UserID = ".$record["UserID"]);
        $checkbox->execute();

        while ($rows = $checkbox->fetch(PDO::FETCH_ASSOC)) {
          if($rows["Create_events"] == 1){
             echo '<td><input type="checkbox" id="create'.$record["fldName"].' '.$record["fldLastname"].'" data-role="flipswitch" name="'.$record["fldName"].' '.$record["fldLastname"].'" onchange="create_event(this.name,1);" data-on-text="" data-off-text="" data-wrapper-class="custom-label-flipswitch" checked></td>';
          }
          else{
            echo '<td><input type="checkbox" id="create'.$record["fldName"].' '.$record["fldLastname"].'" data-role="flipswitch" name="'.$record["fldName"].' '.$record["fldLastname"].'" onchange="create_event(this.name,1);" data-on-text="" data-off-text="" data-wrapper-class="custom-label-flipswitch"></td>';
          }
          if($rows["Delete_Events"] == 1){
             echo "<td><input  id='delete".$record["fldName"]." ".$record["fldLastname"]."' data-role='flipswitch' name='".$record["fldName"]." ".$record["fldLastname"]."' onchange='create_event(this.name,2);' checked type='checkbox' data-on-text='' data-off-text='' data-wrapper-class='custom-label-flipswitch'></td>";
          }
          else{
            echo "<td><input  id='delete".$record["fldName"]." ".$record["fldLastname"]."' data-role='flipswitch'  name='".$record["fldName"]." ".$record["fldLastname"]."' onchange='create_event(this.name,2);' type='checkbox' data-on-text='' data-off-text='' data-wrapper-class='custom-label-flipswitch'></td>";
          }
          if($rows["Acces_Rights_System"] == 1){
             echo "<td><input  id='right".$record["fldName"]." ".$record["fldLastname"]."' data-role='flipswitch'  name='".$record["fldName"]." ".$record["fldLastname"]."' onchange='create_event(this.name,3);' checked type='checkbox' data-on-text='' data-off-text='' data-wrapper-class='custom-label-flipswitch'></td>";
          }
          else{
            echo "<td><input  id='right".$record["fldName"]." ".$record["fldLastname"]."' data-role='flipswitch'  name='".$record["fldName"]." ".$record["fldLastname"]."' onchange='create_event(this.name,3);' type='checkbox' data-on-text='' data-off-text='' data-wrapper-class='custom-label-flipswitch'></td>";
          }
        }
        ?>
      </tr>


  <?php }  ?>


</table>
<?php  }
else{
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


}
elseif(isset($_GET["createevent"])){

  $box = json_decode(file_get_contents('php://input'), true);
  $user = explode(" ",$box["user"]);
  $getuser = $dbh->prepare("SELECT * FROM User WHERE fldName = ? AND fldLastname = ?");
  $getuser->bindValue(1,$user[1], PDO::PARAM_STR);
  $getuser->bindValue(2,$user[2], PDO::PARAM_STR);
  $getuser->execute();
  $userid = $getuser->fetch(PDO::FETCH_ASSOC);
  $sql = $dbh->prepare("UPDATE privaterights SET Create_event = ? WHERE UserID = ?");
  $sql->bindValue(1,$box["checked"],PDO::PARAM_STR);
  $sql->bindValue(2,$userid["UserID"]);
  $sql->execute();

}
elseif(isset($_GET["addfilterselect"])){ ?>

    <label>type</label>
    <select id="addtofilterid" placeholder="ja" data-native-menu="false">
      <option value="clear"><i class="fas fa-home"></i></option>
        <?php
        $all = $dbh->prepare("SELECT * FROM details WHERE SortingID = 3;");
        $all->execute();
        while($records = $all->fetch(PDO::FETCH_ASSOC)){ ?>
          <option value="<?php echo $records["DetailsID"]; ?>"><?php echo $records["fldname"]; ?></option>
        <?php }
        ?>
    </select>
<?php }
elseif(isset($_GET["deletefilter"])){
  $box = json_decode(file_get_contents('php://input'), true);
  $deleterelations = $dbh->prepare("DELETE FROM room_details WHERE DetailsID = ".$box["id"]);
  $deleterelations->execute();
  $delete = $dbh->prepare("DELETE FROM details WHERE DetailsID = ".$box["id"]);
  $delete->execute();

}
elseif(isset($_GET["modifyfilter"])){
  $box = json_decode(file_get_contents('php://input'), true);
  $update = $dbh->prepare("UPDATE details Set fldname = '".$box["nam"]."' , SortingID = ".$box["t"]." WHERE DetailsID = ".$box["ids"]);
  $update->execute();
}
elseif(isset($_GET["deletebuilding"])){
  $box = json_decode(file_get_contents('php://input'), true);
  $deletebuilding = $dbh->prepare("DELETE FROM building WHERE BuildingID = ".$box["ids"]);
  $deletebuilding->execute();
  $deleteallrooms = $dbh->prepare("DELETE FROM room_details WHERE DetailsID = 5 AND Numberawn = ".$box["ids"]);
  $deleteallrooms->execute();
}
?>
