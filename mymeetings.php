<?php
include"conn.php";
session_start();
$_SESSION["eventtype"] = "mymeetings";
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Events</title>
  <link rel="shortcut icon" type="image/png" href="images/flavicon.jpg"/>
  <link rel="stylesheet" type="text/css" href="../css/bulma.css">
  <script type="text/javascript" src="js1.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/aside.css">
  <link rel="stylesheet" type="text/css" href="../css/grid-gallery.css">
  <link rel="stylesheet" type="text/css" href="css/nav.css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.js"></script>
<style media="screen">
.imageindex{
  width: 50em !important;
  height: 20em !important;
}
img {

  top: 25px;
  left: 25px;
}
.imgA1 {
  float: left;
      z-index: 1;
      width: 50em !important;
      height: 20em !important;
}
.imgB1 {
  width: 50em !important;
height: 20em !important;
margin-top: -20em;
z-index: 10000;
}
</style>
  <script defer src="https://use.fontawesome.com/releases/v5.0.4/js/all.js"></script>
</head>
<body onload="eventsearch();">
    <?php include"phpscripts/navbar.php"; ?>
    <div class="content column is-9">
      <div class="content column is-9-nav nav-aside is-hidden-touch is-hidden-desktop-only">

        <span class="aside-toggle is-marginless">
          <span></span>
          <span></span>
          <span></span>
        </span>
        <ul class="ulsearch nobullets isflex justify_stuff">

          <div class="search">
            <span class="fa fa-search"></span>
            <input id="search" onkeyup='eventsearch();' placeholder="Search term">

          </div>
        </ul>
      </div>
      <div id="events" class="section scroll things">


        </div>


      </div>
    </div>
  </div>

  <script async type="text/javascript" src="../js/bulma.js"></script>
<?php include"phpscripts/footer.php"; ?>
</body>
</html>
