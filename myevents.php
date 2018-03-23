<?php
include"conn.php";
session_start();
$_SESSION["eventtype"] = "myevents";
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
      <div class="secondsubcontainer">
        <ul class="ulsearch nobullets isflex justify_stuff">
          <div class="search">
      <span class="fa fa-search"></span>
      <input id="searchmobile" onkeyup='eventsearch();' placeholder="Search term">
    </div>
        </ul>
      </div>

      <div class="nav-right nav-menu is-hidden-widescreen" id="nav-menu">
        <div class="fixit">
          <div class="sectionfix">
            <a href="#" class="item active"><span class="icon"><i class="fa fa-calendar-alt"></i></span><span class="name">Events</span></a>
          </div>
          <div class="sectionfix">
            <a href="#" class="item"><span class="icon"><i class="fa fa-users"></i></span><span class="name">My meetings</span></a>
          </div>
          <div class="sectionfix">
            <a href="#" class="item"><span class="icon"><i class="fa fa-calendar-check"></i></span><span class="name">My events</span></a>
          </div>
          <div class="sectionfix">
            <a href="#" class="item"><span class="icon"><i class="fa fa-calendar-plus"></i></span><span class="name">Make an event</span></a>
          </div>
          <div class="sectionfix">
            <a href="#" class="item"><span class="icon"><i class="fas fa-building"></i></span><span class="name">Book a room</span></a>
          </div>
          <div class="sectionfix">
            <a href="#" class="item"><span class="icon"><i class="fa fa-calendar-alt"></i></span><span class="name">Event management</span></a>
          </div>
        </div>
        <div class="fixit">
          <div class="sectionfix">
            <a href="#" class="item active"><span class="icon"><i class="fa fa-user"></i></span><span class="name">Account management</span></a>
          </div>
          <div class="sectionfix">
            <a href="#" class="item"><span class="icon"><i class="fas fa-building"></i></span><span class="name">Room & building management</span></a>
          </div>
        </div>
      </div>
    </div>
  </nav>
  <div class="columns columnsaside">
    <aside class="column is-3 aside hero is-fullheight is-hidden-touch is-hidden-desktop-only">
      <div class="fixleft">
        <div class="account has-text-centered">
          <a href="changeuserinfo.php">
            <figure class="avatar">
              <img src="images/avatar.png">
            </figure>
          </a>
        </div>
        <div class="main">
          <div class="title"><i class="fas fa-home"></i>   Main</div>
          <a href="index.php" class="item active"><span class="icon"><i class="fa fa-calendar-alt"></i></span><span class="name">Events</span></a>
          <a href="#" class="item"><span class="icon"><i class="fa fa-users"></i></span><span class="name">My meetings</span></a>
          <a href="#" class="item"><span class="icon"><i class="fa fa-calendar-check"></i></span><span class="name">My events</span></a>
          <a href="middleman.php?request=event" class="item"><span class="icon"><i class="fa fa-calendar-plus"></i></span><span class="name">Make an event</span></a>
          <a href="middleman.php" class="item"><span class="icon"><i class="fas fa-building"></i></span><span class="name">Book a room</span></a>
          <a href="#" class="item"><span class="icon"><i class="fa fa-calendar-alt"></i></span><span class="name">Event management</span></a>
        </div>
        <div class="main">
          <div class="title"><i class="fa fa-cog"></i>  Admin</div>
          <a href="admin.php#account" class="item link1"><span class="icon"><i class="fa fa-user"></i></span><span class="name">Account management</span></a>
          <a href="#" class="item link2"><span class="icon"><i class="fas fa-building"></i></span><span class="name">Room & building management</span></a>
        </div>
      </div>
    </aside>
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

</body>
</html>
