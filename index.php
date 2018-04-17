<?php
include"conn.php";
session_start();
$_SESSION["eventtype"] = "index";

 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Events</title>
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
  <nav class="nav is-dark has-shadow is-hidden-widescreen" id="top">
    <div class="container">
      <div class="subcontainer">
        <span class="nav-toggle" id="nav-toggle">
          <span></span>
          <span></span>
          <span></span>
        </span>
      </div>
      <div class="thirdsubcontainer">
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i></a>
        <a href="<?php if(isset($_SESSION["name"])){echo "changeuserinfo.php";}else{echo "login.php";} ?>"><?php if(isset($_SESSION["name"])){echo $_SESSION["name"];}else{echo "login";} ?></a>
      </div>

      <div class="nav-right nav-menu is-hidden-widescreen" id="nav-menu">
        <div class="fixit">
          <div class="sectionfix">
            <a href="index.php" class="item active"><span class="icon"><i class="fa fa-calendar-alt"></i></span><span class="name">Events</span></a>
          </div>
          <?php if(isset($_SESSION["userid"])){ ?>
          <div class="sectionfix">
            <a href="mymeetings.php" class="item"><span class="icon"><i class="fa fa-users"></i></span><span class="name">My meetings</span></a>
          </div>
          <?php } ?>
          <?php if(isset($_SESSION["userid"])){ ?>
          <div class="sectionfix">
            <a href="myevents.php" class="item"><span class="icon"><i class="fa fa-calendar-check"></i></span><span class="name">My events</span></a>
          </div>
        <?php } ?>
        <?php if(isset($_SESSION["create"]) and $_SESSION["create"] == 1){ ?>
          <div class="sectionfix">
            <a href="middleman.php?request=event" class="item"><span class="icon"><i class="fa fa-calendar-plus"></i></span><span class="name">Make an event</span></a>
          </div>
        <?php } ?>
        <?php if(isset($_SESSION["userid"])){ ?>
          <div class="sectionfix">
            <a href="middleman.php" class="item"><span class="icon"><i class="fas fa-building"></i></span><span class="name">Book a room</span></a>
          </div>
          <?php } ?>
        </div>
        <div class="fixit">
          <?php if(isset($_SESSION["acces"]) and $_SESSION["acces"] == 1){ ?>
          <div class="sectionfix">
            <a href="admin.php" class="item active"><span class="icon"><i class="fa fa-user"></i></span><span class="name">Account management</span></a>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </nav>
  <div class="columns columnsaside">
    <aside class="column is-3 aside hero is-fullheight is-hidden-touch is-hidden-desktop-only">
      <div class="fixleft">
        <div class="account has-text-centered">
          <?php
          if(isset($_SESSION["userid"])){ ?>
            <a href="changeuserinfo.php">
              <figure class="avatar">
                <img src="profilepics/<?php if(is_null($_SESSION["profilepic"])){ echo "avatar.png"; }else{ echo $_SESSION["profilepic"]; }?>">
      <?php    }
          else{ ?>
            <a href="login.php">
              <figure class="avatar">
                <img src="images/avatar.png">
        <?php  }
          ?>

            </figure>
          </a>
          <?php
          if(isset($_SESSION["userid"])){ ?>
            <a href="logout.php" style="float: right; font-size:50px;"><i class="fas fa-sign-out-alt" style="    position: absolute;font-size: 32px; margin-top: -1em; margin-left: -0.5em;"></i></a>
          <?php } ?>
        </div>
        <div class="main">
          <div class="title"><i class="fas fa-home"></i>   Main</div>
          <a href="index.php" class="item active"><span class="icon"><i class="fa fa-calendar-alt"></i></span><span class="name">Events</span></a>
          <?php if(isset($_SESSION["userid"])){ ?>
          <a href="mymeetings.php" class="item"><span class="icon"><i class="fa fa-users"></i></span><span class="name">My meetings</span></a>
          <?php } ?>
          <?php if(isset($_SESSION["userid"])){ ?>
          <a href="myevents.php" class="item"><span class="icon"><i class="fa fa-calendar-check"></i></span><span class="name">My events</span></a>
          <?php } ?>
          <?php if(isset($_SESSION["create"]) and $_SESSION["create"] == 1){ ?>
          <a href="middleman.php?request=event" class="item"><span class="icon"><i class="fa fa-calendar-plus"></i></span><span class="name">Make an event</span></a>
          <?php } ?>
          <?php if(isset($_SESSION["userid"])){ ?>
          <a href="middleman.php" class="item"><span class="icon"><i class="fas fa-building"></i></span><span class="name">Book a room</span></a>
          <?php } ?>
        </div>
        <?php if(isset($_SESSION["acces"]) and $_SESSION["acces"] == 1){ ?>
        <div class="main">
          <div class="title"><i class="fa fa-cog"></i>  Admin</div>
          <a href="admin.php" class="item link1"><span class="icon"><i class="fa fa-user"></i></span><span class="name">Account management</span></a>
        </div>
        <?php } ?>
      </div>
    </aside>
    <div class="content column is-9">
      <div class="content column is-9-nav nav-aside is-hidden-touch is-hidden-desktop-only">

        <span class="aside-toggle is-marginless">
          <span></span>
          <span></span>
          <span></span>
        </span>

      </div>
      <ul class="ulsearch nobullets isflex justify_stuff things">

        <div class="search">
          <span class="fa fa-search"></span>
          <input id="search" onkeyup='eventsearch();' placeholder="Search term">

        </div>
      </ul>
      <div id="events" class="section">


        </div>


      </div>
    </div>
  </div>

  <script async type="text/javascript" src="../js/bulma.js"></script>

</body>
</html>
