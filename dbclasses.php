<?php

include "db.php";
include "parameters.php";

class Sqlquery
{
  function Inserting($table,$fields,$values)
  {
    $field = "";
    $fieldcount = 0;
    foreach ($fields as $fieldparam){
      ++$fieldcount;
      $fieldparam = "field".$fieldcount;
      if(empty($field)){$field .= "'$fieldparam'";}
      else{$field .= ",'$fieldparam'";}
    }
    $data = "";
    $datacount = 0;
    foreach ($values as $value)
    {
      ++$datacount;
      $fieldparam = "field".$fieldcount;
      if(empty($data)){$data .= "'$fieldparam'";}
      else{$data .= ",'$fieldparam'";}
    }


    $insertquery = $conn->prepare("INSERT INTO $table ($field) values ($data)");
    $insertquery->execute(array(
    "fname" => "Bob",
    "sname" => "Desaunois",
    "age" => "18"
    ));
  }
  // This function needs 3 arguments (array_of_all_selected_fields,table,array_of_having/Where)
  // the where array needs to be like this array("name"=>"value")
  // the ordervalue array needs to be a normal array("value")
  // for a single table select we use this method for more efficient coding
  // we use 1 in orderby to order by desc and
  function SingleSelect($selects,$table,$where,$orderby = NULL,$ordervalue = NULL)
  {
    $selectdata = "";
    $suffix = "";
    $prefix = "";
    $result = array();
    if($selects === "*"){}
    else
    {
    foreach($selects as $data)
    {
      if(empty($selectdata)){$selectdata .= $data;}
      else{$selectdata .= ", $data";}
    }
    }
    $wheredata = ;
    foreach($where as $name => $value)
    {
        if(empty($Wheredata)){$Wheredata = "$name = $value";}
        else{$wheredata .= " AND $name = $value";}
    }
    switch($orderby)
    {
      case 1:
          $suffix = " DESC";
        break;
    }
    $if(!is_null($orderby))
    {
      foreach($ordervalue as $order)
      {
        if(empty($prefix)){$prefix .= " ORDER BY "$order}
        else{$prefix .= ", $order";}
      }
    }
    $insertquery = $conn->prepare("SELECT $selectdata FROM $table WHERE $wheredata $prefix $suffix");
    foreach($conn->query($insertquery) as $row)
    {
      $result .=
    }
    return $result;
  }

}

class classes
{
  public function secure($string)
  {
    $clean = strip_tags($string);
    $clean = htmlspecialchars($clean, ENT_QUOTES,"UTF-8",);
    return $clean;
  }
  function crypting( $string, $action = 'e' )
  {
      // you may change these values to your own
      $secret_key = 'my_simple_secret_key';
      $secret_iv = 'my_simple_secret_iv';

      $output = false;
      $encrypt_method = "AES-256-CBC";
      $key = hash( 'sha256', $secret_key );
      $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );

      if( $action == 'e' ) {
          $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
      }
      else if( $action == 'd' ){
          $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
      }
      echo $output;
      return $output;
  }
  
}



?>
