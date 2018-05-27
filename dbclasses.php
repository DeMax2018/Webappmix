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
    $salt = mcrypt_create_iv($size, MCRYPT_DEV_RANDOM);
    $text .= $salt;
    $hash = hash('tiger192,3', $text);
    $returnarray = array($hash,$salt);
    return $returnarray;
  }
  public function hashishnosalt($text){
    $hash = hash('tiger192,3', $text);
    return $hash;
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
  function uploadimage(){
    $test = "imageupload";
    $target_dir = "upload/";
    $target_file = $target_dir . basename($_FILES[$test]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES[$test]["tmp_name"]);
      if($check !== false) {
          echo "File is an image - " . $check["mime"] . ".";
          $uploadOk = 1;
      } else {
          echo "File is not an image.";
          $uploadOk = 0;
      }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    }
    // Check file size
    if ($_FILES[$test]["size"] > 5000000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }



    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
      $filename = str_replace(" ","",$target_file);
      if (move_uploaded_file($_FILES[$test]["tmp_name"],$filename )) {
          echo "The file ". basename( $_FILES[$test]["name"]). " has been uploaded.";
      } else {
          echo "Sorry, there was an error uploading your file.";
      }
    }
    return basename( $_FILES[$test]["name"]);
  }
  function convertime($input){
    switch (substr($input,-2)) {
      case 'AM':
        if(strlen($input) == 8){
          if(substr($input,0,2) == 12){
            $x = 0;
            $result = $x + (substr($input,3,2) * 60);
          }
          else{
            $result = (substr($input,0,2) * 3600) + (substr($input,3,2) * 60);
          }
        }
        else{
          $result = (substr($input,0,1) * 3600) + (substr($input,2,2) * 60);
        }
        break;
        case 'PM':
          if(strlen($input) == 8){
            if(substr($input,0,2) == 12){
              $result = (substr($input,0,2) * 3600) + (substr($input,3,2) * 60);
            }
            else{
              $result = (12 * 3600) + (substr($input,0,2) * 3600) + (substr($input,3,2) * 60);
            }
          }
          else{
            $result = (12 * 3600) + (substr($input,0,1) * 3600) + (substr($input,2,2) * 60);
          }
          break;
    }
    return $result;
  }
}
?>
