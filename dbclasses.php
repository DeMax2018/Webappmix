<?php


class classes
{

  public function secure($string)
  {
    $clean = strip_tags($string);
    $clean = htmlspecialchars($clean, ENT_QUOTES,"UTF-8");
    return $clean;
  }
  public function crypting( $string, $action = 'e' )
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

      return $output;
  }
  public function qrcode($code){
    include "BarcodeQR.php";
    $qr = new BarcodeQR();
    $hash = hash('ripemd160', $code);
    $hashish = hash('tiger192,3',$hash);
    echo $hashish;
    $qr->url("https://swfactory.be/testingarea?code=".$hashish);
    $qr->draw(300,"jaa");
  }
  public function hashish($text){
    $hash = hash('ripemd160', $text);
    $hashish = hash('tiger192,3',$hash);
    return $hashish;
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
}

?>
