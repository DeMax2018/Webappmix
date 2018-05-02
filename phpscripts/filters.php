<?php
include"../conn.php";
if($_GET["state"] === "true"){ ?>
  <div id="filterload" class="flexing">
    <div class="percentage">
      <label>filter</label>
      <select id="filterselect" onchange="updatetype()" placeholder="ja" data-native-menu="false">
          <?php
          $all = $dbh->prepare("SELECT fldname FROM details");
          $all->execute();
          while($records = $all->fetch(PDO::FETCH_ASSOC)){ ?>
            <option value="<?php echo $records["DetailsID"]; ?>"><?php echo $records["fldname"]; ?></option>
          <?php }
          ?>
      </select>
    </div>
    <div class="percentage">
      <label>rename</label>
      <input type="text" class="input" placeholder="give the name of the room" id="namefilter" name="" value="">
    </div>
    <div class="percentage">
      <div id="changetype">

      <label>type</label>
      <select id="typeselect"  placeholder="ja" data-native-menu="false">
          <?php
          $all = $dbh->prepare("SELECT * FROM sorting;");
          $all->execute();
          while($records = $all->fetch(PDO::FETCH_ASSOC)){ ?>
            <option value="<?php echo $records["SortingID"]; ?>"><?php echo $records["fldSorting"]; ?></option>
          <?php }
          ?>
      </select>
    </div>
    </div>
    <div class="percentage">
      <a href=""><i onclick="alert('u clicked u little bitch')"class="fas fa-trash-alt" style="width:3em;height:6em;"></i></a>
    </div>
  </div>

<?php }
elseif($_GET["state"] === "false"){ ?>
  <div id="filterload" class="flexing">
    <div class="percentage">
      <label>Name</label>
      <input type="text" class="input" placeholder="give the name of the room" id="namefilter" name="" value="">
    </div>
    <div class="percentage">
      <label>type</label>
      <select id="typeselect"  placeholder="ja" data-native-menu="false">
          <?php
          $all = $dbh->prepare("SELECT * FROM sorting;");
          $all->execute();
          while($records = $all->fetch(PDO::FETCH_ASSOC)){ ?>
            <option value="<?php echo $records["SortingID"]; ?>"><?php echo $records["fldSorting"]; ?></option>
          <?php }
          ?>
      </select>
    </div>
    <div class="percentage">
      <label>add</label>
      <input type="button" onclick="addfilter();" class="input" id="addfilters" name="" value="Add new filter">
    </div>
  </div>
<?php }
elseif($_GET["state"] === "select"){
  $gettype = $dbh->prepare("SELECT SortingID FROM details");
  $gettype->execute();
  $type = $gettype->fetch(PDO::FETCH_ASSOC);
  switch ($type["SortingID"]) {
    case 1:
      $all = $dbh->prepare("SELECT * FROM sorting;");
      $all->execute();
      while($records = $all->fetch(PDO::FETCH_ASSOC)){
        if($records["SortingID"] == 1){ ?>
          <option selected value="<?php echo $records["SortingID"]; ?>"><?php echo $records["fldSorting"]; ?></option>
        <?php } else{ ?>
        <option value="<?php echo $records["SortingID"]; ?>"><?php echo $records["fldSorting"]; ?></option>
      <?php }}
      break;
      case 2:
        $all = $dbh->prepare("SELECT * FROM sorting;");
        $all->execute();
        while($records = $all->fetch(PDO::FETCH_ASSOC)){
          if($records["SortingID"] == 2){ ?>
          <option selected value="<?php echo $records["SortingID"]; ?>"><?php echo $records["fldSorting"]; ?></option>
        <?php } else{ ?>
          <option value="<?php echo $records["SortingID"]; ?>"><?php echo $records["fldSorting"]; ?></option>
        <?php }}
        break;
        case 3:
          $all = $dbh->prepare("SELECT * FROM sorting;");
          $all->execute();
          while($records = $all->fetch(PDO::FETCH_ASSOC)){
            if($records["SortingID"] == 3){ ?>
            <option selected value="<?php echo $records["SortingID"]; ?>"><?php echo $records["fldSorting"]; ?></option>
          <?php } else{ ?>
            <option value="<?php echo $records["SortingID"]; ?>"><?php echo $records["fldSorting"]; ?></option>
          <?php }}
          break;
          case 4:
            $all = $dbh->prepare("SELECT * FROM sorting;");
            $all->execute();
            while($records = $all->fetch(PDO::FETCH_ASSOC)){
              if($records["SortingID"] == 4){ ?>
              <option selected value="<?php echo $records["SortingID"]; ?>"><?php echo $records["fldSorting"]; ?></option>
            <?php } else{ ?>
              <option value="<?php echo $records["SortingID"]; ?>"><?php echo $records["fldSorting"]; ?></option>
            <?php }}
            break;

    default:
      break;
  }
  ?>
  <select id="typeselect"  placeholder="ja" data-native-menu="false">

      ?>
  </select>
  <?php }
?>
