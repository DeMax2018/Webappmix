<head>
 <script type="text/javascript" src="js1.js">


 </script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.js"></script>
</head>
<div id="filters">


<?php
include"conn.php";

$values = array(1 => "text", 2 => "number", 3 => "list", 4 => "yes/no");
$alldetails = $dbh->prepare("SELECT * FROM details;");
$alldetails->execute();
while($details = $alldetails->fetch(PDO::FETCH_ASSOC)){
  if($details["SortingID"] == 1){ ?>
    <input type="text" id="<?php echo $details["fldname"]; ?>" placeholder="hoeveel <?php echo $details["fldname"]; ?> wil u?" id="<?php echo $values[$details["sortingID"]]; ?>" value="">
  <?php }
  elseif($details["SortingID"] == 2){ ?>
    <input type="number" id="<?php echo $details["fldname"]; ?>" value="">
  <?php }
  elseif($details["SortingID"] == 3){ ?>
    <select  id="<?php echo $details["fldname"]; ?>" value=""></select>
  <?php }
  elseif($details["SortingID"] == 4){ ?>
    <input type="checkbox" id="<?php echo $details["fldname"]; ?>" value="">
  <?php }
}



?>
</div>
<button type="button" onclick="looking();" name="button">test</button>
<div id="fill">

</div>
