<?php
include"conn.php";

$_GET["number"] = 5;
$roomresult = $dbh->prepare("SELECT * FROM room_details WHERE RoomID = ? ");
$roomresult->bindParam(1,$_GET["number"],PDO::PARAM_INT);
$roomresult->execute();

?>
<div class="modal-background"></div>
<div id="closeid" class="modal-card">
  <header class="modal-card-head">
    <p class="modal-card-title">Modal title</p>
    <button class="delete" onclick="closeshow();" aria-label="close"></button>
  </header>
  <section class="modal-card-body">
    <table>
      <tbody>
        <?php
        while($room = $roomresult->fetch(PDO::FETCH_ASSOC)){
            $getnamedetail = $dbh->prepare("SELECT * FROM details WHERE detailsID = ".$room["DetailsID"]);
            $getnamedetail->execute();
            $namedetail = $getnamedetail->fetch(PDO::FETCH_ASSOC);
            ?>
            <tr>
              <td><?php echo $namedetail["fldname"]; ?></td>
              <td><?php echo $room["Numberawn"]; ?></td>
            </tr>
<?php        }
        ?>

      </tbody>
    </table>

  </section>
  <footer class="modal-card-foot">
    <button class="button is-success">Save changes</button>
    <button class="button">Cancel</button>
  </footer>
</div>
<?php


?>
