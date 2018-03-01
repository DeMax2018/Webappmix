
<table>

    <?php
    include"conn.php";


if(isset($_GET["filter"]) === true){
    $sth = $dbh->prepare("SELECT * from User WHERE fldName like ? ");
  $sth->bindValue(1, "%".$_GET['filter']."%", PDO::PARAM_STR);
      $sth->execute();
    while($record = $sth->fetch(PDO::FETCH_ASSOC)){ ?>
      <tr class="is-light">
        <td id="names" class="accounta"><?php echo $record["fldName"]." ".$record["fldLastname"] ?></td>
        <?php

        $checkbox = $dbh->prepare("SELECT * FROM PrivateRights WHERE UserID = ".$record["UserID"]);
        $checkbox->execute();
        while ($rows = $checkbox->fetch(PDO::FETCH_ASSOC)) {
          if($rows["Create_events"] == 1){
             echo "<td><input checked id='create' name='create' onchange='create_event(this.value,1);' type='checkbox'></td>";
          }
          else{
            echo "<td><input id='create' name='create' name='create' onchange='create_event(this.value,1);' type='checkbox'></td>";
          }
          if($rows["Delete_Events"] == 1){
             echo "<td><input id='create' checked name='create' onchange='create_event(this.value,2);' type='checkbox'></td>";
          }
          else{
            echo "<td><input id='create' name='create' onchange='create_event(this.value,2);' type='checkbox'></td>";
          }
          if($rows["Acces_Rights_System"] == 1){
             echo "<td><input id='create' name='create' onchange='create_event(this.value,3);' checked type='checkbox'></td>";
          }
          else{
            echo "<td><input id='create' name='create' onchange='create_event(this.value,3);' type='checkbox'></td>";
          }
        }
        ?>
      </tr>


  <?php }  ?>


</table>
<?php
}
elseif(isset($_GET["createevent"])){
  $box = json_decode(file_get_contents('php://input'), true);
  $user = explode(" ",$box["user"]);
  $getuser = $dbh->prepare("SELECT * FROM User WHERE fldName = ? AND fldLastname = ?");
  $getuser->bindValue(1,$user[1], PDO::PARAM_STR);
  $getuser->bindValue(2,$user[2], PDO::PARAM_STR);
  $getuser.execute();
  $userid = $getuser->fetch(PDO::FETCH_ASSOC);
  $sql = $dbh->prepare("UPDATE privaterights SET Create_event = ? WHERE UserID = ?");
  $sql->bindValue(1,$box["checked"],PDO::PARAM_STR);
  $sql->bindValue(2,$userid["UserID"]);
  $sql.execute();
  echo" eifnzioeufnzieufnio";

}
?>
