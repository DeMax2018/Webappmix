<?php
session_start();
include "conn.php";

include"dbclasses.php";
$_SESSION["eventid"] = $_GET["id"];
$getalldata = $dbh->prepare("SELECT * FROM event WHERE EventID = ".$_GET["id"]);
$getalldata->execute();
$alldata = $getalldata->fetch(PDO::FETCH_ASSOC);
$getauthor = $dbh->prepare("SELECT * FROM user WHERE UserID = ".$alldata["CreatorID"]);
$getauthor->execute();
$author = $getauthor->fetch(PDO::FETCH_ASSOC);
$gettimetable = $dbh->prepare("SELECT * FROM roomhours WHERE Room_HoursID = ".$alldata["Reservation"]);
$gettimetable->execute();
$timetable = $gettimetable->fetch(PDO::FETCH_ASSOC);
$getroomname = $dbh->prepare('SELECT Textawn FROM room_details WHERE Details = 4 and RoomID = '.$timetable["RoomID"]);
$getroomname->execute();
$roomname = $getroomname->fetch(PDO::FETCH_ASSOC);
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
      <script defer src="https://use.fontawesome.com/releases/v5.0.4/js/all.js"></script>
      <script type="text/javascript" src="js1.js"></script>
      <link rel="stylesheet" href="css/slider.css">
      <link rel="stylesheet" href="css/event.css">
      <link rel="stylesheet" type="text/css" href="../css/bulma.css">
      <link rel="stylesheet" type="text/css" href="../css/grid-gallery.css">
      <link rel="stylesheet" href="css/nav.css">
<script type="text/javascript">
function myMap() {
  var myCenter = new google.maps.LatLng(28.457315, -16.283084);
  var mapCanvas = document.getElementById("map");
  var mapOptions = {center: myCenter, zoom: 14};
  var map = new google.maps.Map(mapCanvas, mapOptions);
  var marker = new google.maps.Marker({position:myCenter});
  marker.setMap(map);
}
</script>

  </head>
  <body>
    <script async type="text/javascript" src="../js/bulma.js"></script>

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
        <div class="tile is-ancestor things">
          <div class="tile is-vertical is-8">
            <div class="tile">
              <div class="tile is-parent is-vertical">
                <article class="tile is-child box">
                  <?php
                  if(!isset($_GET["view"])){ ?>
                    <?php
                    $checkforparticipation = $dbh->prepare("SELECT * FROM ticket WHERE EventID = ".$_SESSION["eventid"]." AND OwnerID = ".$_SESSION["userid"]);
                    $checkforparticipation->execute();
                    $count = $checkforparticipation->rowCount();
                    if($count >= 1){ ?>
                      <div onclick="delmailevent();" class="button right">
                        Remove reservation
                      </div>
                    <?php }
                    else{ ?>
                      <div onclick="mailevent();" class="button right">
                        Participate
                      </div>
                    <?php }

                    ?>

                    <table style="width: 30%; margin: auto; border: none;">
                      <tbody>
                        <h1 style="text-align:center">Specifications</h1>
                              <tr>
                                <td>Owner</td>
                                <td><?php echo $author["fldName"] ?></td>
                              </tr>
                              <tr>
                                <td>Date</td>
                                <td><?php echo $timetable["fldDate"] ?></td>
                              </tr>
                              <tr>
                                <td>Start hour</td>
                                <td><?php echo $timetable["fldStartTime"] ?></td>
                              </tr>
                              <tr>
                                <td>End hour</td>
                                <td><?php echo $timetable["fldEndTime"] ?></td>
                              </tr>
                              <tr>
                                <td>available tickets</td>
                                <td><?php $ticketleft = $alldata["Limited_Ticket"] - $alldata["Sold_Ticket"]; echo $ticketleft ?></td>
                              </tr>
                              <tr>
                                <td>Room name</td>
                                <td><?php echo $roomname["Textawn"] ?></td>
                              </tr>
                            </tbody>
                          </table>

                  <?php }
                  else{
                    $getroom = $dbh->prepare("SELECT * FROM room WHERE RoomID = ".$timetable["RoomID"]);
                    $getroom->execute();
                    $room = $getroom->fetch(PDO::FETCH_ASSOC);
                    ?>
                    <table style="width: 30%; margin: auto; border: none;">
                      <tbody>
                        <h1 style="text-align:center">Specifications</h1>
                              <tr>
                                <td>Owner</td>
                                <td><?php echo $author["fldName"] ?></td>
                              </tr>
                              <tr>
                                <td>Date</td>
                                <td><?php echo $timetable["fldDate"] ?></td>
                              </tr>
                              <tr>
                                <td>Start hour</td>
                                <td><?php echo $timetable["fldStartTime"] ?></td>
                              </tr>
                              <tr>
                                <td>End hour</td>
                                <td><?php echo $timetable["fldEndTime"] ?></td>
                              </tr>
                              <tr>
                                <td>available tickets</td>
                                <td><?php $ticketleft = $alldata["Limited_Ticket"] - $alldata["Sold_Ticket"]; echo $ticketleft ?></td>
                              </tr>
                              <tr>
                                <td>Room name</td>
                                <td><?php echo $roomname["Textawn"] ?></td>
                              </tr>
                            </tbody>
                          </table>
                <?php        }
                        ?>

                </article>
                <article class="tile is-child box">
                  <ul class="rslides">
                    <li style="justify-content:center;"><img src="upload/<?php echo $alldata["Mainpicture"] ?>" alt=""></li>
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


                      <?php

                      if($alldata["CreatorID"] == $_SESSION["userid"] or $_SESSION["admin"] == 1){ ?>
                        <div class="content participants">
                          <ul>
                      <?php  $getallparticipants = $dbh->prepare("SELECT * FROM ticket WHERE EventID = ".$_SESSION["eventid"]);
                        $getallparticipants->execute();
                        $start = 0;
                        while($participants = $getallparticipants->fetch(PDO::FETCH_ASSOC)){
                          $getuser = $dbh->prepare("SELECT fldName,fldLastname FROM user WHERE UserID = ".$participants["OwnerID"]);
                          $getuser->execute();
                          $user = $getuser->fetch(PDO::FETCH_ASSOC);
                          if($start == 0){ ?>
                            <li><?php echo $user["fldName"]." ".$user["fldLastname"]; ?></li>
                            <?php $start++;
                          }
                          else{ ?>
                            <li class="is-light"><?php echo $user["fldName"]." ".$user["fldLastname"]; ?></li>
                          <?php  $start--;
                          }
                        } ?>
                        </ul>
                      </div>
                      <?php }
                      else{ ?>
                        <header>
                          There are <?php echo $alldata["Sold_Ticket"] ?> people attending to this event!
                        </header>
                      <?php }
                      ?>

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
                <?php echo $alldata["Discription"] ?>
              </div>
            </article>
            </div>
          <div class="tile is-parent">
            <article class="tile is-child box">
              <p class="title">Necessities</p>
              <div class="content">
                <?php echo $alldata["Necessities"] ?>
              </div>
            </article>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
