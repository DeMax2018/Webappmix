<?php
include"conn.php";
session_start();
if($_GET["switch"] === "false"){
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
else{
    $_SESSION["switch"] = "on";
  ?>
  <div class="flexing" style="justify-content:center;">
    <div  onchange="" class="percentage">
      <label>Modify a room</label>
      <select id="room-menu" onchange="showselect()" placeholder="ja" data-native-menu="false" >
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




?>
