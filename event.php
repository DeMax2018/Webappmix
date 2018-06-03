<?php
session_start();
include "conn.php";
include"dbclasses.php";
$_SESSION["eventid"] = $_GET["id"];
$getalldata = $dbh->prepare("SELECT * FROM event WHERE EventID = ".$_GET["id"]);
$getalldata->execute();
$alldata = $getalldata->fetch(PDO::FETCH_ASSOC);
if($alldata["EventOrRent"] == 0){
  $rent = "true";
  $getmyevent = $dbh->prepare("SELECT * FROM event WHERE CreatorID = ".$_SESSION["userid"]);
  $getmyevent->execute();
  $getout = "true";
  while($ownevent = $getmyevent->fetch(PDO::FETCH_ASSOC)){
    if($ownevent["EventID"] == $_GET["id"]){
      $getout = "false";
    }
  }
  if($getout === "true"){
    header("location: index.php");
  }
}
$getauthor = $dbh->prepare("SELECT * FROM user WHERE UserID = ".$alldata["CreatorID"]);
$getauthor->execute();
$author = $getauthor->fetch(PDO::FETCH_ASSOC);
$gettimetable = $dbh->prepare("SELECT * FROM roomhours WHERE Room_HoursID = ".$alldata["Reservation"]);
$gettimetable->execute();
$timetable = $gettimetable->fetch(PDO::FETCH_ASSOC);
$getroomname = $dbh->prepare('SELECT Textawn FROM room_details WHERE DetailsID = 4 and RoomID = '.$timetable["RoomID"]);
$getroomname->execute();
$roomname = $getroomname->fetch(PDO::FETCH_ASSOC);
$getimage= $dbh->prepare('SELECT Textawn FROM room_details WHERE DetailsID = 10 and RoomID = '.$timetable["RoomID"]);
$getimage->execute();
$image = $getimage->fetch(PDO::FETCH_ASSOC);
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
      <link rel="shortcut icon" type="image/png" href="images/flavicon.jpg"/>
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
    <div class="loader" id="loading"style="display:none;z-index: 9000;position: fixed;width: 2em;height: 2em;margin-top: 18%;margin-left: 45%;"></div>
    <script async type="text/javascript" src="../js/bulma.js"></script>

<?php include"phpscripts/navbar.php"; ?>
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
                  if(!isset($rent) and isset($_SESSION["userid"])){ ?>
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
                              
                            </tbody>
                          </table>

                  <?php }
                  elseif(isset($rent) and isset($_SESSION["userid"])) {
                    $getroom = $dbh->prepare("SELECT * FROM room WHERE RoomID = ".$timetable["RoomID"]);
                    $getroom->execute();
                    $room = $getroom->fetch(PDO::FETCH_ASSOC);
                    ?>
                    <div onclick="delmailrent();" class="button right">
                      Remove reservation
                    </div>
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
                                <td>Room name</td>
                                <td><?php echo $roomname["Textawn"] ?></td>
                              </tr>
                            </tbody>
                          </table>
                <?php        }
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
                                <td>Room name</td>
                                <td><?php echo $roomname["Textawn"] ?></td>
                              </tr>
                            </tbody>
                          </table>
              <?php  }
                        ?>

                </article>
                <article class="tile is-child box">
                  <ul class="rslides"><?php if(isset($rent)){ ?>
                    <li style="justify-content:center;"><img src="upload/<?php echo $image["Textawn"] ?>" alt=""></li>
                <?php  }else{ ?>
                    <li style="justify-content:center;"><img src="upload/<?php echo $alldata["Mainpicture"] ?>" alt=""></li>
                  <?php } ?>
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

                      if((isset($_SESSION["userid"])) and ($alldata["CreatorID"] == $_SESSION["userid"] or $_SESSION["admin"] == 1)){ ?>
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
        <?php if(isset($rent)){}else{ ?>
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
      <?php } ?>
      </div>
    </div>
    <?php include"phpscripts/footer.php"; ?>
  </body>
</html>
