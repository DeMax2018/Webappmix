<?php


class classes
{

  public function secure($string)
  {
    $clean = strip_tags($string);
    $clean = htmlspecialchars($clean, ENT_QUOTES,"UTF-8");
    return $clean;
  }

  public function qrcode($code){
    include "BarcodeQR.php";
    $qr = new BarcodeQR();
    $qr->url("https://swfactory.be/testingarea?code=".$code);
    $qr->draw(300,"ticket");
  }
  public function registerhash($text){
    $size = mcrypt_get_iv_size(MCRYPT_CAST_256, MCRYPT_MODE_CFB);
    $iv = mcrypt_create_iv($size, MCRYPT_DEV_RANDOM);
    $text .= $iv;
    $hash = hash('tiger192,3', $text);
    $returnarray = array($hash,$iv);
    return $returnarray;
  }
  public function hashish($text,$salt){
    $text .= $salt;
    $hash = hash('tiger192,3', $text);
    return $hash;
  }
  public function changeprofile(){
    $sql = $dbh->prepare("UPDATE user set fldName = ? and fldLastname = ? and fldMail = ?");
    $sql->bindValue(1,$_POST["name"],PDO::PARAM_STR);
    $sql->bindValue(2,$_POST["lastname"],PDO::PARAM_STR);
    $sql->bindValue(3,$_POST["mail"],PDO::PARAM_STR);
    $sql->execute();
  }
  public function eventdetails($id){
    include "conn.php";
    $data = $dbh->prepare("SELECT OwnerID FROM ticket WHERE EventID = ? ");
    $data->bindValue(1,$id,PDO::PARAM_STR);
    $num = 1;
    $arr = array();
    $data->execute();
    while ($rows = $data->fetch(PDO::FETCH_ASSOC)) {
      $user = $dbh->prepare("SELECT fldName, fldLastname FROM user Where UserID = ".$rows["OwnerID"]);
      $user->execute();
      $username = $user->fetch(PDO::FETCH_ASSOC);
      array_push($arr," ".$num." => ".$username["fldName"]." ".$username["fldLastname"]);
      $num++;
    }
    return json_encode($arr);
  }
  public function userdetails($id){
    include "conn.php";
    $data = $dbh->prepare("SELECT * FROM user WHERE UserID = ? ");
    $data->bindValue(1,$id,PDO::PARAM_STR);
    $num = 1;
    $data->execute();
    $rows = $data->fetch(PDO::FETCH_ASSOC);
    $arr = array("firstname" => $rows["fldName"], "lastname" => $rows["fldLastname"], "mail" => $rows["fldMail"], "tele" => $rows["fldTele"], "city" => $rows["fldCity"], "street" => $rows["fldStreet"]
    , "number" => $rows["fldNumber"]);
    $num++;
    return json_encode($arr);
  }
  public function pageauth($name){
    error_reporting(0);
    require_once"parameters.php";
    $auth = new router();
    switch ($name) {
      case "admin":
        if(!assert(array_intersect($_SESSION["auth"], $auth->admin)) and $_SESSION["acces"] != 1){
          header("location: index.php");
        }
        break;
      default:
        break;
    }
  }
}

?>
