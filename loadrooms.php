<?php
include "conn.php";
include"dbclasses.php";
session_start();
error_reporting(0);
if(isset($_GET["starttime"])){
  $_SESSION["starttime"] = $_GET["starttime"];
  $_SESSION["endtime"] = $_GET["endtime"];
}
if(isset($_GET["variables"])){
  $ids = "WHERE Room_DetailsID is not null ";
  $filter = explode("_",$_GET["variables"]);
  foreach($filter as &$filterres){
    $type = "";
    $value = "";
    $all = explode("-",$filterres);
    $type = $all[0];
    $value = $all[1];
    $resultsrooms = 0;
    $checkfortype = $dbh->prepare("SELECT SortingID, DetailsID FROM details WHERE fldname = '".$type."'");

    $checkfortype->execute();

    $suffix = "";
    $checktype = $checkfortype->fetch(PDO::FETCH_ASSOC);
    $selection = $dbh->prepare("SELECT * FROM room_details ".$ids);

    $selection->execute();

    $ids = array();
    while($selec = $selection->fetch(PDO::FETCH_ASSOC)){
      if(empty($ids)){
        array_push($ids,$selec["Room_DetailsID"]);

        $resultsrooms = 1;
      }
      else{
        array_push($ids,$selec["Room_DetailsID"]);
      }
    }
    $idsen = "";
    foreach($ids as &$number){
        if($idsen === ""){
          $idsen = "(".$number;
        }
        else{
          $idsen .= ",".$number;
        }
    }
    $idsen .= ")";

    if($resultsrooms == 1){

      switch ($checktype["SortingID"]) {
        case 1:
          $suffix = " AND Textawn like '%".$value."%' and DetailsID = ".$checktype["DetailsID"];

          break;
        case 2:
          $suffix = " AND Numberawn >= ".$value." and DetailsID = ".$checktype["DetailsID"];
          break;
        case 3:
          if($value === "all"){

          }
          else{
            $suffix = " AND Textawn = '".$value."' and DetailsID = ".$checktype["DetailsID"];
          }

          break;
        case 4:
          if($value === "true"){
            $suffix = " AND Boolawn = 1 and DetailsID = ".$checktype["DetailsID"];

          }
          else{
          }
          break;
      }
    }
    $newids = $dbh->prepare("SELECT * FROM room_details WHERE Room_DetailsID in ".$idsen.$suffix." GROUP BY RoomID");
    $newids->execute();
//$newids->debugDumpParams();


    $firstoverwrite = 1;
    while($nids = $newids->fetch(PDO::FETCH_ASSOC)){

      if($firstoverwrite == 1){
        $allids = $nids["RoomID"];
        $ids = "WHERE (RoomID = ".$nids["RoomID"];
        $firstoverwrite = 0;
      }
      else{
        $allids .= ",".$nids["RoomID"];
        $ids .= " OR RoomID = ".$nids["RoomID"];
      }
    }
    if($firstoverwrite == 1){
      $ids = "WHERE (Room_DetailsID = 0";
    }
    $ids .= ")";
  }
  echo $ids;
  //echo $allids;
  $fixtime = new classes();
  $_SESSION["starttime"] = str_replace("*"," ",$_SESSION["starttime"]);
  $_SESSION["endtime"] = str_replace("*"," ",$_SESSION["endtime"]);
  $newids = $dbh->prepare("SELECT * FROM real_tenerife.roomhours WHERE fldDate = '".$_SESSION["date"]."' and ((".$fixtime->convertime($_SESSION["starttime"])." >= real_tenerife.converting(fldStartTime) and ".$fixtime->convertime($_SESSION["endtime"])." <= real_tenerife.converting(fldEndTime)) or (".$fixtime->convertime($_SESSION["endtime"])." >= real_tenerife.converting(fldStartTime) and ".$fixtime->convertime($_SESSION["starttime"])." <= real_tenerife.converting(fldEndTime))) group by RoomID; ");
  $newids->execute();
  //$newids->debugDumpParams();
  $ids .= " AND RoomID not in (";
  $thereisarecord = 0;
  $startaddtoids = 0;
  while($newidsfetch = $newids->fetch(PDO::FETCH_ASSOC)){
    if($startaddtoids === 0){
      $ids .= $newidsfetch["RoomID"];
      $startaddtoids++;
      $thereisarecord = 1;
    }
    else{
      $ids .= ",".$newidsfetch["RoomID"];
    }
  }
  if($thereisarecord == 1){
    $ids .= ")";
  }
  else{
    $ids .= "0)";
  }
}
else{
  $fixtime = new classes();
  $_SESSION["starttime"] = str_replace("*"," ",$_SESSION["starttime"]);
  $_SESSION["endtime"] = str_replace("*"," ",$_SESSION["endtime"]);
  $newids = $dbh->prepare("SELECT * FROM real_tenerife.roomhours WHERE fldDate = '".$_SESSION["date"]."' and ((".$fixtime->convertime($_SESSION["starttime"])." >= real_tenerife.converting(fldStartTime) and ".$fixtime->convertime($_SESSION["endtime"])." <= real_tenerife.converting(fldEndTime)) or (".$fixtime->convertime($_SESSION["endtime"])." >= real_tenerife.converting(fldStartTime) and ".$fixtime->convertime($_SESSION["starttime"])." <= real_tenerife.converting(fldEndTime))) group by RoomID; ");
  $newids->execute();
  $ids .= " WHERE RoomID not in (";
  $thereisarecord = 0;
  $startaddtoids = 0;
  while($newidsfetch = $newids->fetch(PDO::FETCH_ASSOC)){
    if($startaddtoids === 0){
      $ids .= $newidsfetch["RoomID"];
      $startaddtoids++;
      $thereisarecord = 1;
    }
    else{
      $ids .= ",".$newidsfetch["RoomID"];
    }
  }
  if($thereisarecord == 1){
    $ids .= ")";
  }
  else{
    $ids .= "0)";
  }
}
?>

<div style="display:block;" class="mainresults">
  <?php if(isset($_GET["page"])){
    $pag = $_GET["page"] * 6 - 6;
    $sql = $dbh->prepare("SELECT * FROM room ".$ids." LIMIT 6 OFFSET ".$pag);
    $sql->bindParam(2,$pag, PDO::PARAM_INT);
    $count = $dbh->prepare("SELECT count(RoomID) FROM room ".$ids);
    $count->execute();
    $numie = $count->fetchColumn();
  }
  else{
    $_GET["page"] = 1;
    $sql = $dbh->prepare("SELECT * FROM room ".$ids." LIMIT 6");
    $count = $dbh->prepare("SELECT count(RoomID) FROM room ".$ids);
    $count->execute();
    $numie = $count->fetchColumn();
  }

  $sql->bindValue(1, "%''%", PDO::PARAM_STR);
  $sql->debugDumpParams();
  $sql->execute();
  $first = true;
  while($rows = $sql->fetch(PDO::FETCH_ASSOC)){
    $getname = $dbh->prepare("SELECT * FROM room_details WHERE DetailsID = 4 and RoomID = ".$rows["RoomID"]);
    $getname->execute();
    $nameroom = $getname->fetch(PDO::FETCH_ASSOC);
    $getimage = $dbh->prepare("SELECT * FROM room_details WHERE DetailsID = 10 and RoomID = ".$rows["RoomID"]);
    $getimage->execute();
    $mainpic = $getimage->fetch(PDO::FETCH_ASSOC);
    if($mainpic["Textawn"] === ""){
      $mainpic["Textawn"] = "https://placehold.it/600x300";
    }
    elseif($mainpic["Textawn"] != ""){

    }
    else{
      $mainpic["Textawn"] = "https://placehold.it/600x300";
    }
  /*  $buildingname = $dbh->prepare("SELECT * FROM building WHERE BuildingID = ".$rows["BuildingID"]);
    $buildingname->execute();
    $building = $buildingname->fetch(PDO::FETCH_ASSOC);*/

    if($first === true){ ?>
      <div class="columns columnsaside"> <!--  Max 2 items -->
        <div class="column is-6">
          <div id="show" onclick="show();" style="height:100% !important"  class="panel">
            <p class="is-marginless" style="height:15em;">
              <img src="<?php echo "upload/".$mainpic["Textawn"]; ?>"style="height:100%;width:100%;">
            </p>
            <div class="panel-block">
              <div class="columns columnsaside">
                <div class="column">
                  <div class="panel-block-item"><?php echo $nameroom["Textawn"]; ?></div>
                </div>
                <div class="column has-text-right">
                  <div class="panel-block-item"><?php echo 1 ?><i class="fa fa-user"></i></div>
                  <div class="panel-block-item"><?php echo $rows["RoomID"] ?><i class="fa fa-calendar"></i></div>

                </div>
              </div>
            <button type="button" id="show" style="width:100%" onclick="loadfunctionsshow(<?php echo $rows["RoomID"] ?>);" class="button" name="button">Info</button></div>
          </div>
        </div>



  <?php  $first = false; }
  else{ ?>
    <div class="column is-6">
      <div id="show" onclick="show();" style="height:100% !important" class="panel">
        <p class="is-marginless" style="height:15em;">
          <img src="<?php echo "upload/".$mainpic["Textawn"]; ?>"style="height:100%;width:100%;">
        </p>
        <div class="panel-block">
          <div class="columns columnsaside">
            <div class="column">
              <div class="panel-block-item"><?php echo $nameroom["Textawn"]; ?></div>
            </div>
            <div class="column has-text-right">
              <div class="panel-block-item"><?php echo 1 ?><i class="fa fa-user"></i></div>
              <div class="panel-block-item"><?php echo $rows["RoomID"] ?><i class="fa fa-calendar"></i></div>

            </div>
          </div>
        <button type="button" style="width:100%" id="show" onclick="loadfunctionsshow(<?php echo $rows["RoomID"] ?>);" class="button" name="button">Info</button></div>
      </div>
    </div>

  </div>
  <?php  $first = true; }
   }
  ?>
<?php
  $pages = ceil($numie / 6);
  if($pages == 1){ ?>
    <li>
      <nav class="pagination nobullets" role="navigation" aria-label="pagination">
      <a class="pagination-link is-current" aria-label="Goto page 1">1</a>
    </li>
    </nav>
  <?php }
  elseif($pages == 2){ ?>
    <nav class="pagination nobullets" role="navigation" aria-label="pagination">
      <a onclick="pagingrooms(<?php if($_GET["page"] != $pages){ echo $_GET["page"] + 1;}else{echo "no";} ?><?php echo ",'".$_SESSION["jscall"]."'" ?>);" class="pagination-next nobullets">Next page</a>
      <a onclick="pagingrooms(<?php if($_GET["page"] != 1){ echo $_GET["page"] - 1;}else{echo "no";} ?><?php echo ",'".$_SESSION["jscall"]."'" ?>);" class="pagination-previous nobullets">Previous</a>
      <ul class="pagination-list nobullets">
        <li>
          <?php if($_GET["page"] == 1){ ?>
            <a class="pagination-link is-current" onclick="pagingrooms(1<?php echo ",'".$_SESSION["jscall"]."'" ?>);" aria-label="Goto page 45">1</a>
          <?php }else{ ?>
            <a class="pagination-link" onclick="pagingrooms(1<?php echo ",'".$_SESSION["jscall"]."'" ?>);" aria-label="Goto page 45">1</a>
          <?php } ?>
        </li>
        <li>
          <?php if($_GET["page"] == 2){ ?>
            <a class="pagination-link is-current" onclick="pagingrooms(2<?php echo ",'".$_SESSION["jscall"]."'" ?>);" aria-label="Page 46" aria-current="page">2</a>
          <?php }else{ ?>
            <a class="pagination-link" onclick="pagingrooms(2<?php echo ",'".$_SESSION["jscall"]."'" ?>);" aria-label="Page 46" aria-current="page">2</a>
          <?php } ?>
        </li>
      </ul>
    </nav>
  <?php }
  elseif($pages == 3){  ?>
    <nav class="pagination nobullets" role="navigation" aria-label="pagination">
      <a onclick="pagingrooms(<?php if($_GET["page"] != $pages){ echo $_GET["page"] + 1;}else{echo "no";} ?><?php echo ",'".$_SESSION["jscall"]."'" ?>);" class="pagination-next nobullets">Next page</a>
      <a onclick="pagingrooms(<?php if($_GET["page"] != 1){ echo $_GET["page"] - 1;}else{echo "no";} ?><?php echo ",'".$_SESSION["jscall"]."'" ?>);" class="pagination-previous nobullets">Previous</a>
      <ul class="pagination-list nobullets">
        <li>
          <?php if($_GET["page"] == 1){ ?>
            <a class="pagination-link is-current" onclick="pagingrooms(1<?php echo ",'".$_SESSION["jscall"]."'" ?>);" aria-label="Goto page 45">1</a>
          <?php }else{ ?>
            <a class="pagination-link" onclick="pagingrooms(1<?php echo ",'".$_SESSION["jscall"]."'" ?>);" aria-label="Goto page 45">1</a>
          <?php } ?>

        </li>
        <li>
          <?php if($_GET["page"] == 2){ ?>
            <a class="pagination-link is-current" onclick="pagingrooms(2<?php echo ",'".$_SESSION["jscall"]."'" ?>);" aria-label="Page 46" aria-current="page">2</a>
          <?php }else{ ?>
            <a class="pagination-link" onclick="pagingrooms(2<?php echo ",'".$_SESSION["jscall"]."'" ?>);" aria-label="Page 46" aria-current="page">2</a>
          <?php } ?>
        </li>
        <li>
          <?php if($_GET["page"] == 3){ ?>
            <a class="pagination-link is-current" onclick="pagingrooms(3<?php echo ",'".$_SESSION["jscall"]."'" ?>);" aria-label="Goto page 47">3</a>
          <?php }else{ ?>
            <a class="pagination-link" onclick="pagingrooms(3<?php echo ",'".$_SESSION["jscall"]."'" ?>);" aria-label="Goto page 47">3</a>
          <?php } ?>
        </li>
      </ul>
    </nav>

  <?php }
  elseif($pages > 3 AND $_GET["page"] > 3){  ?>
    <nav class="pagination nobullets" role="navigation" aria-label="pagination">
      <a onclick="pagingrooms(<?php if($_GET["page"] != $pages){ echo $_GET["page"] + 1;}else{echo "no";} ?><?php echo ",'".$_SESSION["jscall"]."'" ?>);" class="pagination-next nobullets">Next page</a>
      <a onclick="pagingrooms(<?php if($_GET["page"] != 1){ echo $_GET["page"] - 1;}else{echo "no";} ?><?php echo ",'".$_SESSION["jscall"]."'" ?>);" class="pagination-previous nobullets">Previous</a>
      <ul class="pagination-list nobullets">
        <li>
          <a class="pagination-link" onclick="pagingrooms(1<?php echo ",'".$_SESSION["jscall"]."'" ?>);" aria-label="Goto page 1">1</a>
        </li>
        <li>
          <span class="pagination-ellipsis">&hellip;</span>
        </li>
        <li>
          <a class="pagination-link" onclick="pagingrooms(<?php echo $_GET["page"] - 1 ?><?php echo ",'".$_SESSION["jscall"]."'" ?>);" aria-label="Goto page 45"><?php echo $_GET["page"] - 1 ?></a>
        </li>
        <li>
          <a class="pagination-link is-current" onclick="pagingrooms(<?php echo $_GET["page"] ?><?php echo ",'".$_SESSION["jscall"]."'" ?>);" aria-label="Page 46" aria-current="page"><?php echo $_GET["page"] ?></a>
        </li>
        <li>
          <?php
          if(($_GET["page"] + 1) <= $pages ){ ?>
            <a class="pagination-link" onclick="pagingrooms(<?php echo $_GET["page"] + 1 ?><?php echo ",'".$_SESSION["jscall"]."'" ?>);" aria-label="Goto page 47"><?php echo $_GET["page"] + 1 ?></a>

        <?php } ?>
        </li>
        <li>
          <span class="pagination-ellipsis">&hellip;</span>
        </li>
        <li>
          <a class="pagination-link" onclick="pagingrooms(<?php echo $pages; ?><?php echo ",'".$_SESSION["jscall"]."'" ?>);" aria-label="Goto page 86"><?php echo $pages; ?></a>
        </li>
      </ul>
    </nav>
  <?php }
  elseif($pages > 3 AND $_GET["page"] == 3){
    ?>
    <nav class="pagination nobullets" role="navigation" aria-label="pagination">
      <a onclick="pagingrooms(<?php if($_GET["page"] != $pages){ echo $_GET["page"] + 1;}else{echo "no";} ?><?php echo ",'".$_SESSION["jscall"]."'" ?>);" class="pagination-next nobullets">Next page</a>
      <a onclick="pagingrooms(<?php if($_GET["page"] != 1){ echo $_GET["page"] - 1;}else{echo "no";} ?><?php echo ",'".$_SESSION["jscall"]."'" ?>);" class="pagination-previous nobullets">Previous</a>
      <ul class="pagination-list nobullets">
        <li>
          <a class="pagination-link" onclick="pagingrooms(1<?php echo ",'".$_SESSION["jscall"]."'" ?>);" aria-label="Goto page 1">1</a>
        </li>
        <li>
          <span class="pagination-ellipsis">&hellip;</span>
        </li>
        <li>
          <a class="pagination-link"  onclick="pagingrooms(2<?php echo ",'".$_SESSION["jscall"]."'" ?>);" aria-label="Goto page 45">2</a>
        </li>
        <li>
          <a class="pagination-link is-current"  onclick="pagingrooms(3<?php echo ",'".$_SESSION["jscall"]."'" ?>);"  aria-label="Page 46" aria-current="page">3</a>
        </li>
        <li>
          <a class="pagination-link"  onclick="pagingrooms(4<?php echo ",'".$_SESSION["jscall"]."'" ?>);"  aria-label="Goto page 47">4</a>
        </li>
        <li>
          <span class="pagination-ellipsis">&hellip;</span>
        </li>
        <li>
          <a class="pagination-link" onclick="pagingrooms(<?php echo $pages; ?><?php echo ",'".$_SESSION["jscall"]."'" ?>);" aria-label="Goto page 86"><?php echo $pages; ?></a>
        </li>
      </ul>
    </nav>
  <?php
  }
  elseif($pages > 3 AND $_GET["page"] == 2){
    ?>
    <nav class="pagination nobullets" role="navigation" aria-label="pagination">
      <a onclick="pagingrooms(<?php if($_GET["page"] != $pages){ echo $_GET["page"] + 1;}else{echo "no";} ?><?php echo ",'".$_SESSION["jscall"]."'" ?>);" class="pagination-next nobullets">Next page</a>
      <a onclick="pagingrooms(<?php if($_GET["page"] != 1){ echo $_GET["page"] - 1;}else{echo "no";} ?><?php echo ",'".$_SESSION["jscall"]."'" ?>);" class="pagination-previous nobullets">Previous</a>
      <ul class="pagination-list nobullets">
        <li>
          <a class="pagination-link" onclick="pagingrooms(1<?php echo ",'".$_SESSION["jscall"]."'" ?><?php echo ",'".$_SESSION["jscall"]."'" ?>);" aria-label="Goto page 1">1</a>
        </li>
        <li>
          <span class="pagination-ellipsis">&hellip;</span>
        </li>
        <li>
          <a class="pagination-link" onclick="pagingrooms(1<?php echo ",'".$_SESSION["jscall"]."'" ?><?php echo ",'".$_SESSION["jscall"]."'" ?>);" aria-label="Goto page 45">1</a>
        </li>
        <li>
          <a class="pagination-link is-current" onclick="pagingrooms(2<?php echo ",'".$_SESSION["jscall"]."'" ?><?php echo ",'".$_SESSION["jscall"]."'" ?>);" aria-label="Page 46" aria-current="page">2</a>
        </li>
        <li>
          <a class="pagination-link" onclick="pagingrooms(3<?php echo ",'".$_SESSION["jscall"]."'" ?><?php echo ",'".$_SESSION["jscall"]."'" ?>);" aria-label="Goto page 47">3</a>
        </li>
        <li>
          <span class="pagination-ellipsis">&hellip;</span>
        </li>
        <li>
          <a class="pagination-link" onclick="pagingrooms(<?php echo $pages; ?><?php echo ",'".$_SESSION["jscall"]."'" ?>);" aria-label="Goto page 86"><?php echo $pages; ?></a>
        </li>
      </ul>
    </nav>
  <?php
  }
  elseif($pages > 3 AND $_GET["page"] == 1){
    ?>
    <nav class="pagination nobullets" role="navigation" aria-label="pagination">
      <a onclick="pagingrooms(<?php if($_GET["page"] != $pages){ echo $_GET["page"] + 1;}else{echo "no";} ?><?php echo ",'".$_SESSION["jscall"]."'" ?>);" class="pagination-next nobullets">Next page</a>
      <a onclick="pagingrooms(<?php if($_GET["page"] != 1){ echo $_GET["page"] - 1;}else{echo "no";} ?><?php echo ",'".$_SESSION["jscall"]."'" ?>);" class="pagination-previous nobullets">Previous</a>
      <ul class="pagination-list nobullets">
        <li>
          <a class="pagination-link" onclick="pagingrooms(1<?php echo ",'".$_SESSION["jscall"]."'" ?>);" aria-label="Goto page 1">1</a>
        </li>
        <li>
          <span class="pagination-ellipsis">&hellip;</span>
        </li>
        <li>
          <a class="pagination-link is-current" onclick="pagingrooms(1<?php echo ",'".$_SESSION["jscall"]."'" ?>);" aria-label="Goto page 45">1</a>
        </li>
        <li>
          <a class="pagination-link" onclick="pagingrooms(2<?php echo ",'".$_SESSION["jscall"]."'" ?>);" aria-label="Page 46" aria-current="page">2</a>
        </li>
        <li>
          <a class="pagination-link" onclick="pagingrooms(3<?php echo ",'".$_SESSION["jscall"]."'" ?>);" aria-label="Goto page 47">3</a>
        </li>
        <li>
          <span class="pagination-ellipsis">&hellip;</span>
        </li>
        <li>
          <a class="pagination-link" onclick="pagingrooms(<?php echo $pages; ?><?php echo ",'".$_SESSION["jscall"]."'" ?>);" aria-label="Goto page 86"><?php echo $pages; ?></a>
        </li>
      </ul>
    </nav>
  <?php
  }

  ?>
  </div>
</div>
