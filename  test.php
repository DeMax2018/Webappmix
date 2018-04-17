<?php
$array1 = array("ik","jij");
$array2 = array("ik","ikke");

if(!assert(array_intersect($array1, $array2))){
  echo "yes";
}
else{
  echo "false";
}

?>
