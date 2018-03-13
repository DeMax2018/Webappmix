<?php
  include"conn.php";
  //include "auth.php";
  session_start();
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>verification</title>
    <link rel="stylesheet" type="text/css" href="../css/bulma.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script type="text/javascript" src="jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="jquery-ui-1.12.1/jquery-ui.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.4/js/all.js"></script>
    <link rel="stylesheet" href="css/verification.css">
  </head>
  <body>
    <script src="js/verification.js" charset="utf-8"></script>
    <div class="content column is-12">
      <div class="yes">
        <h1>Welcome to *Event*!</h1>
        <i class="fas fa-check-circle"></i>

        <table>
          <tr>
            <td>Participant</td>
            <td>Maxime Dedobbeleergefeefefefg</td>
          </tr>
          <tr>
            <td>Starting date and hour</td>
            <td>*Date + hour*</td>
          </tr>
          <tr>
            <td>Room</td>
            <td>*Room number*</td>
          </tr>
          <tr>
            <td>Other thingymagickers</td>
            <td>*What belongs to it*</td>
          </tr>
        </table>
      </div>
      <div class="no">
        <h1>Woops, looks like you can't enter this event. <br> You don't have a valid ticket.</h1>
        <i class="fas fa-times-circle"></i>
      </div>
    </div>
    <div class="jej" onclick="joepie()">Switch</div>
  </body>
</html>
