<?php

include"conn.php";


$sql = $dbh->prepare("SELECT * FROM Event WHERE Active = 1 and eventname like ? ;");
$sql->bindValue(1, "%".$_GET['search']."%", PDO::PARAM_STR);

$sql->execute();
$first = true;
while($rows = $sql->fetch(PDO::FETCH_ASSOC)){
  if($first === true){ ?>
    <div class="columns columnsaside"> <!--  Max 2 items -->
      <div class="column is-6">
        <div class="panel">
          <p class="is-marginless">
            <img src="https://placehold.it/600x300">
          </p>
          <div class="panel-block">
            <div class="columns columnsaside">
              <div class="column">
                <div class="panel-block-item"><?php echo $rows["eventname"]; ?></div>
              </div>
              <div class="column has-text-right">
                <div class="panel-block-item"><?php echo $rows["date_event"] ?><i class="fa fa-user"></i></div>
                <div class="panel-block-item"><?php echo $rows["date_event"] ?><i class="fa fa-calendar"></i></div>
              </div>
            </div>
          </div>
        </div>
      </div>



<?php  $first = false; }
else{ ?>
  <div class="column is-6">
    <div class="panel">
      <p class="is-marginless">
        <img src="https://placehold.it/600x300">
      </p>
      <div class="panel-block">
        <div class="columns columnsaside">
          <div class="column">
            <div class="panel-block-item"><?php echo $rows["eventname"]; ?></div>
          </div>
          <div class="column has-text-right">
            <div class="panel-block-item"><?php echo $rows["date_event"] ?> <i class="fa fa-user"></i></div>
            <div class="panel-block-item"><?php echo $rows["date_event"] ?> <i class="fa fa-calendar"></i></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php  $first = true; }
 }
?>
