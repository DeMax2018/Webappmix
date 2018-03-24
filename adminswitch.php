
<?php
include"conn.php";
session_start();
if($_GET["switch"] === "true"){

}
else{ ?>
  <div class="flexing" style="justify-content:center;">
    <div  onchange="" class="percentage">
      <label>Objects available in the room</label>
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




?>
