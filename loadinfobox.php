<?php
include"conn.php";
$roomresult = $dbh->prepare("SELECT * FROM room_details WHERE RoomID = ? ");
$roomresult->bindParam(1,$_GET["number"],PDO::PARAM_INT);
$roomresult->execute();



?>
<div class="modal-background"></div>
<div id="closeid" class="modal-card">
  <header class="modal-card-head">
    <?php
    $name = $dbh->prepare("SELECT Textawn FROM room_details WHERE RoomID = ".$_GET["number"]." AND detailsID = 4 ;");
    $name->execute();
    $nameroom = $name->fetch(PDO::FETCH_ASSOC);
    $image = $dbh->prepare("SELECT Textawn FROM room_details WHERE RoomID = ".$_GET["number"]." AND detailsID = 10 ;");
    $image->execute();
    $giveimage = $image->fetch(PDO::FETCH_ASSOC);
    ?>
    <p class="modal-card-title"><?php echo $nameroom["Textawn"]; ?></p>
    <button class="delete" onclick="closeshow();" aria-label="close"></button>
  </header>
  <section class="modal-card-body">
    <table>
      <tbody>
        <img src="<?php echo "upload/".$giveimage["Textawn"] ?>" alt="" style=" width:100%;">
        <h1>Specifications</h1>
        <?php
        while($room = $roomresult->fetch(PDO::FETCH_ASSOC)){
            $getnamedetail = $dbh->prepare("SELECT * FROM details WHERE detailsID = ".$room["DetailsID"]);
            $getnamedetail->execute();
            $namedetail = $getnamedetail->fetch(PDO::FETCH_ASSOC);
            $gettype = $dbh->prepare("SELECT SortingID FROM details WHERE fldname = '".$namedetail["fldname"]."' ;");

            $gettype->execute();
            $type = $gettype->fetch(PDO::FETCH_ASSOC);
            if($type["SortingID"] == 1){ ?>
              <tr>
                <td class="tdinfo"><?php echo $namedetail["fldname"]; ?></td>
                <td class="tdinfo"><?php echo $room["Textawn"]; ?></td>
              </tr>
      <?php }
            elseif($type["SortingID"] == 2){ ?>
              <tr>
                <td class="tdinfo"><?php echo $namedetail["fldname"]; ?></td>
                <td class="tdinfo"><?php echo $room["Numberawn"]; ?></td>
              </tr>
      <?php }
            elseif($type["SortingID"] == 3){ ?>
              <tr>
                <td class="tdinfo"><?php echo $namedetail["fldname"]; ?></td>
                <td class="tdinfo"><?php echo $room["Textawn"]; ?></td>
              </tr>
      <?php }
            elseif($type["SortingID"] == 4){ ?>
              <tr>
                <td class="tdinfo"><?php echo $namedetail["fldname"]; ?></td>
                <td class="tdinfo"><?php if($room["Boolawn"] == 1){echo "yes"; }else{ echo "no";}; ?></td>
              </tr>
      <?php }

            ?>

<?php        }
        ?>

      </tbody>
    </table>

  </section>
  <footer class="modal-card-foot">
    <button class="button is-success" onclick="takeroom(<?php echo $_GET["number"]; ?>);">take this room</button>

  </footer>
</div>
<?php


?>
