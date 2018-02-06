<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="../css/bulma.css">
    <link rel="stylesheet" type="text/css" href="../css/aside.css">
    <link rel="stylesheet" type="text/css" href="../css/grid-gallery.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.4/js/all.js"></script>
    <script async type="text/javascript" src="../js/bulma.js"></script>
    <link rel="stylesheet" href="css/admin.css">
  </head>
  <body>
    <nav class="nav is-dark has-shadow is-hidden-tablet" id="top">
      <div class="container">
        <span class="nav-toggle">
          <span></span>
          <span></span>
          <span></span>
        </span>
        <div class="nav-right nav-menu is-hidden-tablet">
          <a class="nav-item is-tab is-active">
            Events
          </a>
          <a class="nav-item is-tab">
            My meetings
          </a>
          <a class="nav-item is-tab">
            My events
          </a>
          <a class="nav-item is-tab">
            Newsfeed
          </a>
        </div>
      </div>
    </nav>
    <div class="columns">
      <aside class="column is-3 aside hero is-fullheight is-hidden-mobile">
        <div>
          <div class="account has-text-centered">
            <a href="#">
              <figure class="avatar">
                <img src="images/avatar.png">
              </figure>
            </a>
          </div>
          <div class="main scroll">
            <div class="title">Main</div>
            <a href="index.php" class="item"><span class="icon"><i class="fa fa-calendar-alt"></i></span><span class="name">Events</span></a>
            <a href="#" class="item"><span class="icon"><i class="fa fa-users"></i></span><span class="name">My meetings</span></a>
            <a href="#" class="item"><span class="icon"><i class="fa fa-calendar-check"></i></span><span class="name">My events</span></a>
            <a href="#" class="item"><span class="icon"><i class="fa fa-exclamation"></i></span><span class="name">Newsfeed</span></a>
  <br>
  <br>
            <div class="title">Event management</div>
            <a href="#" class="item"><span class="icon"><i class="fa fa-calendar-alt"></i></span><span class="name">Make an event</span></a>
            <a href="#" class="item"><span class="icon"><i class="fa fa-users"></i></span><span class="name">My events</span></a>
            <a href="#" class="item"><span class="icon"><i class="fa fa-calendar-check"></i></span><span class="name">Finished events</span></a>
  <br>
  <br>
            <a href="admin.php" class="title active"><i class="fa fa-cog"></i>  Admin </a>
            <a href="#" class="item"><span class="icon"><i class="fa fa-user"></i></span><span class="name">Account management</span></a>
            <a href="#" class="item"><span class="icon"><i class="fa fa-users"></i></span><span class="name">Meeting management</span></a>
            <a href="#" class="item"><span class="icon"><i class="fa fa-calendar-check"></i></span><span class="name">Event management</span></a>
            <a href="#" class="item"><span class="icon"><i class="fa fa-exclamation"></i></span><span class="name">Admin newsfeed</span></a>
          </div>
        </div>
      </aside>
      <div class="content column is-9">
        <div class="tile is-ancestor">
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
                            <input class="input is-fullwidth" type="text" placeholder="Find an account">
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
                    <th class="account">Account</th>
                    <th>right 1</th>
                    <th>right 2</th>
                    <th>right 3</th>
                    <th>right 4</th>
                    <th>right 5</th>
                    <th>right 6</th>
                    <th class="mrg"></th>
                  </tr>
                </table>
                <div class="scrollacc">
                 <table>
                   <tr>
                     <td class="account">Account 1</td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                   </tr>
                   <tr class="is-light">
                     <td class="account">Account 2</td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                   </tr>
                   <tr>
                     <td class="account">Account 1</td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                   </tr>
                   <tr class="is-light">
                     <td class="account">Account 2</td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                   </tr>
                   <tr>
                     <td class="account">Account 1</td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                   </tr>
                   <tr class="is-light">
                     <td class="account">Account 2</td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                   </tr>
                   <tr>
                     <td class="account">Account 1</td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                   </tr>
                   <tr class="is-light">
                     <td class="account">Account 2</td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                   </tr>
                   <tr>
                     <td class="account">Account 1</td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                   </tr>
                   <tr class="is-light">
                     <td class="account">Account 2</td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                   </tr>
                   <tr>
                     <td class="account">Account 1</td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                   </tr>
                   <tr class="is-light">
                     <td class="account">Account 2</td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                   </tr>
                   <tr>
                     <td class="account">Account 1</td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                   </tr>
                   <tr class="is-light">
                     <td class="account">Account 2</td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                   </tr>
                   <tr>
                     <td class="account">Account 1</td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                   </tr>
                   <tr class="is-light">
                     <td class="account">Account 2</td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                     <td><input type="checkbox"></td>
                   </tr>
                 </table>
               </div>
              </div>
            </article>
          </div>
        </div>
      </div>
  </body>
</html>
