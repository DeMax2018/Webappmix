<?php
include "conn.php";

?>

<div style="display:block;" class="mainresults">
  <?php if(isset($_GET["page"])){
    $pag = $_GET["page"] * 10 - 10;
    $sql = $dbh->prepare("SELECT * FROM room;");
    $sql->bindParam(2,$pag, PDO::PARAM_INT);
  }
  else{
    $_GET["page"] = 1;
    $sql = $dbh->prepare("SELECT * FROM room;");

  }

  $sql->bindValue(1, "%''%", PDO::PARAM_STR);
  $sql->execute();

  $numie = $sql->RowCount();
  $first = true;
  while($rows = $sql->fetch(PDO::FETCH_ASSOC)){
    $buildingname = $dbh->prepare("SELECT * FROM building WHERE BuildingID = ".$rows["BuildingID"]);
    $buildingname->execute();
    $building = $buildingname->fetch(PDO::FETCH_ASSOC);

    if($first === true){ ?>
      <div class="columns columnsaside"> <!--  Max 2 items -->
        <div class="column is-6">
          <div id="show" onclick="show();" class="panel">
            <p class="is-marginless">
              <img src="https://placehold.it/600x300">
            </p>
            <div class="panel-block">
              <div class="columns columnsaside">
                <div class="column">
                  <div class="panel-block-item"><?php echo $rows["fldName"]; ?></div>
                </div>
                <div class="column has-text-right">
                  <div class="panel-block-item"><?php echo $building["fldName"] ?><i class="fa fa-user"></i></div>
                  <div class="panel-block-item"><?php echo $rows["RoomID"] ?><i class="fa fa-calendar"></i></div>
                  <button type="button" id="show" onclick="show();" class="button" name="button">Info</button>
                </div>
              </div>
            </div>
          </div>
        </div>



  <?php  $first = false; }
  else{ ?>
    <div class="column is-6">
      <div id="show" onclick="show();" class="panel">
        <p class="is-marginless">
          <a onclick="show();"><img src="https://placehold.it/600x300"></a>
        </p>
        <div class="panel-block">
          <div class="columns columnsaside">
            <div class="column">
              <div class="panel-block-item"><?php echo $rows["fldName"]; ?></div>
            </div>
            <div class="column has-text-right">
              <div class="panel-block-item"><?php echo $building["fldName"] ?> <i class="fa fa-user"></i></div>
              <div class="panel-block-item"><?php echo $rows["RoomID"] ?> <i class="fa fa-calendar"></i></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php  $first = true; }
   }
  ?>
  </div>
</div>
