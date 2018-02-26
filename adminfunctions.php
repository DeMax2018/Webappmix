
<table>

    <?php
    include"conn.php";

    $sth = $dbh->prepare("SELECT * from User WHERE fldName like ? ");
  $sth->bindValue(1, "%".$_GET['filter']."%", PDO::PARAM_STR);
      $sth->execute();
    while($record = $sth->fetch(PDO::FETCH_ASSOC)){ ?>
      <tr class="is-light">
        <td class="accounta"><?php echo $record["fldName"]." ".$record["fldLastname"] ?></td>
        <?php

        $checkbox = $dbh->prepare("SELECT * FROM PrivateRights WHERE UserID = ".$record["UserID"]);
        $checkbox->execute();
        while ($rows = $checkbox->fetch(PDO::FETCH_ASSOC)) {
          if($rows["Create_events"] == 1){
             echo "<td><input checked type='checkbox'></td>";
          }
          else{
            echo "<td><input type='checkbox'></td>";
          }
          if($rows["Delete_Events"] == 1){
             echo "<td><input checked type='checkbox'></td>";
          }
          else{
            echo "<td><input type='checkbox'></td>";
          }
          if($rows["Acces_Rights_System"] == 1){
             echo "<td><input checked type='checkbox'></td>";
          }
          else{
            echo "<td><input type='checkbox'></td>";
          }
        }
        ?>
      </tr>


  <?php }  ?>


</table>
