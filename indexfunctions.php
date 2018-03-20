<?php

include"conn.php";

$count = $dbh->prepare("SELECT count(EventID) FROM Event WHERE Active = 1 and eventname like ? ;");
$count->bindValue(1, "%".$_GET['search']."%", PDO::PARAM_STR);
$count->execute();
$countrows = $count->fetchColumn();
if(isset($_GET["page"])){
  $pag = $_GET["page"] * 10 - 10;
  $sql = $dbh->prepare("SELECT * FROM Event WHERE Active = 1 and eventname like ? LIMIT 10 OFFSET ? ;");
  $sql->bindParam(2,$pag, PDO::PARAM_INT);
}
else{
  $_GET["page"] = 1;
  $sql = $dbh->prepare("SELECT * FROM Event WHERE Active = 1 and eventname like ? LIMIT 10 OFFSET 0 ;");

}

$sql->bindValue(1, "%".$_GET['search']."%", PDO::PARAM_STR);
$sql->execute();
$numie = $sql->RowCount();
$first = true;
while($rows = $sql->fetch(PDO::FETCH_ASSOC)){
  if($first === true){ ?>
    <div class="columns columnsaside"> <!--  Max 2 items -->
      <div class="column is-6">
        <div class="panel">
          <p class="is-marginless">
            <img class="imageindex" src="upload/<?php echo $rows["Mainpicture"] ?>">
          </p>
          <div class="panel-block">
            <div class="columns columnsaside">
              <div class="column">
                <div class="panel-block-item"><?php echo $rows["eventname"]; ?></div>
              </div>
              <div class="column has-text-right">
                <div class="panel-block-item"><?php echo $rows["Sold_Ticket"] ?><i class="fa fa-user"></i></div>
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
        <img class="imageindex" src="upload/<?php echo $rows["Mainpicture"] ?>">
      </p>
      <div class="panel-block">
        <div class="columns columnsaside">
          <div class="column">
            <div class="panel-block-item"><?php echo $rows["eventname"]; ?></div>
          </div>
          <div class="column has-text-right">
            <div class="panel-block-item"><?php echo $rows["Sold_Ticket"] ?> <i class="fa fa-user"></i></div>
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
</div>
<?php
$pages = ceil($countrows / 10);
if($pages == 1){ ?>
  <li>
    <nav class="pagination nobullets" role="navigation" aria-label="pagination">
    <a class="pagination-link is-current" aria-label="Goto page 1">1</a>
  </li>
  </nav>
<?php }
elseif($pages == 2){ ?>
  <nav class="pagination nobullets" role="navigation" aria-label="pagination">
    <a onclick="paging(<?php if($_GET["page"] != $pages){ echo $_GET["page"] + 1;}else{echo "no";} ?>);" class="pagination-next nobullets"><i class="fas fa-angle-right"></i></a>
    <a onclick="paging(<?php if($_GET["page"] != 1){ echo $_GET["page"] - 1;}else{echo "no";} ?>);" class="pagination-previous nobullets"><i class="fas fa-angle-left"></i></a>
    <ul class="pagination-list nobullets">
      <li>
        <?php if($_GET["page"] == 1){ ?>
          <a class="pagination-link is-current" onclick="paging(1);" aria-label="Goto page 45">1</a>
        <?php }else{ ?>
          <a class="pagination-link" onclick="paging(1);" aria-label="Goto page 45">1</a>
        <?php } ?>
      </li>
      <li>
        <?php if($_GET["page"] == 2){ ?>
          <a class="pagination-link is-current" onclick="paging(2);" aria-label="Page 46" aria-current="page">2</a>
        <?php }else{ ?>
          <a class="pagination-link" onclick="paging(2);" aria-label="Page 46" aria-current="page">2</a>
        <?php } ?>
      </li>
    </ul>
  </nav>
<?php }
elseif($pages == 3){  ?>
  <nav class="pagination nobullets" role="navigation" aria-label="pagination">
    <a onclick="paging(<?php if($_GET["page"] != $pages){ echo $_GET["page"] + 1;}else{echo "no";} ?>);" class="pagination-next nobullets"><i class="fas fa-angle-right"></i></a>
    <a onclick="paging(<?php if($_GET["page"] != 1){ echo $_GET["page"] - 1;}else{echo "no";} ?>);" class="pagination-previous nobullets"><i class="fas fa-angle-left"></i></a>
    <ul class="pagination-list nobullets">
      <li>
        <?php if($_GET["page"] == 1){ ?>
          <a class="pagination-link is-current" onclick="paging(1);" aria-label="Goto page 45">1</a>
        <?php }else{ ?>
          <a class="pagination-link" onclick="paging(1);" aria-label="Goto page 45">1</a>
        <?php } ?>

      </li>
      <li>
        <?php if($_GET["page"] == 2){ ?>
          <a class="pagination-link is-current" onclick="paging(2);" aria-label="Page 46" aria-current="page">2</a>
        <?php }else{ ?>
          <a class="pagination-link" onclick="paging(2);" aria-label="Page 46" aria-current="page">2</a>
        <?php } ?>
      </li>
      <li>
        <?php if($_GET["page"] == 3){ ?>
          <a class="pagination-link is-current" onclick="paging(3);" aria-label="Goto page 47">3</a>
        <?php }else{ ?>
          <a class="pagination-link" onclick="paging(3);" aria-label="Goto page 47">3</a>
        <?php } ?>
      </li>
    </ul>
  </nav>

<?php }
elseif($pages > 3 AND $_GET["page"] > 3){  ?>
  <nav class="pagination nobullets" role="navigation" aria-label="pagination">
    <a onclick="paging(<?php if($_GET["page"] != $pages){ echo $_GET["page"] + 1;}else{echo "no";} ?>);" class="pagination-next nobullets"><i class="fas fa-angle-right"></i></a>
    <a onclick="paging(<?php if($_GET["page"] != 1){ echo $_GET["page"] - 1;}else{echo "no";} ?>);" class="pagination-previous nobullets"><i class="fas fa-angle-left"></i></a>
    <ul class="pagination-list nobullets">
      <li>
        <a class="pagination-link" onclick="paging(1);" aria-label="Goto page 1">1</a>
      </li>
      <li>
        <span class="pagination-ellipsis">&hellip;</span>
      </li>
      <li>
        <a class="pagination-link" onclick="paging(<?php echo $_GET["page"] - 1 ?>);" aria-label="Goto page 45"><?php echo $_GET["page"] - 1 ?></a>
      </li>
      <li>
        <a class="pagination-link is-current" onclick="paging(<?php echo $_GET["page"] ?>);" aria-label="Page 46" aria-current="page"><?php echo $_GET["page"] ?></a>
      </li>
      <li>
        <?php
        if(($_GET["page"] + 1) <= $pages ){ ?>
          <a class="pagination-link" onclick="paging(<?php echo $_GET["page"] + 1 ?>);" aria-label="Goto page 47"><?php echo $_GET["page"] + 1 ?></a>

      <?php } ?>
      </li>
      <li>
        <span class="pagination-ellipsis">&hellip;</span>
      </li>
      <li>
        <a class="pagination-link" onclick="paging(<?php echo $pages; ?>);" aria-label="Goto page 86"><?php echo $pages; ?></a>
      </li>
    </ul>
  </nav>
<?php }
elseif($pages > 3 AND $_GET["page"] == 3){
  ?>
  <nav class="pagination nobullets" role="navigation" aria-label="pagination">
    <a onclick="paging(<?php if($_GET["page"] != $pages){ echo $_GET["page"] + 1;}else{echo "no";} ?>);" class="pagination-next nobullets"><i class="fas fa-angle-right"></i></a>
    <a onclick="paging(<?php if($_GET["page"] != 1){ echo $_GET["page"] - 1;}else{echo "no";} ?>);" class="pagination-previous nobullets"><i class="fas fa-angle-left"></i></a>
    <ul class="pagination-list nobullets">
      <li>
        <a class="pagination-link" onclick="paging(1);" aria-label="Goto page 1">1</a>
      </li>
      <li>
        <span class="pagination-ellipsis">&hellip;</span>
      </li>
      <li>
        <a class="pagination-link"  onclick="paging(2);" aria-label="Goto page 45">2</a>
      </li>
      <li>
        <a class="pagination-link is-current"  onclick="paging(3);"  aria-label="Page 46" aria-current="page">3</a>
      </li>
      <li>
        <a class="pagination-link"  onclick="paging(4);"  aria-label="Goto page 47">4</a>
      </li>
      <li>
        <span class="pagination-ellipsis">&hellip;</span>
      </li>
      <li>
        <a class="pagination-link" onclick="paging(<?php echo $pages; ?>);" aria-label="Goto page 86"><?php echo $pages; ?></a>
      </li>
    </ul>
  </nav>
<?php
}
elseif($pages > 3 AND $_GET["page"] == 2){
  ?>
  <nav class="pagination nobullets" role="navigation" aria-label="pagination">
    <a onclick="paging(<?php if($_GET["page"] != $pages){ echo $_GET["page"] + 1;}else{echo "no";} ?>);" class="pagination-next nobullets"><i class="fas fa-angle-right"></i></a>
    <a onclick="paging(<?php if($_GET["page"] != 1){ echo $_GET["page"] - 1;}else{echo "no";} ?>);" class="pagination-previous nobullets"><i class="fas fa-angle-left"></i></a>
    <ul class="pagination-list nobullets">
      <li>
        <a class="pagination-link" onclick="paging(1);" aria-label="Goto page 1">1</a>
      </li>
      <li>
        <span class="pagination-ellipsis">&hellip;</span>
      </li>
      <li>
        <a class="pagination-link" onclick="paging(1);" aria-label="Goto page 45">1</a>
      </li>
      <li>
        <a class="pagination-link is-current" onclick="paging(2);" aria-label="Page 46" aria-current="page">2</a>
      </li>
      <li>
        <a class="pagination-link" onclick="paging(3);" aria-label="Goto page 47">3</a>
      </li>
      <li>
        <span class="pagination-ellipsis">&hellip;</span>
      </li>
      <li>
        <a class="pagination-link" onclick="paging(<?php echo $pages; ?>);" aria-label="Goto page 86"><?php echo $pages; ?></a>
      </li>
    </ul>
  </nav>
<?php
}
elseif($pages > 3 AND $_GET["page"] == 1){
  ?>
  <nav class="pagination nobullets" role="navigation" aria-label="pagination">
    <a onclick="paging(<?php if($_GET["page"] != $pages){ echo $_GET["page"] + 1;}else{echo "no";} ?>);" class="pagination-next nobullets"><i class="fas fa-angle-right"></i></a>
    <a onclick="paging(<?php if($_GET["page"] != 1){ echo $_GET["page"] - 1;}else{echo "no";} ?>);" class="pagination-previous nobullets"><i class="fas fa-angle-left"></i></a>
    <ul class="pagination-list nobullets">
      <li>
        <a class="pagination-link" onclick="paging(1);" aria-label="Goto page 1">1</a>
      </li>
      <li>
        <span class="pagination-ellipsis">&hellip;</span>
      </li>
      <li>
        <a class="pagination-link is-current" onclick="paging(1);" aria-label="Goto page 45">1</a>
      </li>
      <li>
        <a class="pagination-link" onclick="paging(2);" aria-label="Page 46" aria-current="page">2</a>
      </li>
      <li>
        <a class="pagination-link" onclick="paging(3);" aria-label="Goto page 47">3</a>
      </li>
      <li>
        <span class="pagination-ellipsis">&hellip;</span>
      </li>
      <li>
        <a class="pagination-link" onclick="paging(<?php echo $pages; ?>);" aria-label="Goto page 86"><?php echo $pages; ?></a>
      </li>
    </ul>
  </nav>
<?php
}

?>
