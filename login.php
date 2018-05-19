<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <script defer src="https://use.fontawesome.com/releases/v5.0.4/js/all.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
  <!-- Bulma Version 0.6.0 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.0/css/bulma.min.css" integrity="sha256-HEtF7HLJZSC3Le1HcsWbz1hDYFPZCqDhZa9QsCgVUdw=" crossorigin="anonymous" />
  <link rel="stylesheet" type="text/css" href="../css/login.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/color/jquery.color.plus-names-2.1.2.js"></script>
  <script async type="text/javascript" src="../js/bulma.js"></script>
  <script async type="text/javascript" src="../js/login.js"></script>
  <script type="text/javascript">
  $(document).ready(function () {
  $('#checkpass').keyup(function () {
      var pass = document.getElementById('pass').value;
      var checkpass = document.getElementById('checkpass').value;
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
$(document).ready(function () {
  $('#maillogin').change(function () {
      var mailcheck = document.getElementById('maillogin').value;
      if(mailcheck != ""){
        element = document.getElementById("maillogin");
        element.classList.add("is-success");
        element.classList.remove("is-danger");
        $("#profilepreload").load("loginfunctions.php?profilepreload=" + mailcheck, function(){});
        var info = {
          mail:mailcheck
        }
        $.ajax({
          type: "POST",
          url: "loginfunctions.php?checkmail=true",
          data: JSON.stringify(info),
          contentType: "application/json",
          dataType: "json",
          success: function (resp) {
            if (resp.success === true){
            element.classList.add("is-success");
            element.classList.remove("is-danger");
          }
            else {
              element.classList.add("is-danger");
              element.classList.remove("is-success");
            }
          },
          error: function () {
            element.classList.add("is-danger");
            element.classList.remove("is-success");
          }

        });
      }
      else{
        element = document.getElementById("maillogin");
        element.classList.add("is-danger");
        element.classList.remove("is-success");
      }
  });
});
  </script>
</head>
<body>
  <section class="hero is-success is-fullheight">
    <div class="hero-body">
      <div class="container has-text-centered">
        <div class="box column is-4 is-offset-4 menu">
          <div class="div-login" id="div-login">
            <a class="title" onclick="login()">Login</a>
          </div>
          <div class="div-register" id="div-register">
            <a class="title" onclick="register()">Register</a>
          </div>
        </div>
        <div class="column is-4 is-offset-4" id="login">
          <p class="subtitle">Please login to proceed.</p>
          <div class="box">
            <div id="profilepreload">
              <figure class="avatar">
                <img src="images/avatar.png">
              </figure>
            </div>

            <form action="loginacces.php" method="post">
              <div class="field">
                <div class="control has-icons-left has-icons-right">
                  <input class="input is-large" type="email" name="maillog" id="maillogin" placeholder="Email" autofocus required>
                  <span class="icon is-small is-left">
                    <i class="fas fa-user"></i>
                  </span>
                  <span class="icon is-small is-right">
                    <i class="fas fa-check"></i>
                  </span>
                </div>
              </div>
              <div class="field">
                <div class="control has-icons-left has-icons-right">
                  <input class="input is-large" name="passlogin" type="password" id="passwordlogin" placeholder="Password">
                  <span class="icon is-small is-left">
                    <i class="fas fa-lock"></i>
                  </span>
                  <span class="icon is-small is-right">
                    <i class="fas fa-exclamation-triangle"></i>
                  </span>
                </div>
              </div>
              <button type="submit" style="width:100%;" class="button is-block is-info is-large">Login</button>
            </form>
          </div>
          <p>
          </p>
        </div>



        <div class="column is-4 is-offset-4 register" id="register">
          <p class="subtitle">Don't have an account yet? Please, register here.</p>
          <div class="box">
            <form method="post" action="loginfunctions.php">

                <div class="field">
                  <p class="grey">Who are you?</p>
                  <div class="names">
                  <input class="input is-large" type="text" name="First_Name" placeholder="First Name*" autofocus required>
                  <input class="input is-large" type="text" name="Last_Name" placeholder="Last Name*" required>
                </div>
              </div>
              <div class="field">
                <p class="grey">What are your credentials?</p>
                <div class="control">
                  <input class="input is-large" type="email" id="mailregister" onchange="emailcheck()" name="email" placeholder="Your Email*" autofocus="" required>
                </div>
              </div>
              <div class="field">
                <div class="control">
                  <input class="input is-large" type="password" id="pass" name="password" placeholder="Your Password*" required>
                </div>
                <div class="control">
                  <input class="input is-large" type="password" id="checkpass" name="checkpass" placeholder="Confirm Password*" required>
                </div>
              </div>
              <button style="width:100%;"class="button is-block is-info is-large" type="submit">Register</button>
            </form>
          </div>
          <p>
          </p>
        </div>
      </div>
    </div>
  </section>

</body>
</html>
