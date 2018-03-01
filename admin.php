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
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="../css/bulma.css">
    <link rel="stylesheet" type="text/css" href="css/nav.css">

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script type="text/javascript" src="jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="jquery-ui-1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="js1.js"></script>
<script src="js/noframework.waypoints.min.js" charset="utf-8"></script>
    <link rel="stylesheet" type="text/css" href="../css/grid-gallery.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.4/js/all.js"></script>

    <link rel="stylesheet" href="css/admin.css">
  </head>
  <body>


        <script async type="text/javascript" src="../js/bulma.js"></script>

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
            <a href="index.php" class="item"><span class="icon"><i class="fa fa-calendar-alt"></i></span><span class="name">Events</span></a>
            <a href="#" class="item"><span class="icon"><i class="fa fa-users"></i></span><span class="name">My meetings</span></a>
            <a href="#" class="item"><span class="icon"><i class="fa fa-calendar-check"></i></span><span class="name">My events</span></a>
            <a href="#" class="item"><span class="icon"><i class="fa fa-calendar-alt"></i></span><span class="name">Make an event</span></a>
            <a href="#" class="item"><span class="icon"><i class="fa fa-calendar-check"></i></span><span class="name">Event management</span></a>
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
        </div>
        <div class="tile is-ancestor things">
          <div class="tile is-parent">
            <article class="tile is-child box">
              <p class="title">Hello Admin!</p>
            </article>
          </div>
        </div>
        <div class="tile is-ancestor" id="account">
          <div class="tile is-parent">
            <article class="tile is-child box">
              <p class="title">Account administration</p>
              <p class="subtitle">Here you can change the rights of all the users accounts.</p>
              <div class="content ">
                <div class="container">
                  <!-- Main container -->
                  <nav class="level is-fullwidth is-hidden-mobile">
                    <!-- Left side -->
                    <div class="level-left">
                      <div class="level-item is-fullwidth">
                        <div class="field has-addons is-fullwidth">
                          <p class="control">
                            <input class="input is-fullwidth" id="filter" onkeyup="rights();" type="text" placeholder="Find an account">
                          </p>
                        </div>
                      </div>
                    </div>

                    <!-- Right side -->
                    <div class="level-right">
                      <i class="fa fa-filter filter"></i>
                      <p class="control">
                        <button class="button">
                          Search
                        </button>
                      </p>
                    </div>
                  </nav>
                </div>
                <table>
                  <tr class="headcol">
                    <th class="accounta">Account</th>
                    <?php
                    $numright = $dbh->prepare("SELECT * FROM `Right`");
                    $numright->execute();
                    while($record = $numright->fetch(PDO::FETCH_ASSOC)){ ?>
                    <th><?php echo $record["fldName"] ?></th>
                    <?php } ?>
                    <th class="mrg"></th>
                  </tr>
                </table>
                <div class="scrollacc" id="scrollaccr">
                 <table>


                     <?php
                     $sth = $dbh->prepare("SELECT * from User");
                       $sth->execute();
                     while($record = $sth->fetch(PDO::FETCH_ASSOC)){ ?>
                       <tr class="is-light">
                         <td id="names"class="accounta"><?php echo $record["fldName"]." ".$record["fldLastname"] ?></td>
                         <?php
                         $num = $numright->rowCount();
                         $checkbox = $dbh->prepare("SELECT * FROM PrivateRights WHERE UserID = ".$record["UserID"]);
                         $checkbox->execute();
                         while ($rows = $checkbox->fetch(PDO::FETCH_ASSOC)) {
                           if($rows["Create_events"] == 1){
                              echo "<td><input checked id='create' name='".$record["fldName"]." ".$record["fldLastname"]."' onchange='create_event(this.name,1);' type='checkbox'></td>";
                           }
                           else{
                             echo "<td><input id='create' name='".$record["fldName"]." ".$record["fldLastname"]."' onchange='create_event(this.name,1);' type='checkbox'></td>";
                           }
                           if($rows["Delete_Events"] == 1){
                              echo "<td><input name='".$record["fldName"]." ".$record["fldLastname"]."' onchange='create_event(this.name,2);' checked type='checkbox'></td>";
                           }
                           else{
                             echo "<td><input name='".$record["fldName"]." ".$record["fldLastname"]."' onchange='create_event(this.name,2);' type='checkbox'></td>";
                           }
                           if($rows["Acces_Rights_System"] == 1){
                              echo "<td><input name='".$record["fldName"]." ".$record["fldLastname"]."' onchange='create_event(this.name,3);' checked type='checkbox'></td>";
                           }
                           else{
                             echo "<td><input name='".$record["fldName"]." ".$record["fldLastname"]."' onchange='create_event(this.name,3);' type='checkbox'></td>";
                           }
                         }
                         ?>
                       </tr>


                   <?php }?>


                 </table>
               </div>
              </div>
            </article>
          </div>
        </div>
    </div>
  </body>

</html>
