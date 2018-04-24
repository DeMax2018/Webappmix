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
<style media="screen">

</style>
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
<?php include"phpscripts/navbar.php"; ?>
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
