
<!DOCTYPE html>
<html>
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.min.css">
    <style media="screen">
    body {
  background: #ddd;
  width: 100%;
  height: 100vh;
  position: relative;
}

h1 {
  color: #c7c7c7;
  font-weight: 200;
  text-align: center;
  position: absolute;
  top: 45%;
  width: 100%;
}

h2 {
  color: #007fed;
  font-weight: bold;
  border-bottom: 1px solid #eee;
  padding-bottom: 15px;
  margin-bottom: 15px;
}

p {
  color: #001818;
}

.wrap {
  position: absolute;
  overflow: hidden;
  top: 10%;
  right: 10%;
  bottom: 85px;
  left: 10%;
  padding: 20px 50px;
  display: block;
  border-radius: 4px;
  transform: translateY(20px);
  transition: all 0.5s;
  visibility: hidden;
}
.wrap .content {
  opacity: 0;
}
.wrap:before {
  position: absolute;
  width: 1px;
  height: 1px;
  background: white;
  content: "";
  bottom: 10px;
  left: 50%;
  top: 95%;
  color: #fff;
  border-radius: 50%;
  -webkit-transition: all 600ms cubic-bezier(0.215, 0.61, 0.355, 1);
  transition: all 600ms cubic-bezier(0.215, 0.61, 0.355, 1);
}
.wrap.active {
  display: block;
  visibility: visible;
  box-shadow: 2px 3px 16px silver;
  transition: all 600ms;
  transform: translateY(0px);
  transition: all 0.5s;
}
.wrap.active:before {
  height: 2000px;
  width: 2000px;
  border-radius: 50%;
  top: 50%;
  left: 50%;
  margin-left: -1000px;
  margin-top: -1000px;
  display: block;
  -webkit-transition: all 600ms cubic-bezier(0.215, 0.61, 0.355, 1);
  transition: all 600ms cubic-bezier(0.215, 0.61, 0.355, 1);
}
.wrap.active .content {
  position: relative;
  z-index: 1;
  opacity: 1;
  transition: all 600ms cubic-bezier(0.55, 0.055, 0.675, 0.19);
}

a.button {
  padding: 11px 11px 13px 13px;
  outline: none;
  border-radius: 50%;
  background: #007fed;
  color: #fff;
  font-size: 24px;
  display: block;
  position: fixed;
  left: 50%;
  bottom: 20px;
  top: auto;
  margin-left: -25px;
  transition: transform 0.25s;
}
a.button:hover {
  text-decoration: none;
  background: #2198ff;
}
a.button.active {
  transform: rotate(135deg);
  transition: transform 0.5s;
}

    </style>
    <script type="text/javascript">
    $('a').on('click', function(){
$('.wrap, a').toggleClass('active');

return false;
});
function show(){
var d =  document.getElementById('showinfo');
d.classList.add("is-active");
}
function closeshow(){
  var d = document.getElementById('showinfo');
  d.classList.remove("is-active");
}
$(function() {
$("body").click(function(e) {
if (e.target.id == "closeid" || e.target.id == "show" || $(e.target).parents("#closeid").length) {
} else {
  closeshow();
}
});
})
    </script>
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
                <h1>Animated Popup Information</h1>
                <div class='wrap'>
                  <div class='content'>
                    <h2>Well Hello!</h2>
                    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                  </div>
                </div>
                <a class='button glyphicon glyphicon-plus' href='#'></a>
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
