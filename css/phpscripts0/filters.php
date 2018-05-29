<?php
include"../conn.php";
if(isset($_GET["state"]) and $_GET["state"] === "true"){ ?>
  <div id="filterload" class="flexing">
    <div class="percentage">
      <label>filter</label>
      <select id="filterselect" onchange="updatetype()" placeholder="ja" data-native-menu="false">
        <option value="clear"><i class="fas fa-home"></i></option>
          <?php
          $all = $dbh->prepare("SELECT * FROM details");
          $all->execute();
          while($records = $all->fetch(PDO::FETCH_ASSOC)){ ?>
            <option value="<?php echo $records["DetailsID"]; ?>"><?php echo $records["fldname"]; ?></option>
          <?php }
          ?>
      </select>
    </div>
    <div id="changetype" style="display:flex; width:100%;">

    <div class="percentage">
      <label>rename</label>
      <input type="text" class="input" placeholder="give the name of the room" id="namefilter" name="" value="">
    </div>
    <div class="percentage">

      <label>type</label>
      <select id="typeselect" onchange="checkaddfilter();"placeholder="ja" data-native-menu="false">
        <option value="clear"><i class="fas fa-home"></i></option>
          <?php
          $all = $dbh->prepare("SELECT * FROM sorting;");
          $all->execute();
          while($records = $all->fetch(PDO::FETCH_ASSOC)){ ?>
            <option value="<?php echo $records["SortingID"]; ?>"><?php echo $records["fldSorting"]; ?></option>
          <?php }
          ?><option value="addselect">add to filter</option>
      </select>
    </div><div class="percentage" style="display:none" id="invisible">
    <div id="selectselectbox"></div></div>
    <div class="percentage">
      <a href=""><i class="fas fa-check" onclick="modifyfilter();" style="width:3em;height:6em;"></i></a>
      <a href=""><i onclick="deletefilter();"class="fas fa-trash-alt" style="width:3em;height:6em;"></i></a>
    </div>
  </div>
</div>


<?php }
elseif(isset($_GET["state"]) and $_GET["state"] === "false"){ ?>
  <div id="filterload" class="flexing">
    <div class="percentage">
      <label>Name</label>
      <input type="text" class="input" placeholder="give the name of the room" id="namefilter" name="" value="">
    </div>
    <div class="percentage">
      <label>type</label>
      <select id="typeselect"  placeholder="ja" data-native-menu="false">
        <option value="house"><i class="fas fa-home"></i></option>
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
elseif(isset($_GET["state"]) and $_GET["state"] === "select"){
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

  </select>
  <?php }
  elseif(isset($_GET["loadfiltersetup"])){
    $setup = $dbh->prepare("SELECT * FROM details WHERE DetailsID = ".$_GET["loadfiltersetup"]);
    $setup->execute();
    $setupdata = $setup->fetch(PDO::FETCH_ASSOC);
      ?>

        <div class="percentage">
          <label>rename</label>
          <input type="text" class="input" placeholder="give the name of the room" id="namefilter" name="" value="<?php echo $setupdata["fldname"]?>">
        </div>
        <div class="percentage">

          <label>type</label>
          <select id="typeselect" onchange="checkaddfilter();"placeholder="ja" data-native-menu="false">
            <option value="house"><i class="fas fa-home"></i></option>
              <?php
              $all = $dbh->prepare("SELECT * FROM sorting;");
              $all->execute();
              $gotit = 0;
              while($records = $all->fetch(PDO::FETCH_ASSOC)){
                if($setupdata["SortingID"] == $records["SortingID"]){ ?>
                  <option selected value="<?php echo $records["SortingID"]; ?>"><?php echo $records["fldSorting"]; ?></option>

                <?php $gotit++ ; }
                else{
                ?>
                <option value="<?php echo $records["SortingID"]; ?>"><?php echo $records["fldSorting"]; ?></option>
              <?php }}
              if($gotit >= 1){
                ?><option value="addselect">add to filter</option>

              <?php }
              else{
                ?><option selected value="addselect">add to filter</option>

              <?php } ?>
          </select>
        </div><div class="percentage" style="display:none" id="invisible">
        <div id="selectselectbox"></div></div>
        <div class="percentage">
          <a href=""><i class="fas fa-check" onclick="modifyfilter();" style="width:3em;height:6em;"></i></a>
          <a href=""><i onclick="deletebuilding();"class="fas fa-trash-alt" style="width:3em;height:6em;"></i></a>
        </div> <?php
  }
  elseif(isset($_GET["statebuilding"])){
    if($_GET["statebuilding"] === "true"){  ?>
      <div class="flexing">
        <div class="percentage">
          <label>house</label>
          <select id="buildingselect" onchange="loadbuildingname();"placeholder="ja" data-native-menu="false">
            <option value="house"><i class="fas fa-home"></i></option><?php
            $getbuildings = $dbh->prepare("SELECT * FROM building");
            $getbuildings->execute();
            while($records = $getbuildings->fetch(PDO::FETCH_ASSOC)){ ?>
              <option value="<?php echo $records["BuildingID"] ?>"><?php echo $records["fldName"] ?></option>
          <?php  }
            ?>
          </select>
        </div>

        <div class="percentage">
          <div id="buildingname">
            <label>Name</label>
            <input type="text" class="input" placeholder="give the building a name" id="namebuilding" name="" value="">
          </div>
        </div>

        <div class="percentage">
          <a href=""><i class="fas fa-check" onclick="modifybuilding();" style="width:3em;height:6em;"></i></a>
          <a href=""><i onclick="deletefilter();"class="fas fa-trash-alt" style="width:3em;height:6em;"></i></a>
        </div>
      </div>
  <?php     }
  else{
      ?>
    <div class="flexing">
      <div class="percentage">
        <label>Name</label>
        <input type="text" class="input" placeholder="give the building a name" id="namebuilding" name="" value="">
      </div>
      <div class="percentage">
        <label>Add</label>
        <input type="button" onclick="addbuilding();" class="input" id="addbuilding" name="" value="Add new filter">
      </div>
    </div>
  <?php }}
  elseif(isset($_GET["buildingnameload"])){
    $getname = $dbh->prepare("SELECT fldName FROM building WHERE BuildingID = ".$_GET["buildingnameload"]);
    $getname->execute();
    $name = $getname->fetch(PDO::FETCH_ASSOC);
    ?>

      <label>Name</label>
      <input type="text" class="input" placeholder="give the building a name" id="namebuilding" name="" value="<?php echo $name["fldName"] ?>">

<?php  }

?>
