
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


  <script
    src="https://code.jquery.com/jquery-2.0.2.js"
    integrity="sha256-0u0HIBCKddsNUySLqONjMmWAZMQYlxTRbA8RfvtCAW0="
    crossorigin="anonymous"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.4/js/all.js"></script>
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
        <a href="#" class="item"><span class="icon"><i class="fa fa-calendar-alt"></i></span><span class="name">Events</span></a>
        </div>
        <div class="sectionfix">
        <a href="#" class="item"><span class="icon"><i class="fa fa-users"></i></span><span class="name">My meetings</span></a>
        </div>
        <div class="sectionfix">
        <a href="#" class="item active"><span class="icon"><i class="fa fa-calendar-check"></i></span><span class="name">My events</span></a>
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
  <div class="columns">
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
          <a href="#" class="item active"><span class="icon"><i class="fa fa-calendar-alt"></i></span><span class="name">Events</span></a>
          <a href="#" class="item"><span class="icon"><i class="fa fa-users"></i></span><span class="name">My meetings</span></a>
          <a href="#" class="item"><span class="icon"><i class="fa fa-calendar-check"></i></span><span class="name">My events</span></a>
          <a href="#" class="item"><span class="icon"><i class="fa fa-calendar-alt"></i></span><span class="name">Make an event</span></a>
          <a href="#" class="item"><span class="icon"><i class="fa fa-calendar-check"></i></span><span class="name">Event management</span></a>
        </div>
        <div class="main">
          <div class="title"><i class="fa fa-cog"></i>  Admin</div>
          <a href="#" class="item active"><span class="icon"><i class="fa fa-user"></i></span><span class="name">Account management</span></a>
          <a href="#" class="item"><span class="icon"><i class="fa fa-users"></i></span><span class="name">Meeting management</span></a>
          <a href="#" class="item"><span class="icon"><i class="fa fa-exclamation"></i></span><span class="name">Newsfeed</span></a>
          <a href="#" class="item"><span class="icon"><i class="fa fa-exclamation"></i></span><span class="name">Admin newsfeed</span></a>
        </div>
      </div>
    </aside>
    <div class="content column is-9">


        <form method="post" action="eventcreatefunctions.php" class="is-fullwidth">
      	    <h1 class="eventh1">Create a new event or cours</h1>

          <div class="contentform">
          	<div id="sendmessage"> Your message has been sent successfully. Thank you. </div>



      			      <div class="form-group">
      			        <p>Event creator<span>*</span></p>
      			        <span class="icon-case"><i class="fa fa-male"></i></span>
      				        <input type="text" name="name" id="nom" data-rule="required" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Nom' doit être renseigné."/>
                      <div class="validation"></div>
             </div>

                  <div class="form-group">
                  <p>Room <span>*</span></p>
                  <span class="icon-case"><i class="fa fa-user"></i></span>
      				<input type="text" name="prenom" id="prenom" data-rule="required" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Prénom' doit être renseigné."/>
                      <div class="validation"></div>
      			</div>

      			<div class="form-group">
      			<p>Max-Tickets<span>*</span></p>
      			<span class="icon-case"><i class="fa fa-ticket-alt"></i></span>
                      <input type="email" name="email" id="email" data-rule="email" data-msg="Vérifiez votre saisie sur les champs : Le champ 'E-mail' est obligatoire."/>
                      <div class="validation"></div>
      			</div>
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
            <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js" type="text/javascript"></script>

            <div id="time-range">

                <p>Time: <span class="slider-time">9:00 AM</span> - <span class="slider-time2">5:00 PM</span>

                </p>
                <div class="sliders_step1">
                    <div id="slider-range"></div>
                </div>
            </div>
<script src="js/sliderdate.js" type="text/javascript"></script>
      			<div class="form-group">
      			<p>Adress <span>*</span></p>
      			<span class="icon-case"><i class="fa fa-map-marker"></i></span>
      				<input type="text" name="postal" id="postal" data-rule="required" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Code postal' doit être renseigné."/>
                      <div class="validation"></div>
      			</div>

      			<div class="form-group">
      			<p>date <span>*</span></p>
      			<span class="icon-case"><i class="fa fa-building-o"></i></span>
      				<input type="text" name="ville" id="ville" data-rule="required" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Ville' doit être renseigné."/>
                      <div class="validation"></div>
      			</div>

      			<div class="form-group">
      			<p>adress <span>*</span></p>
      			<span class="icon-case"><i class="fa fa-phone"></i></span>
      				<input type="text" name="phone" id="phone" data-rule="maxlen:10" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Téléphone' doit être renseigné. Minimum 10 chiffres"/>
                      <div class="validation"></div>
      			</div>

      			<div class="form-group">
      			<p>Theme <span>*</span></p>
      			<span class="icon-case"><i class="fa fa-info"></i></span>
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
      			<p>Subject <span>*</span></p>
      			<span class="icon-case"><i class="fa fa-comment-o"></i></span>
                      <input type="text" name="sujet" id="sujet" data-rule="required" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Sujet' doit être renseigné."/>
                      <div class="validation"></div>
      			</div>

      			<div class="form-group">
      			<p>Message <span>*</span></p>
      			<span class="icon-case"><i class="fa fa-comments-o"></i></span>
                      <textarea name="message" rows="14" data-rule="required" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Message' doit être renseigné."></textarea>
                      <div class="validation"></div>
      			</div>
            <div class="form-group">
              Share on Facebook
              <a href="#" class="fb"><i class="fab fa-facebook"></i></a>
            </div>

      	</div>
      <button type="submit" class="bouton-contact">Send</button>

      </form>
    </div>
  </div>

  <script async type="text/javascript" src="../js/bulma.js"></script>

</body>
</html>
