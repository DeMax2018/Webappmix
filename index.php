<?php
include"conn.php";
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

  <script defer src="https://use.fontawesome.com/releases/v5.0.4/js/all.js"></script>
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

          <div class="search">
            <span class="fa fa-search"></span>
            <input placeholder="Search term">
          </div>
        </ul>
      </div>
      <div class="section scroll things">


        <?php
        $sql = $dbh->prepare("SELECT * FROM Event WHERE Active = 1;");
        $sql->execute();
        $first = true;
        while($rows = $sql->fetch(PDO::FETCH_ASSOC)){
          if($first === true){ ?>
            <div class="columns columnsaside"> <!--  Max 2 items -->
              <div class="column is-6">
                <div class="panel">
                    <img src="https://placehold.it/600x300">
                  <div class="panel-block">
                    <div class="columns columnsaside">
                      <div class="column">
                        <div class="panel-block-item"><?php echo $rows["eventname"]; ?></div>
                      </div>
                      <div class="column has-text-right">
                        <div class="panel-block-item"><?php echo $rows["Sold_Ticket"] ?><i class="fa fa-user"></i></div>
                        <div class="panel-block-item"><?php echo $rows["date_event"] ?><i class="fa fa-calendar"></i></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        <?php  $first = false; }

        else{ ?>
          <div class="column is-6">
            <div class="panel">
                <img src="https://placehold.it/600x300">
              <div class="panel-block">
                <div class="columns columnsaside">
                  <div class="column">
                    <div class="panel-block-item"><?php echo $rows["eventname"]; ?></div>
                  </div>
                  <div class="column has-text-right">
                    <div class="panel-block-item"><?php echo $rows["Sold_Ticket"] ?><i class="fa fa-user"></i></div>
                    <div class="panel-block-item"><?php echo $rows["date_event"] ?> <i class="fa fa-calendar"></i></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </div>
          <?php  $first = true; }
            }
          ?>
          </div>
          <nav class="pagination nobullets" role="navigation" aria-label="pagination">
            <a class="pagination-previous nobullets">Previous</a>
            <a class="pagination-next nobullets">Next page</a>
            <ul class="pagination-list nobullets">
              <li>
                <a class="pagination-link" aria-label="Goto page 1">1</a>
              </li>
              <li>
                <span class="pagination-ellipsis">&hellip;</span>
              </li>
              <li>
                <a class="pagination-link" aria-label="Goto page 45">45</a>
              </li>
              <li>
                <a class="pagination-link is-current" aria-label="Page 46" aria-current="page">46</a>
              </li>
              <li>
                <a class="pagination-link" aria-label="Goto page 47">47</a>
              </li>
              <li>
                <span class="pagination-ellipsis">&hellip;</span>
              </li>
              <li>
                <a class="pagination-link" aria-label="Goto page 86">86</a>
              </li>
            </ul>
          </nav>
        </div>


      </div>
    </div>
  </div>

  <script async type="text/javascript" src="../js/bulma.js"></script>

</body>
</html>
