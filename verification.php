<?php
include"conn.php";
session_start();
if(  $_SESSION["authcode"] === "true"){
    $getinfo = $dbh->prepare("SELECT * FROM event WHERE EventID = ".$_SESSION["idauthcode"]);
    $getinfo->execute();
    $info = $getinfo->fetch(PDO::FETCH_ASSOC);
    $gethoursandroom = $dbh->prepare("SELECT * FROM roomhours WHERE Room_HoursID = ".$info["Reservation"]);
    $gethoursandroom->execute();
    $hoursroom = $gethoursandroom->fetch(PDO::FETCH_ASSOC);
    $getroom = $dbh->prepare("SELECT Textawn FROM room_details WHERE RoomID = ".$hoursroom["RoomID"]." AND DetailsID = 4");
    $getroom->execute();
    $room = $getroom->fetch(PDO::FETCH_ASSOC);
    $getowner = $dbh->prepare("SELECT fldName, fldLastname FROM user WHERE UserID = ".$_SESSION["owner"]);
    $getowner->execute();
    $owner = $getowner->fetch(PDO::FETCH_ASSOC);
    if($info["eventname"] === "empty"){
      $info["eventname"] = " your reservation";
    }
    else{
      echo $info["eventname"];
    }
}
?>


<html>

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="../css/bulma.css">
    <link rel="stylesheet" type="text/css" href="css/nav.css">
    <link rel="shortcut icon" type="image/png" href="images/flavicon.jpg"/>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script type="text/javascript" src="jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="jquery-ui-1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="js1.js"></script>
<script src="js/noframework.waypoints.min.js" charset="utf-8"></script>
    <link rel="stylesheet" type="text/css" href="../css/grid-gallery.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.4/js/all.js"></script>
    <link href="css/jquerymobile.css" rel="stylesheet" type="text/css" />
    <link href="view_event.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="css/verification.css">
    <script type="text/javascript">
    function change(){
      if("true" === "<?php echo $_SESSION["authcode"] ?>"){
        $('#yes').show();
        $('#no').hide();

      }
      else{
        $('#yes').hide();
        $('#no').show();
      }
    }
    </script>
  </head>

  <body onload="change();">


    <div class="content column is-12">

      <div id="yes" class="yes">

        <h1>Welcome to <?php echo $info["eventname"]; ?>!</h1>

        <i class="fas fa-check-circle"></i>



        <table>

          <tr>

            <td>Owner</td>

            <td><?php echo $owner["fldName"]." ".$owner["fldLastname"]; ?></td>

          </tr>

          <tr>

            <td>Starting date and hour</td>

            <td><?php echo $hoursroom["fldDate"]." ".$hoursroom["fldStartTime"]."/".$hoursroom["fldEndTime"]; ?></td>

          </tr>

          <tr>

            <td>Room</td>

            <td><?php echo $room["Textawn"]; ?></td>

          </tr>

          <tr>

            <td>people attending</td>

            <td><?php echo $info["attending"]; ?></td>

          </tr>

        </table>

      </div>

      <div id="no"class="no">

        <h1>Woops, looks like you can't enter this event. <br> You don't have a valid ticket.</h1>

        <i class="fas fa-times-circle"></i>

      </div>

    </div>


  </body>

</html>
