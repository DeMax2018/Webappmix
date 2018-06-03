<?php
include"conn.php";
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/png" href="images/flavicon.jpg"/>
  <title>Info</title>
  <link rel="stylesheet" type="text/css" href="../css/bulma.css">
  <script type="text/javascript" src="js1.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/aside.css">
  <link rel="stylesheet" type="text/css" href="../css/grid-gallery.css">
  <link rel="stylesheet" type="text/css" href="css/nav.css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.js"></script>
<style media="screen">
body{
  top:0 !important;
}
</style>
  <script defer src="https://use.fontawesome.com/releases/v5.0.4/js/all.js"></script>
</head>
<body>

  <?php include"phpscripts/navbar.php"; ?>

    <div class="content column is-9">
      <div class="content column is-9-nav nav-aside is-hidden-touch is-hidden-desktop-only">

        <span class="aside-toggle is-marginless">
          <span></span>
          <span></span>
          <span></span>
        </span>

      </div>

    </div>
  </div>
  <header style="margin-top: 2em;
text-align: center;
font-size: 4em;">
 Terms of service
  </header>
  <article class="articletermsofservice">
    chapter one
  </article>
  <script async type="text/javascript" src="../js/bulma.js"></script>
<?php include"phpscripts/footer.php"; ?>
</body>
</html>
