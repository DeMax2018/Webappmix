
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Events</title>

    <link rel="stylesheet" type="text/css" href="../css/bulma.css">
    <link rel="stylesheet" type="text/css" href="../css/aside.css">
    <link rel="stylesheet" type="text/css" href="../css/nav.css">
    <link rel="stylesheet" type="text/css" href="../css/grid-gallery.css">
    <link rel="stylesheet" href="css/eventcreate.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
    <script async type="text/javascript" src="../js/bulma.js"></script>

    <script
    src="https://code.jquery.com/jquery-2.0.2.js"
    integrity="sha256-0u0HIBCKddsNUySLqONjMmWAZMQYlxTRbA8RfvtCAW0="
    crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <script type="text/javascript" src="js/sliderdate.js"></script>
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
        <div class="content column is-9-nav nav-aside is-hidden-mobile">
          <span class="aside-toggle is-marginless">
          <span></span>
          <span></span>
          <span></span>
          </span>
        </div>
        <div class="back">
          <form method="post" action="eventcreatefunctions.php">
            <h1 class="eventh1">Create a new event or course.</h1>
            <div class="contentform">
              <div id="sendmessage"> Your message has been sent successfully. Thank you. </div>
              <div class="columns">
                <div class="column">
                  <div class="form-group">
                    <p>Event Name<span>*</span></p>
                    <span class="icon-case"><i class="fas fa-pencil-alt"></i></span>
                    <input type="text" name="name" id="nom" data-rule="required" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Nom' doit être renseigné."/>
                    <div class="validation"></div>
                  </div>
                </div>
                <div class="column">
                  <div class="form-group">
                    <p>Room <span>*</span></p>
                    <a class="icon-case-right"><i class="fas fa-building"></i><span>Pick a room</span></a>
                    <div class="validation"></div>
                  </div>
                </div>
              </div>
              <div class="columns">
                <div class="column">
              <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
              <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js" type="text/javascript"></script>

              <div class="form-group" id="time-range">
              <p>
              Time: <span class="slider-time">9:00 AM</span> - <span class="slider-time2">5:00 PM</span>
              </p>
                <div class="sliders_step1">
                  <div id="slider-range"></div>
                </div>
              </div>
              <script src="js/sliderdate.js" type="text/javascript"></script>
            </div>
          </div>
              <div class="columns">
                <div class="column">
                  <div class="form-group">
                    <p>Date <span>*</span></p>
                    <span class="icon-case"><i class="fas fa-calendar-alt"></i></span>
                    <input type="text" name="ville" id="ville" data-rule="required" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Ville' doit être renseigné."/>
                    <div class="validation"></div>
                  </div>
                </div>
                <div class="column">
                  <div class="form-group">
                    <p>Phone number <span>*</span></p>
                    <span class="icon-case"><i class="fa fa-phone"></i></span>
                    <input type="text" name="phone" id="phone" data-rule="maxlen:10" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Téléphone' doit être renseigné. Minimum 10 chiffres"/>
                    <div class="validation"></div>
                  </div>
                </div>
              </div>
              <div class="columns">
                <div class="column">


                  <div class="form-group">
                    <p>Max-Tickets<span>*</span></p>
                    <span class="icon-case"><i class="fa fa-ticket-alt"></i></span>
                    <input type="email" name="email" id="email" data-rule="email" data-msg="Vérifiez votre saisie sur les champs : Le champ 'E-mail' est obligatoire."/>
                    <div class="validation"></div>
                  </div>
                </div>
                <div class="column">
                  <div class="form-group">
                    <p>Share on Facebook</p>
                    <i class="fab fa-facebook-square fb"></i>
                    <label class="switch">
                      <input type="checkbox">
                    <span class="slider round"></span>
                  </label>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <p>Event theme <span>*</span></p>
                <span class="icon-case"><i class="fas fa-tags"></i></span>
                <select class="selectpicker" data-live-search="true" multiple>
                  <option>Mustard</option>
                  <option>Ketchup</option>
                  <option>Relish</option>
                </select>
                <!-- Latest compiled and minified JavaScript -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

                <!-- (Optional) Latest compiled and minified JavaScript translation files -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/i18n/defaults-*.min.js"></script>
                <script type="text/javascript">
                  $('.selectpicker').selectpicker({
                  style: 'btn-info',
                  size: 4
                  });
                </script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js" charset="utf-8"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
                <script src="https://silviomoreto.github.io/bootstrap-select/dist/js/bootstrap-select.min.js" charset="utf-8"></script>
                <script src="https://silviomoreto.github.io/bootstrap-select/js/highlight.pack.js" charset="utf-8"></script>
                <script src="https://silviomoreto.github.io/bootstrap-select/js/base.js" charset="utf-8"></script>
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <div class="form-group">
                  <p>Description <span>*</span></p>
                  <span class="icon-case"><i class="fas fa-comment-alt"></i></span>
                  <textarea name="message" rows="14" data-rule="required" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Message' doit être renseigné."></textarea>
                  <div class="validation"></div>
                </div>

                <div class="form-group">
                  <p>Requirements <span>*</span></p>
                  <span class="icon-case"><i class="fas fa-clipboard-list"></i></span>
                  <textarea name="message" rows="14" data-rule="required" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Message' doit être renseigné."></textarea>
                  <div class="validation"></div>
                </div>


              </div>
              <button type="submit" class="bouton-contact">Send</button>
            </div>
          </form>
        </div>
        <script async type="text/javascript" src="../js/bulma.js"></script>
      </div>
    </div>
  </body>
</html>
