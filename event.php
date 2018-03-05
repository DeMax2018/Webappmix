<?php
session_start();

include"dbclasses.php";

?>
<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>event</title>
      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
      <script type="text/javascript" src="jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="jquery-ui-1.12.1/jquery-ui.js"></script>
      <script type="text/javascript" src="js1.js"></script>
      <link rel="stylesheet" href="css/slider.css">
      <link rel="stylesheet" href="css/event.css">
      <link rel="stylesheet" type="text/css" href="../css/bulma.css">
      <link rel="stylesheet" type="text/css" href="../css/grid-gallery.css">
      <link rel="stylesheet" href="css/nav.css">


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

        <script async type="text/javascript" src="../js/bulma.js"></script>
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
          <a href="#" class="item"><span class="icon"><i class="fa fa-calendar-check"></i></span><span class="name">Event management</span></a>
            </div>
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
            <a href="#" class="item active"><span class="icon"><i class="fa fa-calendar-alt"></i></span><span class="name">Events</span></a>
            <a href="#" class="item"><span class="icon"><i class="fa fa-users"></i></span><span class="name">My meetings</span></a>
            <a href="#" class="item"><span class="icon"><i class="fa fa-calendar-check"></i></span><span class="name">My events</span></a>
            <a href="#" class="item"><span class="icon"><i class="fa fa-calendar-alt"></i></span><span class="name">Make an event</span></a>
            <a href="#" class="item"><span class="icon"><i class="fa fa-calendar-check"></i></span><span class="name">Event management</span></a>
            <a href="#" class="item"><span class="icon"><i class="fa fa-exclamation"></i></span><span class="name">Newsfeed</span></a>
          </div>
          <div class="main">
            <div class="title"><i class="fa fa-cog"></i>  Admin</div>
            <a href="#" class="item active"><span class="icon"><i class="fa fa-user"></i></span><span class="name">Account management</span></a>
            <a href="#" class="item"><span class="icon"><i class="fa fa-users"></i></span><span class="name">Meeting management</span></a>
            <a href="#" class="item"><span class="icon"><i class="fa fa-exclamation"></i></span><span class="name">Admin newsfeed</span></a>
          </div>
        </div>
      </aside>
      <div class="column is-9">
        <div class="tile is-ancestor">
          <div class="tile is-vertical is-8">
            <div class="tile">
              <div class="tile is-parent is-vertical">
                <article class="tile is-child box">
                  <div onclick="mailevent();" class="button right">
                    Participate
                  </div>
                  <p name="1" class="title">Name event</p>
                  <p class="subtitle">By name creator</p>
                  <p class="subtitle">Date</p>
                </article>
                <article class="tile is-child box">
                  <ul class="rslides">
                    <li><img src="img/001.jpg" alt=""></li>
                    <li><img src="img/002.jpg" alt=""></li>
                    <li><img src="img/003.jpg" alt=""></li>
                  </ul>
                  <script>
                    $(function() {
                      $(".rslides").responsiveSlides({
                        auto: true,             // Boolean: Animate automatically, true or false
                        speed: 500,            // Integer: Speed of the transition, in milliseconds
                        timeout: 4000,          // Integer: Time between slide transitions, in milliseconds
                        pager: true,           // Boolean: Show pager, true or false
                        nav: true,             // Boolean: Show navigation, true or false
                        random: false,          // Boolean: Randomize the order of the slides, true or false
                        pause: false,           // Boolean: Pause on hover, true or false
                        pauseControls: false,    // Boolean: Pause when hovering controls, true or false
                        prevText: "",   // String: Text for the "previous" button
                        nextText: "",       // String: Text for the "next" button
                        maxwidth: "",           // Integer: Max-width of the slideshow, in pixels
                        navContainer: "",       // Selector: Where controls should be appended to, default is after the 'ul'
                        manualControls: "",     // Selector: Declare custom pager navigation
                        namespace: "centered-btns",   // String: Change the default namespace used
                        before: function(){},   // Function: Before callback
                        after: function(){}     // Function: After callback
                      });
                    });
                  </script>
                </article>
              </div>
            </div>
          </div>
          <div class="tile is-vertical">
            <div class="tile">
              <div class="tile is-parent is-vertical">
                <article class="tile is-child box">
                  <p class="title">Location</p>
                  <div id="map" style="width:100%;height:250px;"></div>
                  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAvbFr_xsKp828ki4MZj5mM_VUVtyjGmWk&callback=myMap"></script>
                </article>
                <article class="tile is-child box">
                  <p class="title">Participants</p>
                  <p class="subtitle">amount participants</p>
                  <div class="content participants">
                    <ul>
                      <?php
                      $data = new classes();
                      $load = json_decode($data->eventdetails(1));
                      foreach ($load as $value) {
                        echo $value;
                      }
                                           ?>
                      <li>Participant 1</li>
                      <li class="is-light">Participant 2</li>
                      <li>Participant 1</li>
                      <li class="is-light">Participant 2</li>
                      <li>Participant 1</li>
                      <li class="is-light">Participant 2</li>
                      <li>Participant 1</li>
                      <li class="is-light">Participant 2</li>
                      <li>Participant 1</li>
                      <li class="is-light">Participant 2</li>
                      <li>Participant 1</li>
                      <li class="is-light">Participant 2</li>
                      <li>Participant 1</li>
                      <li class="is-light">Participant 2</li>
                      <li>Participant 1</li>
                      <li class="is-light">Participant 2</li>
                      <li>Participant 1</li>
                      <li class="is-light">Participant 2</li>
                      <li>Participant 1</li>
                      <li class="is-light">Participant 2</li>
                    </ul>
                  </div>
                </article>
              </div>
            </div>
          </div>

        </div>
        <div class="tile is-ancestor">
          <div class="tile is-parent is-6">
            <article class="tile is-child box">
              <p class="title">Description</p>
              <div class="content">
                hiucoehiouivgchyruibczbcyuvecuy
              </div>
            </article>
            </div>
          <div class="tile is-parent">
            <article class="tile is-child box">
              <p class="title">Necessities</p>
              <div class="content">
                iucheicehuieghcuieicgeiciuiyuoheu
              </div>
            </article>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
