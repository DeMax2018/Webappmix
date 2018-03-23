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
</head>
<body>
  <nav class="nav is-dark has-shadow is-hidden-widescreen" id="top" >
    <div class="container">
      <div class="subcontainer">
        <span class="nav-toggle" id="nav-toggle">
          <span></span>
          <span></span>
          <span></span>
        </span>
      </div>

      <div class="nav-right nav-menu is-hidden-widescreen" id="nav-menu">
        <div class="fixit">
          <div class="sectionfix">
            <a href="#" data-ajax="false" class="item active"><span class="icon"><i class="fa fa-calendar-alt"></i></span><span class="name">Events</span></a>
          </div>
          <div class="sectionfix">
            <a href="#" data-ajax="false" class="item"><span class="icon"><i class="fa fa-users"></i></span><span class="name">My meetings</span></a>
          </div>
          <div class="sectionfix">
            <a href="#" data-ajax="false" class="item"><span class="icon"><i class="fa fa-calendar-check"></i></span><span class="name">My events</span></a>
          </div>
          <div class="sectionfix">
            <a href="#" data-ajax="false" class="item"><span class="icon"><i class="fa fa-calendar-plus"></i></span><span class="name">Make an event</span></a>
          </div>
          <div class="sectionfix">
            <a href="#" data-ajax="false" class="item"><span class="icon"><i class="fas fa-building"></i></span><span class="name">Book a room</span></a>
          </div>
          <div class="sectionfix">
            <a href="#" data-ajax="false" class="item"><span class="icon"><i class="fa fa-calendar-alt"></i></span><span class="name">Event management</span></a>
          </div>
        </div>
        <div class="fixit">
          <div class="sectionfix">
            <a href="#" data-ajax="false" class="item active"><span class="icon"><i class="fa fa-user"></i></span><span class="name">Account management</span></a>
          </div>
          <div class="sectionfix">
            <a href="#" data-ajax="false" class="item"><span class="icon"><i class="fas fa-building"></i></span><span class="name">Room & building management</span></a>
          </div>
        </div>
      </div>
    </div>
  </nav>
  <div class="columns columnsaside">
    <aside class="column is-3 aside hero is-fullheight is-hidden-touch is-hidden-desktop-only">
      <div class="fixleft">
        <div class="account has-text-centered">
          <a href="changeuserinfo.php">
            <figure class="avatar">
              <img src="images/avatar.png">
            </figure>
          </a>
        </div>
        <div class="main">
          <div class="title"><i class="fas fa-home"></i>   Main</div>
          <a href="index.php" data-ajax="false" class="item active"><span class="icon"><i class="fa fa-calendar-alt"></i></span><span class="name">Events</span></a>
          <a href="#" data-ajax="false" class="item"><span class="icon"><i class="fa fa-users"></i></span><span class="name">My meetings</span></a>
          <a href="#" data-ajax="false" class="item"><span class="icon"><i class="fa fa-calendar-check"></i></span><span class="name">My events</span></a>
          <a href="bookaroom.php" data-ajax="false" class="item"><span class="icon"><i class="fa fa-calendar-plus"></i></span><span class="name">Make an event</span></a>
          <a href="bookaroom.php" data-ajax="false" class="item"><span class="icon"><i class="fas fa-building"></i></span><span class="name">Book a room</span></a>
          <a href="#" data-ajax="false" class="item"><span class="icon"><i class="fa fa-calendar-alt"></i></span><span class="name">Event management</span></a>
        </div>
        <div class="main">
          <div class="title"><i class="fa fa-cog"></i>  Admin</div>
          <a href="admin.php#account" data-ajax="false" class="item link1"><span class="icon"><i class="fa fa-user"></i></span><span class="name">Account management</span></a>
          <a href="#" data-ajax="false" class="item link2"><span class="icon"><i class="fas fa-building"></i></span><span class="name">Room & building management</span></a>
        </div>
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
                <p class="control has-icons-left">
                  <input class="input is-large" type="email" placeholder="Nicklangens@hotmail.com" autofocus="">
                  <span class="icon is-left">
                    <i class="fas fa-envelope"></i>
                  </span>
                </p>
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
                        <input class="input is-large" type="text" placeholder="Zipcode" autofocus="">
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
  </section>
</div>
</div>
  <script async type="text/javascript" src="../js/bulma.js"></script>
</body>
</html>
