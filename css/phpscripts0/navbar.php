
<style media="screen">
.goog-te-banner-frame.skiptranslate {
    display: none !important;
    }
    .goog-gt-tt{
      display: none;
    }

</style>

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
      <a data-ajax="false" href="logout.php"><i class="fas fa-sign-out-alt"></i></a>
      <a data-ajax="false" href="<?php if(isset($_SESSION["name"])){echo "changeuserinfo.php";}else{echo "login.php";} ?>"><?php if(isset($_SESSION["name"])){echo $_SESSION["name"];}else{echo "login";} ?></a>
    </div>

    <div class="nav-right nav-menu is-hidden-widescreen" id="nav-menu">
      <div class="fixit">
        <div class="sectionfix">
          <a data-ajax="false" href="index.php" class="item active"><span class="icon"><i class="fa fa-calendar-alt"></i></span><span class="name">Events</span></a>
        </div>
        <?php if(isset($_SESSION["userid"])){ ?>
        <div class="sectionfix">
          <a data-ajax="false" href="mymeetings.php" class="item"><span class="icon"><i class="fa fa-users"></i></span><span class="name">My meetings</span></a>
        </div>
        <?php } ?>
        <?php if(isset($_SESSION["userid"])){ ?>
        <div class="sectionfix">
          <a data-ajax="false" href="myevents.php" class="item"><span class="icon"><i class="fa fa-calendar-check"></i></span><span class="name">My events</span></a>
        </div>
      <?php } ?>
      <?php if(isset($_SESSION["create"]) and $_SESSION["create"] == 1){ ?>
        <div class="sectionfix">
          <a data-ajax="false" href="middleman.php?request=event" class="item"><span class="icon"><i class="fa fa-calendar-plus"></i></span><span class="name">Make an event</span></a>
        </div>
      <?php } ?>
      <?php if(isset($_SESSION["userid"])){ ?>
        <div class="sectionfix">
          <a data-ajax="false" href="middleman.php" class="item"><span class="icon"><i class="fas fa-building"></i></span><span class="name">Book a room</span></a>
        </div>
        <?php } ?>
      </div>
      <div class="fixit">
        <?php if(isset($_SESSION["acces"]) and $_SESSION["acces"] == 1){ ?>
        <div class="sectionfix">
          <a data-ajax="false" href="admin.php" class="item active"><span class="icon"><i class="fa fa-user"></i></span><span class="name">Account management</span></a>
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
          <a data-ajax="false" href="changeuserinfo.php">
            <figure class="avatar">
                <img style="height:6em !important" src="profilepics/<?php if(is_null($_SESSION["profilepic"])){ echo "avatar.png"; }else{ echo $_SESSION["profilepic"]; }?>">
    <?php    }
        else{ ?>
          <a data-ajax="false" href="login.php">
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
        <a data-ajax="false" href="index.php" class="item active"><span class="icon"><i class="fa fa-calendar-alt"></i></span>Events</a>
        <?php if(isset($_SESSION["userid"])){ ?>
        <a data-ajax="false" href="mymeetings.php" class="item"><span class="icon"><i class="fa fa-users"></i></span>My meetings</a>
        <?php } ?>
        <?php if(isset($_SESSION["userid"])){ ?>
        <a data-ajax="false" href="myevents.php" class="item"><span class="icon"><i class="fa fa-calendar-check"></i></span>My events</a>
        <?php } ?>
        <?php if(isset($_SESSION["create"]) and $_SESSION["create"] == 1){ ?>
        <a data-ajax="false" href="middleman.php?request=event" class="item"><span class="icon"><i class="fa fa-calendar-plus"></i></span>Make an event</a>
        <?php } ?>
        <?php if(isset($_SESSION["userid"])){ ?>
        <a data-ajax="false" href="middleman.php" class="item"><span class="icon"><i class="fas fa-building"></i></span>Book a room</a>
        <?php } ?>
      </div>

      <?php if(isset($_SESSION["acces"]) and $_SESSION["acces"] == 1){ ?>
      <div class="main">
        <div class="title"><i class="fa fa-cog"></i>  Admin</div>
        <a data-ajax="false" href="admin.php" class="item link1"><span class="icon"><i class="fa fa-user"></i></span>Account management</a>
      </div>
      <?php } ?>
    </div>
  </aside>
