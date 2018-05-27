<?php

include"conn.php";
session_start();

if($_SESSION["eventtype"] === "myevents"){
  $getmyevent = $dbh->prepare("SELECT * FROM ticket WHERE OwnerID = ".$_SESSION["userid"]);
  $getmyevent->execute();
  $addids = "";


  while($myevents = $getmyevent->fetch(PDO::FETCH_ASSOC)){
    $checkforevent = $dbh->prepare("SELECT EventOrRent FROM event WHERE EventID = ".$myevents["EventID"]);
    $checkforevent->execute();
    $checker = $checkforevent->fetch(PDO::FETCH_ASSOC);
    if($checker["EventOrRent"] == 1){
      if($addids === ""){
        $addids = " AND EventID = ".$myevents["EventID"];

      }
      else{
        $addids .= " OR EventID = ".$myevents["EventID"];
      }
    }
  }
  if($addids === ""){
    $addids = " AND EventID = 0";
  }
  $sql = $dbh->prepare("SELECT * FROM Event WHERE Active = 1 and EventOrRent = 1".$addids." and eventname like ? ;");
  $sql->bindValue(1, "%".$_GET['search']."%", PDO::PARAM_STR);
  $sql->execute();
  $numie = $sql->RowCount();
  $first = true;
  while($rows = $sql->fetch(PDO::FETCH_ASSOC)){
    if($first === true){ ?>
      <div class="columns columnsaside"> <!--  Max 2 items -->
        <div class="column is-6">
           <?php if($rows["Limited_Ticket"] == $rows["Sold_Ticket"]){

           }else{ ?>
                   <a href="event.php?id=<?php echo $rows["EventID"] ?>">
          <?php }
           ?>

          <div class="panel">

              <div class="">
                <img class="imgA1" src="upload/<?php echo $rows["Mainpicture"] ?>">
                <?php
                if($rows["Limited_Ticket"] == $rows["Sold_Ticket"]){ ?>
                  <img class="imgB1" src="img/unavailable.png" alt="">
                <?php }
                ?>
              </div>


            <div class="panel-block">
              <div class="columns columnsaside" <?php if($rows["Limited_Ticket"] == $rows["Sold_Ticket"]){ ?>style="margin-top: -2em;"<?php } ?>>
                <div class="column">
                  <div class="panel-block-item"><?php echo $rows["eventname"]; ?></div>
                </div>
                <div class="column has-text-right">
                  <div class="panel-block-item"><?php echo $rows["Sold_Ticket"] ?><i class="fa fa-user"></i></div>
                  <div class="panel-block-item"><?php echo $rows["date_event"] ?><i class="fa fa-calendar"></i></div>
                </div>
              </div>
            </div>
          </div><?php if($rows["Limited_Ticket"] == $rows["Sold_Ticket"]){

          }else{ ?>
                </a>
         <?php }
          ?>
        </div>



  <?php  $first = false; }
  else{ ?>
    <div class="column is-6">
      <?php if($rows["Limited_Ticket"] == $rows["Sold_Ticket"]){

      }else{ ?>
              <a href="event.php?id=<?php echo $rows["EventID"] ?>">
     <?php }
      ?>
      <div class="panel">

          <div class="">
            <img class="imgA1" src="upload/<?php echo $rows["Mainpicture"] ?>">
            <?php
            if($rows["Limited_Ticket"] == $rows["Sold_Ticket"]){ ?>
              <img class="imgB1" src="img/unavailable.png" alt="">
            <?php }
            ?>
          </div>

        <div class="panel-block">
          <div class="columns columnsaside" <?php if($rows["Limited_Ticket"] == $rows["Sold_Ticket"]){ ?>style="margin-top: -2em;"<?php } ?>>
            <div class="column">
              <div class="panel-block-item"><?php echo $rows["eventname"]; ?></div>
            </div>
            <div class="column has-text-right">
              <div class="panel-block-item"><?php echo $rows["Sold_Ticket"] ?> <i class="fa fa-user"></i></div>
              <div class="panel-block-item"><?php echo $rows["date_event"] ?> <i class="fa fa-calendar"></i></div>
            </div>
          </div>
        </div>
      </div><?php if($rows["Limited_Ticket"] == $rows["Sold_Ticket"]){

      }else{ ?>
            </a>
     <?php }
      ?>
    </div>
  </div>
  <?php  $first = true; }
   }
  ?>
  </div>

  <?php
  }
elseif($_SESSION["eventtype"] === "index"){
  $count = $dbh->prepare("SELECT count(EventID) FROM Event WHERE Active = 1 and EventOrRent = 1 and eventname like ? ;");
  $count->bindValue(1, "%".$_GET['search']."%", PDO::PARAM_STR);
  $count->execute();
  $countrows = $count->fetchColumn();
  if(isset($_GET["page"])){
    $pag = $_GET["page"] * 10 - 10;
    $sql = $dbh->prepare("SELECT * FROM Event WHERE Active = 1 and EventOrRent = 1 and eventname like ? LIMIT 10 OFFSET ? ;");
    $sql->bindParam(2,$pag, PDO::PARAM_INT);
  }
  else{
    $_GET["page"] = 1;
    $sql = $dbh->prepare("SELECT * FROM Event WHERE Active = 1 and EventOrRent = 1 and eventname like ? LIMIT 10 OFFSET 0 ;");

  }

  $sql->bindValue(1, "%".$_GET['search']."%", PDO::PARAM_STR);
  $sql->execute();
  $numie = $sql->RowCount();
  $first = true;
  while($rows = $sql->fetch(PDO::FETCH_ASSOC)){
    if($first === true){ ?>
      <div class="columns columnsaside"> <!--  Max 2 items -->
        <div class="column is-6">
           <?php if($rows["Limited_Ticket"] == $rows["Sold_Ticket"]){

           }else{ ?>
                   <a href="event.php?id=<?php echo $rows["EventID"] ?>">
          <?php }
          if($rows["Limited_Ticket"] == $rows["Sold_Ticket"]){ ?>
         <div style="opacity:0.2" class="panel">
           <?php
         }
         else{ ?>
           <div class="panel">
         <?php }


            ?>

              <div class="">
                <img class="imgA1" src="upload/<?php echo $rows["Mainpicture"] ?>">
                <?php
                if($rows["Limited_Ticket"] == $rows["Sold_Ticket"]){ ?>
                  <img class="imgB1" src="img/unavailable.png" alt="">
                <?php }
                ?>
              </div>


            <div class="panel-block">
              <div class="columns columnsaside" <?php if($rows["Limited_Ticket"] == $rows["Sold_Ticket"]){ ?>style="margin-top: -2em;"<?php } ?>>
                <div class="column">
                  <div class="panel-block-item"><?php echo $rows["eventname"]; ?></div>
                </div>
                <div class="column has-text-right">
                  <div class="panel-block-item"><?php echo $rows["Sold_Ticket"] ?><i class="fa fa-user"></i></div>
                  <div class="panel-block-item"><?php echo $rows["date_event"] ?><i class="fa fa-calendar"></i></div>
                </div>
              </div>
            </div>
          </div><?php if($rows["Limited_Ticket"] == $rows["Sold_Ticket"]){

          }else{ ?>
                </a>
         <?php }
          ?>
        </div>



  <?php  $first = false; }
  else{ ?>
    <div class="column is-6">
      <?php if($rows["Limited_Ticket"] == $rows["Sold_Ticket"]){

      }else{ ?>
              <a href="event.php?id=<?php echo $rows["EventID"] ?>">
     <?php }
     if($rows["Limited_Ticket"] == $rows["Sold_Ticket"]){ ?>
    <div style="opacity:0.2" class="panel">
      <?php
    }
    else{ ?>
      <div class="panel">
    <?php }


       ?>

          <div class="">
            <img class="imgA1" src="upload/<?php echo $rows["Mainpicture"] ?>">
            <?php
            if($rows["Limited_Ticket"] == $rows["Sold_Ticket"]){ ?>
              <img class="imgB1" src="img/unavailable.png" alt="">
            <?php }
            ?>
          </div>

        <div class="panel-block">
          <div class="columns columnsaside" <?php if($rows["Limited_Ticket"] == $rows["Sold_Ticket"]){ ?>style="margin-top: -2em;"<?php } ?>>
            <div class="column">
              <div class="panel-block-item"><?php echo $rows["eventname"]; ?></div>
            </div>
            <div class="column has-text-right">
              <div class="panel-block-item"><?php echo $rows["Sold_Ticket"] ?> <i class="fa fa-user"></i></div>
              <div class="panel-block-item"><?php echo $rows["date_event"] ?> <i class="fa fa-calendar"></i></div>
            </div>
          </div>
        </div>
      </div><?php if($rows["Limited_Ticket"] == $rows["Sold_Ticket"]){

      }else{ ?>
            </a>
     <?php }
      ?>
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


}
elseif($_SESSION["eventtype"] === "mymeetings"){
  $getmyevent = $dbh->prepare("SELECT * FROM ticket WHERE OwnerID = ".$_SESSION["userid"]);
  $getmyevent->execute();
  $addids = "";


  while($myevents = $getmyevent->fetch(PDO::FETCH_ASSOC)){
    $checkforevent = $dbh->prepare("SELECT EventOrRent FROM event WHERE EventID = ".$myevents["EventID"]);
    $checkforevent->execute();
    $checker = $checkforevent->fetch(PDO::FETCH_ASSOC);
    if($checker["EventOrRent"] == 0){
      if($addids === ""){
        $addids = " AND EventID = ".$myevents["EventID"];

      }
      else{
        $addids .= " OR EventID = ".$myevents["EventID"];
      }
    }

  }
  if($addids === ""){
    $addids = " AND EventID = 0";
  }
  $sql = $dbh->prepare("SELECT * FROM Event WHERE Active = 1 ".$addids.";");
  $sql->bindValue(1, "%".$_GET['search']."%", PDO::PARAM_STR);
  $sql->execute();
  $numie = $sql->RowCount();
  $first = true;
  while($rows = $sql->fetch(PDO::FETCH_ASSOC)){
    $getroom = $dbh->prepare("SELECT RoomID FROM roomhours WHERE Room_HoursID = ".$rows["Reservation"]);
    $getroom->execute();
    $room = $getroom->fetch(PDO::FETCH_ASSOC);
    $details = $dbh->prepare("SELECT Textawn FROM room_details WHERE RoomID = ".$room["RoomID"]." AND DetailsID = 10");
    $details->execute();
    $detailsroom = $details->fetch(PDO::FETCH_ASSOC);
    if($first === true){ ?>
      <div class="columns columnsaside"> <!--  Max 2 items -->
        <div class="column is-6">

                   <a href="event.php?id=<?php echo $rows["EventID"]."&view=yes" ?>">


          <div class="panel">

              <div class="">
                <img class="imgA1" src="upload/<?php echo $detailsroom["Textawn"] ?>">

              </div>


            <div class="panel-block">
              <div class="columns columnsaside" <?php if($rows["Limited_Ticket"] == $rows["Sold_Ticket"]){ ?>style="margin-top: -2em;"<?php } ?>>
                <div class="column">
                  <div class="panel-block-item"><?php echo $rows["eventname"]; ?></div>
                </div>
                <div class="column has-text-right">
                  <div class="panel-block-item"><?php echo $rows["Sold_Ticket"] ?><i class="fa fa-user"></i></div>
                  <div class="panel-block-item"><?php echo $rows["date_event"] ?><i class="fa fa-calendar"></i></div>
                </div>
              </div>
            </div>
          </div><?php if($rows["Limited_Ticket"] == $rows["Sold_Ticket"]){

          }else{ ?>
                </a>
         <?php }
          ?>
        </div>



  <?php  $first = false; }
  else{ ?>
    <div class="column is-6">
              <a href="event.php?id=<?php echo $rows["EventID"] ?>">

      <div class="panel">

          <div class="">
            <img class="imgA1" src="upload/<?php echo $detailsroom["Textawn"] ?>">
          </div>

        <div class="panel-block">
          <div class="columns columnsaside" <?php if($rows["Limited_Ticket"] == $rows["Sold_Ticket"]){ ?>style="margin-top: -2em;"<?php } ?>>
            <div class="column">
              <div class="panel-block-item"><?php echo $rows["eventname"]; ?></div>
            </div>
            <div class="column has-text-right">
              <div class="panel-block-item"><?php echo $rows["Sold_Ticket"] ?> <i class="fa fa-user"></i></div>
              <div class="panel-block-item"><?php echo $rows["date_event"] ?> <i class="fa fa-calendar"></i></div>
            </div>
          </div>
        </div>
      </div><?php if($rows["Limited_Ticket"] == $rows["Sold_Ticket"]){

      }else{ ?>
            </a>
     <?php }
      ?>
    </div>
  </div>
  <?php  $first = true; }
   }
  ?>
  </div>

  <?php
}
