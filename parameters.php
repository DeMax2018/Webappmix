<?php

class dbparameters
{
   /*public $dbname = "swfactory_tenerife";
   public $dbusern = "swfactory";
   public $dbhost = "185.56.145.147";
   public $dbpass = "n)T&V7yZEJ;]";
   public $charset = "utf8";

   public $dbname = "id5144602_cifpcmreservation";
   public $dbusern = "id5144602_cifpcmreservation";
   public $dbhost = "localhost";
   public $dbpass = "CIFPCM234";
   public $charset = "utf8";
   */
   public $dbname = "real_tenerife";
   public $dbusern = "root";
   public $dbhost = "localhost";
   public $dbpass = "";
   public $charset = "utf8";
}
class router
{
  public $admin = array("admin");
  public $createroom = array("admin","teacher","user");
  public $myevents = array("admin","teacher","user");
  public $mymeetings = array("admin","teacher","user");
  public $changeuserinfo = array("admin","teacher","user");
  public $event = array("admin","teacher");
  public $rent = array("admin","teacher","user");
}

?>
