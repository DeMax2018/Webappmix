<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.0/css/bulma.min.css" integrity="sha256-HEtF7HLJZSC3Le1HcsWbz1hDYFPZCqDhZa9QsCgVUdw=" crossorigin="anonymous" />
  <link rel="stylesheet" type="text/css" href="css/nav.css">
  <link rel="stylesheet" type="text/css" href="../css/grid-gallery.css">
  <link rel="stylesheet" type="text/css" href="../css/bulma.css">
  <title>User profile</title>

  <link rel="stylesheet" type="text/css" href="../css/login.css">
  <script defer="" src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.js"></script>
  <script type="text/javascript">
  $(document).ready(function () {
  $('#passchecker').keyup(function () {
      var pass = document.getElementById('pass').value;
      var checkpass = document.getElementById('passchecker').value;
      if(checkpass != pass){
        element = document.getElementById("checkpass");
        element.classList.add("is-danger");
      }
      else{
        element = document.getElementById("checkpass");
        element.classList.remove("is-danger");
      }
    });
});
  </script>
</head>
<body>
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
  <section class="is-success is-fullheight things">
    <div class="hero-body">
      <div class="container has-text-centered">
        <div class="column is-6 is-offset-3">
          <h3 class="title has-text-grey">Hello</h3>
          <p class="subtitle has-text-grey">Nick Langens.</p>
          <div class="box">
            <figure class="avatars">
              <img src="profilepics/<?php if(is_null($_SESSION["profilepic"])){ echo "avatar.png"; }else{ echo $_SESSION["profilepic"]; }?>" style="max-width: 168px; max-height: 168px; min-width: 168px; min-height: 168px;">
              <div class="">
                <form action="phpscripts/updateuser.php" method="post" enctype="multipart/form-data">

                  <input type="file" name="fileToUpload" id="fileToUpload" class="hiddenfile" >
              </div>
            </figure>


              <!-- colums for showing name -->
              <div class="columns">
                <div class="column is-half">
                  <div class="field">
                    <div class="control">
                      <input class="input is-large" name="Name" type="text" value="<?php echo $_SESSION["name"]; ?>" placeholder="Nick" autofocus="">
                    </div>
                  </div>
                </div>
                <div class="column">
                  <div class="field">
                    <div class="control">
                      <input class="input is-large" name="lastname" type="text"value="<?php echo $_SESSION["lastname"]; ?>" placeholder="Langens">
                    </div>
                  </div>
                </div>
              </div>
              <!-- colums for showing tel + email -->
              <div class="field">
                <p class="control has-icons-left">
                  <input class="input is-large" type="email" name="mail" placeholder="Nicklangens@hotmail.com" value="<?php echo $_SESSION["mail"]; ?>" autofocus="">
                  <span class="icon is-left">
                    <i class="fas fa-envelope"></i>
                  </span>
                </p>
              </div>
              <div class="field">
                <div class="control has-icons-left">
                  <input class="input is-large" type="tel" name="number" value="<?php echo $_SESSION["number"]; ?>" placeholder="Phone number" autofocus="">
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
                      <input class="input is-large" type="text" name="city" placeholder="City" value="<?php echo $_SESSION["city"]; ?>" autofocus="">
                    </div>
                  </div>
                </div>
                <div class="column">
                  <div class="field">
                      <div class="control">
                        <input class="input is-large" type="text" name="zipcode" value="<?php echo $_SESSION["zipcode"]; ?>" placeholder="Zipcode" autofocus="">
                      </div>
                  </div>
                </div>
              </div>
              <div class="columns">
                <div class="column is-10">
                  <div class="field">
                      <div class="control">
                        <input class="input is-large" type="text" name="street" placeholder="Street" value="<?php echo $_SESSION["street"]; ?>" autofocus="">
                      </div>
                  </div>
                </div>
                <div class="column">
                  <div class="field">
                      <div class="control">
                        <input class="input is-large" type="text" name="housenumber" value="<?php echo $_SESSION["housenumber"]; ?>" placeholder="Nr" autofocus="">
                      </div>
                  </div>
                </div>
              </div>
              <div class="field">
                <p class="control has-icons-left">
                  <input class="input is-large" type="password" id="pass" name="pass" placeholder="Change password" autofocus="">
                  <span class="icon is-left">
                    <i class="fas fa-lock"></i>
                  </span>
                </p>
              </div>
              <div class="field">
                <div class="control has-icons-left has-icons-right">
                  <input class="input is-large"id="checkpass"  name="checkpass"type="password" placeholder="Confirm password" autofocus="">
                  <span class="icon is-left">
                    <i class="fas fa-lock"></i>
                  </span>

                </div>
              </div>

            <input type="submit" value="Upload Image" name="submit">
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
</div>
  <script async type="text/javascript" src="../js/bulma.js"></script>
</body>
</html>
