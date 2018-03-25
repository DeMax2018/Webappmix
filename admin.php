<?php
include"conn.php";
//include "auth.php";

session_start();
 ?>
<html>
  <head>
        <link rel="stylesheet" href="css/eventcreate.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="../css/bulma.css">
    <link rel="stylesheet" type="text/css" href="css/nav.css">

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script type="text/javascript" src="jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="jquery-ui-1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="js1.js"></script>
<script src="js/noframework.waypoints.min.js" charset="utf-8"></script>
    <link rel="stylesheet" type="text/css" href="../css/grid-gallery.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.4/js/all.js"></script>
    <link href="css/jquerymobile.css" rel="stylesheet" type="text/css" />
    <link href="view_event.css" rel="stylesheet" type="text/css" />
<style media="screen">
  .fullsize{
    display: inline-flex;
    width: 100%;
  }
  .newline{
    text-align: center;
  }
</style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.js"></script>
    <script src="/js/room.js"></script>
    <link rel="stylesheet" href="/css/room.css">

    <link rel="stylesheet" href="css/admin.css">
    <script>

        //update checkbox styles on change event
        //add ui-btn-active style to vertical checkbox group
        function updatePosts(event, ui) {
            if($("#posts").prop("checked")) {
                $("#postslbl").addClass("ui-btn-active").trigger("refresh");
            } else {
                if($("#postslbl").hasClass("ui-btn-active"))
                $("#postslbl").removeClass("ui-btn-active").trigger("refresh");
            }
        }

        function updateComments(event, ui) {
            if($("#comments").prop("checked")) {
                $("#commentslbl").addClass("ui-btn-active").trigger("refresh");
            } else {
                if($("#commentslbl").hasClass("ui-btn-active"))
                $("#commentslbl").removeClass("ui-btn-active").trigger("refresh");
            }
        }
        function addfielts(){
          /*var sending = document.getElementById("sending");
          sending.style.display = sending.style.display === 'none' ? '' : ''; */
          var result = [];
          var url = "filterloading.php?fieldcreate=1&get=";
          var options = document.getElementById('filter-menu');
          var opt;

          for (var i=0, iLen=options.length; i<iLen; i++) {
            opt = options[i];

            if (opt.selected) {
              result.push(opt.value || opt.text);
            }
          }
          for (var i = 0, len = result.length ; i < len; i++) {
            url += "_" + result[i];
          }

          $("#filterresults").load(url,function(){});

          return url;
        }
        function createroom(text){
          var txt = text;
          var url = "";
          var res = txt.split("_");
          for (i = 0; i < res.length; i++) {
            var value = document.getElementById(res[i]).value;
            if(url === ""){
              var url = url + res[i] + "-" + value;
            }
            else{
              var url = url + "_" + res[i] + "-" + value;
            }
        }
          var realurl = "filterloading.php?createroom=true&variables=" + url ;

          $("#testing").load(realurl,function(){});
        /*  $.ajax({
            type: "POST",
            url: "filterloading.php?createroom=true",

            contentType: "application/json",
            dataType: "json",
          }); */
        }
        function addfilter(){
          var name = document.getElementById("namefilter").value;
          var type = document.getElementById("typeselect").value;
          var urluse = "";
          alert(urluse);
          var parameters = {
            "name": name,
            "type": type
          }
          $.ajax({
              type: "POST",
              url: "filterloading.php?addfilter=true",
              data: JSON.stringify(parameters),
              contentType: "application/json",
              dataType: "json",
            });
        }
        function addbuilding(){
          var name = document.getElementById('namebuilding').value;
          var parameters = {
            "name": name
          }
          $.ajax({
              type: "POST",
              url: "filterloading.php?addbuilding=true",
              data: JSON.stringify(parameters),
              contentType: "application/json",
              dataType: "json",
            });
        }
        function changeroomstate(){
          var stateswitch = document.getElementById('roomswitch').checked;
          if(stateswitch === true){
            $("#addroomfilters").load("adminswitch.php?switch=true",function(){
              $("#addroomfilters").trigger("create");
            });
          }
          else if(stateswitch === false){
            $("#addroomfilters").load("adminswitch.php?switch=false",function(){
              $("#addroomfilters").trigger("create");
            })
          }
        }
        function showselect(){
          var id = document.getElementById('room-menu').value;
          $("#loadfilters").load("filterloading.php?showselects=" + id,function(){
            $("#loadfilters").trigger("create");
          });
        }
        function modifyroom(text){
          var txt = text;
          var url = "";
          var res = txt.split("_");
          for (i = 0; i < res.length; i++) {
            var value = document.getElementById(res[i]).value;
            if(url === ""){
              var url = url + res[i] + "-" + value;
            }
            else{
              var url = url + "_" + res[i] + "-" + value;
            }
        }
          var realurl = "filterloading.php?createroom=true&modify=true&variables=" + url ;

          $("#testing").load(realurl,function(){});
          changeroomstate();
        }
    </script>
  </head>
  <body id=body>


        <script async type="text/javascript" src="../js/bulma.js"></script>

        <nav class="nav is-dark has-shadow is-hidden-widescreen" id="top" >
          <div class="container">
            <div class="subcontainer">
              <span class="nav-toggle" id="nav-toggle">
                <span></span>
                <span></span>
                <span></span>
              </span>
            </div>
            <div class="thirdsubcontainer">
              <a href=""><i class="fas fa-sign-out-alt"></i></a>
              <a href="">Hi, *Stroenelinus*</a>
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
                <a href="#" style="float: right; font-size:50px;"><i class="fas fa-sign-out-alt" style="position: absolute; font-size: 32px; top: 40px; left: 275px;"></i></a>
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
        <div class="tile is-ancestor things">
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
                  <nav class="level is-fullwidth">
                    <!-- Left side -->
                    <div class="level-left">
                      <div class="level-item is-fullwidth">
                        <div class="field has-addons is-fullwidth">
                          <p class="control">
                            <input class="input is-fullwidth" id="filter" onkeyup="rights();" type="text" placeholder="Find an account">
                          </p>
                        </div>
                      </div>
                    </div>

                    <!-- Right side -->
                    <div class="level-right">
                      <p class="control">
                        <button class="button" data-role='none'>
                          Switch to groups
                        </button>
                      </p>
                    </div>
                  </nav>
                </div>
                <div class="tablescroll">

                 <table id="scrollaccr"data-role="listview" class="People">
                   <tr class="headcol">
                     <th class="accounta">Account</th>
                     <?php
                     $numright = $dbh->prepare("SELECT * FROM `Right`");
                     $numright->execute();
                     while($record = $numright->fetch(PDO::FETCH_ASSOC)){ ?>
                     <th class="is-hidden-touch"><?php echo $record["fldName"] ?></th>

                     <?php
                      if($record["RightID"] == 1){
                        echo "<th class='is-hidden-desktop'><i class='fas fa-calendar-plus'><i></th>";
                      }
                      elseif ($record["RightID"] == 2) {
                        echo "<th class='is-hidden-desktop'><i class='fas fa-calendar-times'><i></th>";
                      }
                      elseif ($record["RightID"] == 3) {
                        echo "<th class='is-hidden-desktop'><i class='fas fa-edit'><i></th>";
                      }
                    }; ?>
                   </tr>

                     <?php
                     $sth = $dbh->prepare("SELECT * from User");
                       $sth->execute();
                     while($record = $sth->fetch(PDO::FETCH_ASSOC)){ ?>
                       <tr class="is-light">
                         <td id="names" class="accounta"><?php echo $record["fldName"]." ".$record["fldLastname"] ?></td>
                         <?php
                         $num = $numright->rowCount();
                         $checkbox = $dbh->prepare("SELECT * FROM PrivateRights WHERE UserID = ".$record["UserID"]);
                         $checkbox->execute();
                         while ($rows = $checkbox->fetch(PDO::FETCH_ASSOC)) {
                           if($rows["Create_events"] == 1){
                              echo '<td><input type="checkbox" id="create" data-role="flipswitch" name="'.$record["fldName"].' '.$record["fldLastname"].'" onchange="create_event(this.name,1);" data-on-text="" data-off-text="" data-wrapper-class="custom-label-flipswitch" checked></td>';
                           }
                           else{
                             echo '<td><input type="checkbox" id="create" data-role="flipswitch" name="'.$record["fldName"].' '.$record["fldLastname"].'" onchange="create_event(this.name,1);" data-on-text="" data-off-text="" data-wrapper-class="custom-label-flipswitch"></td>';
                           }
                           if($rows["Delete_Events"] == 1){
                              echo "<td><input  id='delete' data-role='flipswitch' name='".$record["fldName"]." ".$record["fldLastname"]."' onchange='create_event(this.name,2);' checked type='checkbox' data-on-text='' data-off-text='' data-wrapper-class='custom-label-flipswitch'></td>";
                           }
                           else{
                             echo "<td><input  id='delete' data-role='flipswitch'  name='".$record["fldName"]." ".$record["fldLastname"]."' onchange='create_event(this.name,2);' type='checkbox' data-on-text='' data-off-text='' data-wrapper-class='custom-label-flipswitch'></td>";
                           }
                           if($rows["Acces_Rights_System"] == 1){
                              echo "<td><input  id='right' data-role='flipswitch'  name='".$record["fldName"]." ".$record["fldLastname"]."' onchange='create_event(this.name,3);' checked type='checkbox' data-on-text='' data-off-text='' data-wrapper-class='custom-label-flipswitch'></td>";
                           }
                           else{
                             echo "<td><input  id='right' data-role='flipswitch'  name='".$record["fldName"]." ".$record["fldLastname"]."' onchange='create_event(this.name,3);' type='checkbox' data-on-text='' data-off-text='' data-wrapper-class='custom-label-flipswitch'></td>";
                           }
                         }
                         ?>
                       </tr>


                   <?php }?>


                 </table>
               </div>
              </div>
            </article>

          </div>
          <div id="selecting" class="tile is-parent">

              <article class="tile is-child box">
                <p class="title">Create a new room.</p>
                <p class="subtitle">You can create a room and give it certain objects.</p>
                <p class="subtitle">Or you can modify a room!</p>
                <div class="">
                  <label>Modify Room</label>
                  <input  id='roomswitch' data-role='flipswitch' onchange='changeroomstate();'  type='checkbox' data-on-text='' data-off-text='' data-wrapper-class='custom-label-flipswitch'>
                </div>
                          <div id="addroomfilters">
                            <div class="flexing" style="justify-content:center;">
                              <div  onchange="" class="percentage">
                                <label>Specifications</label>
                                <select id="filter-menu"  placeholder="ja" data-native-menu="false" multiple>
                                    <?php
                                    $all = $dbh->prepare("SELECT * FROM details WHERE SortingID != '';");
                                    $all->execute();
                                    while($records = $all->fetch(PDO::FETCH_ASSOC)){ ?>
                                      <option value="<?php echo $records["fldname"]; ?>"><?php echo $records["fldname"]; ?></option>
                                    <?php }
                                    ?>
                                </select>
                              </div>


            </div><button type="button" onclick="addfielts();" name="button">generate fields</button>
            <div id="filterresults" class="flexing" style="display: block;">

            </div>

          </div>
              </article>
<div id="testing">

</div>
          </div>
          <div id="selecting" class="tile is-parent">

              <article class="tile is-child box">
                <p class="title">Create a new filter for a room.</p>
                <p class="subtitle">Give a room certain objects that people can filter on.</p>
                <div class="flexing">
                  <div class="percentage">
                    <label>Name of the filter</label>
                    <input type="text" class="input" placeholder="give the name of the room" id="namefilter" name="" value="">
                  </div>
                  <div class="percentage">
                    <label>What kind of filter is this?</label>
                    <select id="typeselect"  placeholder="ja" data-native-menu="false">
                        <?php
                        $all = $dbh->prepare("SELECT * FROM sorting;");
                        $all->execute();
                        while($records = $all->fetch(PDO::FETCH_ASSOC)){ ?>
                          <option value="<?php echo $records["SortingID"]; ?>"><?php echo $records["fldSorting"]; ?></option>
                        <?php }
                        ?>
                    </select>
                  </div>
                  <div class="percentage">
                    <label>Click here when the other 2 fields are done!</label>
                    <input type="button" onclick="addfilter();" class="input" id="addfilters" name="" value="Add new filter">
                  </div>
                </div>
          </div>
          <div id="selecting" class="tile is-parent">

              <article class="tile is-child box">
                <p class="title">Create a new Building!</p>
                <p class="subtitle">Add a new building to your database!</p>
                <div class="flexing">
                  <div class="percentage">
                    <label>Name of the building</label>
                    <input type="text" class="input" placeholder="give the building a name" id="namebuilding" name="" value="">
                  </div>
                  <div class="percentage">
                    <label>Click here to add a new building</label>
                    <input type="button" onclick="addbuilding();" class="input" id="addbuilding" name="" value="Add new filter">
                  </div>
                </div>
          </div>
        </div>
    </div>

  </body>

</html>
