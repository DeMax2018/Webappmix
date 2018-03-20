<?php
include"conn.php";
include "dbclasses.php";
$rekt = new classes();
print_r(json_decode($rekt->userdetails(1)));
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.0/css/bulma.min.css" integrity="sha256-HEtF7HLJZSC3Le1HcsWbz1hDYFPZCqDhZa9QsCgVUdw=" crossorigin="anonymous" />
  <link rel="stylesheet" type="text/css" href="../css/login.css">
  <script defer="" src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>

</head>
<body>
  <nav class="nav is-dark has-shadow is-hidden-tablet" id="top">
    <div class="container">
      <div class="subcontainer">
        <span class="nav-toggle">
          <span></span>
          <span></span>
          <span></span>
        </span>
      </div>
      <div class="secondsubcontainer">
        <ul class="ulsearch nobullets isflex justify_stuff">
          <div class="search">
      <span class="fa fa-search"></span>
      <input placeholder="Search term">
    </div>
        </ul>
      </div>

      <div class="nav-right nav-menu is-hidden-tablet">
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
            <a href="#" class="item"><span class="icon"><i class="fa fa-plus"></i></span></a>
          </div>
          <div class="sectionfix">
            <a href="#" class="item"><span class="icon"><i class="fa fa-calendar-check"></i></span><span class="name">Event management</span></a>
          </div>
        </div>
        <div class="fixit">
          <div class="sectionfix">
            <a href="#" class="item"><span class="icon"><i class="fa fa-exclamation"></i></span><span class="name">Newsfeed</span></a>
          </div>
          <div class="sectionfix">
            <a href="#" class="item active"><span class="icon"><i class="fa fa-user"></i></span><span class="name">Account management</span></a>
          </div>
          <div class="sectionfix">
            <a href="#" class="item"><span class="icon"><i class="fa fa-users"></i></span><span class="name">Meeting management</span></a>
          </div>
        </div>
        <div class="fixit">
          <div class="sectionfix">
            <a href="#" class="item"><span class="icon"><i class="fa fa-exclamation"></i></span><span class="name">Admin newsfeed</span></a>
          </div>
        </div>

      </div>
    </div>
  </nav>
  <div class="columns columnsaside">
    <aside class="column is-3 aside hero is-fullheight is-hidden-mobile">
      <div class="fixleft">
        <div class="account has-text-centered">
          <a href="#">
            <figure class="avatar">
              <img src="images/avatar.png">
            </figure>
          </a>
        </div>
        <div class="main">
          <div class="title">Main</div>
          <a href="index.php" class="item active"><span class="icon"><i class="fa fa-calendar-alt"></i></span><span class="name">Events</span></a>
          <a href="#" class="item"><span class="icon"><i class="fa fa-users"></i></span><span class="name">My meetings</span></a>
          <a href="#" class="item"><span class="icon"><i class="fa fa-calendar-check"></i></span><span class="name">My events</span></a>
          <a href="eventcreate.php" class="item"><span class="icon"><i class="fa fa-calendar-plus"></i></span><span class="name">Make an event</span></a>
          <a href="#" class="item"><span class="icon"><i class="fa fa-calendar-alt"></i></span><span class="name">Event management</span></a>
        </div>
        <div class="main">
          <div class="title"><i class="fa fa-cog"></i>  Admin</div>
          <a href="admin.php#account" class="item link1"><span class="icon"><i class="fa fa-user"></i></span><span class="name">Account management</span></a>
          <a href="#" class="item link2"><span class="icon"><i class="fa fa-users"></i></span><span class="name">Meeting management</span></a>
          <a href="#" class="item link3"><span class="icon"><i class="fa fa-exclamation"></i></span><span class="name">Newsfeed</span></a>
          <a href="#" class="item link4"><span class="icon"><i class="fa fa-exclamation"></i></span><span class="name">Admin newsfeed</span></a>
        </div>
      </div>
    </aside>
    <div class="content column is-9">
      <div class="content column is-9-nav nav-aside">

        <span class="aside-toggle is-marginless">
          <span></span>
          <span></span>
          <span></span>
        </span>
        <ul class="ulsearch nobullets isflex justify_stuff is-hidden-mobile">


        </ul>
      </div>
      <div class="section scroll things">


          </div>
          <div class="container has-text-centered">
            <div class="column is-6 is-offset-3">
              <h3 class="title has-text-grey">Hello</h3>
              <p class="subtitle has-text-grey">Nick Langens.</p>
              <div class="box">
                <figure class="avatar">
                  <img src="https://scontent-bru2-1.xx.fbcdn.net/v/t1.0-0/c0.0.370.370/p370x247/17883869_1345363715543977_8571915909483184139_n.jpg?oh=ff6c75249174694d61a093f03ace7170&oe=5B3A9D7D" style="max-width: 168px; max-height: 168px; min-width: 168px; min-height: 168px;">
                </figure>
                <form>
                  <!-- colums for showing name -->
                  <div class="columns">
                    <div class="column is-half">
                      <div class="field">
                        <div class="control">
                          <input class="input is-large" type="text" placeholder="Nick" autofocus="">
                        </div>
                      </div>
                    </div>
                    <div class="column">
                      <div class="field">
                        <div class="control">
                          <input class="input is-large" type="text" placeholder="Langens">
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- colums for showing tel + email -->
                  <div class="field">
                    <div class="control has-icons-left">
                      <input class="input is-large" type="email" placeholder="Nicklangens@hotmail.com" autofocus="">
                      <span class="icon is-left">
                        <i class="fas fa-envelope"></i>
                      </span>
                    </div>
                  </div>
                  <div class="field">
                    <div class="control has-icons-left">
                      <input class="input is-large" type="tel" placeholder="Telephone number" autofocus="">
                      <span class="icon is-left">
                        <i class="fas fa-phone-square"></i>
                      </span>
                    </div>
                  </div>
            <!-- colums for showing personal adress -->
                  <div class="columns">
                    <div class="column is-9">
                      <div class="field">
                        <div class="control">
                          <input class="input is-large" type="text" placeholder="City" autofocus="">
                        </div>
                      </div>
                    </div>
                    <div class="column">
                      <div class="field">
                          <div class="control">
                            <input class="input is-large" type="text" placeholder="Postcode" autofocus="">
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="columns">
                    <div class="column is-10">
                      <div class="field">
                          <div class="control">
                            <input class="input is-large" type="text" placeholder="Street" autofocus="">
                          </div>
                      </div>
                    </div>
                    <div class="column">
                      <div class="field">
                          <div class="control">
                            <input class="input is-large" type="text" placeholder="Nr" autofocus="">
                          </div>
                      </div>
                    </div>
                  </div>

                  <button class="button is-block is-info is-large is-fullwidth"> change </button>
                </form>
              </div>
            </div>
          </div>
        </div>


      </div>
    </div>
  </div>

  <script async type="text/javascript" src="../js/bulma.js"></script>

</body>
</html>
