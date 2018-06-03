<?php
include"conn.php";
session_start();
$selectboxes = array();
$_SESSION["arrayfilter"] = array();
if($_SESSION["bookaroom"] === "rent"){
  include"dbclasses.php";
  $pageauth = new classes;
  $admin = "admin";
  $pageauth->pageauth("rent");
}
else{
  include"dbclasses.php";
  $pageauth = new classes;
  $admin = "admin";
  $pageauth->pageauth("event");
}
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php
    if($_SESSION["bookaroom"] === "rent"){
  ?>
      <title>Rent</title>
  <?php
      }
    elseif($_SESSION["bookaroom"] === "event"){ ?>
      <title>Events</title>
  <?php
      }
  ?>

  <link rel="stylesheet" type="text/css" href="../css/bulma.css">
  <script defer="" src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons'><link rel='stylesheet prefetch' href='css/vuetify.css'>
  <link rel="stylesheet" href="/css/eventcreate.css">
  <link rel="shortcut icon" type="image/png" href="images/flavicon.jpg"/>
  <link rel="stylesheet" type="text/css" href="css/nav.css">
  <script type="text/javascript" src="js/ajaxjquery.js"></script>
  <link rel="stylesheet" href="/css/bulma.css">
  <link rel="stylesheet" type="text/css" href="../css/aside.css">
  <script type="text/javascript">
    function get_hour(){


      return newdate;
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
      function test(){
        var _submit = document.getElementById('_submit'),
        _file = document.getElementById('_file'),
        _progress = document.getElementById('_progress');



        _submit.addEventListener('click', upload);

      }

      function loadrooms(){
        //  $("#roomfilters").load("filterloading.php?fieldcreate=all",function(){});
        filterslider();
        var time = document.getElementById('firsttime').textContent;
        var time2 = document.getElementById('secondtime').textContent;
        var realtime = time.replace(" ","*");
        var realtime2 = time2.replace(" ","*");

          $("#roomevent").load("loadrooms.php?load=first&starttime=" + realtime + "&endtime=" + realtime2,function(){});
    $("#showinfo").load("loadinfobox.php?number=",function(){});

      }
      function loadfunctionsshow(number){

    $("#showinfo").load("loadinfobox.php?number=" + number,function(){});


      }
      function show(number){

      var d =  document.getElementById('showinfo');
      d.classList.add("is-active");


      }
    function safe(){
      var date = document.getElementById('date').value;
      var box = {
        date:date
      }

    $.ajax({
      type: "POST",
      url: "datasession.php",
      data: JSON.stringify(box),
      contentType: "application/json",
      dataType: "json",
    });
    }
    function query(text){
      var time = document.getElementById('firsttime').textContent;
      var time2 = document.getElementById('secondtime').textContent;
      var split1 = time.split(" ");
      var realtime = "";
      for (i = 0; i < split1.length; i++){
          var realtime = realtime + split1[i];
      }
      var split2 = time2.split(" ");
      var realtime2 = "";
      for (i = 0; i < split1.length; i++){
          var realtime2 = realtime2 + split2[i];
      }
      var txt = text;
      var url = "";
      var res = txt.split("_");
      for (i = 0; i < res.length; i++) {

        var value = document.getElementById(res[i]).value;
        if(value === "on"){
          var value = document.getElementById(res[i]).checked;
        }
        if(value === ""){

        }
        else{
          if(url === ""){
            var url = url + res[i] + "@" + value;
          }
          else{
            var url = url + ">" + res[i] + "@" + value;
          }
        }

        console.log(url);
    }

      var realurl = "loadrooms.php?datestart=" + realtime + "&dataend=" + realtime2 + "&variables=" + url;
      $("#roomevent").load(realurl,function(){});
    }
    function takeroom(number){
      var box = {
        numberinput:number
      }
      $.ajax({
        type: "POST",
        url: "datasession.php",
        data: JSON.stringify(box),
        contentType: "application/json",
        dataType: "json",
      });
      closeshow();
    }
    function filterslider(){
      var filter = document.getElementById("roomfilters").style.display;
      switch (filter) {
        case "none":
          $("#roomfilters").show("fast");
          break;
          case "block":
            $("#roomfilters").hide("fade","fast");
            break;
        default:
      }
    }
    function pagingrooms(page,varr){
    if(page === "no"){

    }
    else{
      var txt = varr;
      var url = "";
      var res = txt.split("_");
      for (i = 0; i < res.length; i++) {

        var value = document.getElementById(res[i]).value;
        if(value === "on"){
          var value = document.getElementById(res[i]).checked;
        }
        if(value === ""){

        }
        else{
          if(url === ""){
            var url = url + res[i] + "-" + value;
          }
          else{
            var url = url + "_" + res[i] + "-" + value;
          }
        }

        console.log(url);
    }

      var url = "loadrooms.php?page=" + page + "&variables=" + url;
      $("#roomevent").load(url,function(){});
      $('html, body').animate({ scrollTop: 0 }, 'slow');
    }

    }
  </script>

</head>
<body>
      <div class="loader" id="loading"style="display:none;z-index: 9000;position: fixed;width: 13em;height: 13em;margin-top: 18%;margin-left: 45%;"></div>
  <?php include"phpscripts/navbar.php"; ?>
    <div class="content column is-9">
      <div class="content column is-9-nav nav-aside is-hidden-touch is-hidden-desktop-only">

        <span class="aside-toggle is-marginless">
          <span></span>
          <span></span>
          <span></span>
        </span>

      </div>
      <div id="events" style="width: 100%;" class="section things is-hidden-event">
          <div id="app">

          <v-app>

            <v-content>

        				<v-container>
                  <v-stepper v-model="step" vertical>
                    <v-stepper-header>
                      <?php
                       if($_SESSION["bookaroom"] === "rent"){ ?>
                      <v-stepper-step step="1" :complete="step > 1">Information Renting</v-stepper-step>
                    <?php }elseif($_SESSION["bookaroom"] === "event"){ ?>
                      <v-stepper-step step="1" :complete="step > 1">Information Event</v-stepper-step>
                    <?php } ?>
                      <v-divider></v-divider>
                      <v-stepper-step step="2" :complete="step > 2">Pick a room</v-stepper-step>
                    </v-stepper-header>
                    <v-stepper-items>
                      <v-stepper-content step="1">
                        <?php
                         if($_SESSION["bookaroom"] === "event"){ ?>
                         <v-text-field id="namen" label="Name of event" v-model="registration.eventname" required></v-text-field>

                         <v-text-field label="Max-tickets" id="tickets" type="number"
                            v-model="registration.numtickets" required></v-text-field>
                          <?php }elseif($_SESSION["bookaroom"] === "rent"){ ?>
                            <v-text-field label="Amounth of people attending" id="attending" type="number"
                               v-model="registration.attending" required></v-text-field>
                          <?php } ?>
                          <v-text-field label="Date" id="date" onchange="safe();" type="date"
                                      v-model="registration.date" required></v-text-field>

                                      <div class="column">

                                    <div class="form-group" id="time-range">
                                    <p>
                                    Time: <span id="firsttime" class="slider-time">9:00 AM</span> - <span id="secondtime" class="slider-time2">5:00 PM</span>
                                    </p>
                                      <div class="sliders_step1">
                                        <div id="slider-range"></div>
                                      </div>
                                    </div>

                                  </div>
                                  <?php
                                   if($_SESSION["bookaroom"] === "event"){ ?>
                                     <v-text-field id="Necessities" label="Necessities" type="textarea"
                                        v-model="registration.Necessities" required></v-text-field>
                                  <v-text-field id="discription" label="Discription" type="textarea"
                                     v-model="registration.discription" required></v-text-field>
                                   <?php }
                                   if($_SESSION["bookaroom"] === "event"){ ?>

                                         <p>
                                           <form id="imageupload" action="finalcreateroom.php?imageupload=true" method="post" enctype="multipart/form-data">
                                            <input type="file" name="mainpic" id="mainpic">
                                          </form>

                                         </p>
                                         <div class='progress_outer'>
                                             <div id='_progress' class='progress'></div>
                                         </div>

                                         <label>facebook</label><br>
                                         <label style="margin-left:0 !important" class="switch">
                                           <input type="checkbox"  v-model="registration.facebookcheck" id="facebook">
                                           <span class="slider round"></span>
                                         </label>
                                         <?php
                                       }

                                        if($_SESSION["bookaroom"] === "event"){ ?>
                        <v-btn color="primary" style="float:right" onclick="loadrooms();"id='_submit' @click.native="step = 2">Continue</v-btn>
                        <?php
                      }
                       elseif($_SESSION["bookaroom"] === "rent"){ ?>
                         <v-btn color="primary" style="float:right"onclick="loadrooms();" @click.native="step = 2">Continue</v-btn>
                      <?php }  ?>
                      </v-stepper-content>
                      <v-stepper-content step="2">
                        <div class="wrapper-room-filter">
                        <div style="display: block;visibility:invisible;min-height: 20em;" id="roomfilters">
                          <?php
                            $jscall = "";
                            $prequery = $dbh->prepare("SELECT * FROM details WHERE listoption is null and fldname != 'image' ;");
                            $prequery->execute();
                            while($pre = $prequery->fetch(PDO::FETCH_ASSOC)){
                              if($jscall === ""){
                                $jscall = $pre["fldname"];
                              }
                              else{
                                $jscall .= "_".$pre["fldname"];
                              }
                              $_SESSION["jscall"] = $jscall;
                            }
                            $getall = $dbh->prepare("SELECT * FROM details WHERE listoption is null and fldname != 'image';");
                            $getall->execute();
                            while($all = $getall->fetch(PDO::FETCH_ASSOC)){
                              array_push($_SESSION["arrayfilter"], $all["fldname"]);
                              switch ($all["SortingID"]) {
                                case 1:
                                if($all["fldname"] === "image"){}else{
                                ?>
                                  <v-text-field label="Name of <?php echo $all["fldname"]; ?>" id="<?php echo $all["fldname"]; ?>" onchange="query(<?php echo "'".$jscall."'"; ?>);" v-model="registration.<?php echo $all["fldname"] ?>" required></v-text-field>
                          <?php }  break;
                                case 2: ?>
                                <v-text-field label="how many <?php echo $all["fldname"]; ?>" id="<?php echo $all["fldname"]; ?>" onchange="query(<?php echo "'".$jscall."'"; ?>);" type="number" v-model="registration.<?php echo $all["fldname"]; ?>" required></v-text-field>
                          <?php  break;
                                case 3: ?>
                                <div onclick="query(<?php echo "'".$jscall."'"; ?>);" class="sel sel--<?php echo $all["fldname"]; ?>">
                                  <select  name="<?php echo $all["fldname"]; ?>" id="<?php echo $all["fldname"]; ?>">
                                    <option value="<?php echo $all["fldname"]; ?>" disabled><?php echo $all["fldname"]; ?></option>
                                    <option value="all">all</option>
                                    <?php
                                      $getoptions = $dbh->prepare("SELECT * FROM details WHERE listoption = ".$all["DetailsID"]);
                                      $getoptions->execute();
                                      while($options = $getoptions->fetch(PDO::FETCH_ASSOC)){ ?>
                                        <option value="<?php echo $options["fldname"] ?>"><?php echo $options["fldname"] ?></option>
                              <?php

                                      }


                                    ?>
                                  </select>
                                </div>

                                <hr class="rule">
                          <?php
                                array_push($selectboxes, $all["fldname"]);
                                break;
                                case 4: ?>
                                <label><?php echo $all["fldname"]."(Not available/available)" ?> </label><br>
                                <label style="margin-left:0 !important" class="switch">
                                  <input type="checkbox" onchange="query(<?php echo "'".$jscall."'"; ?>);" v-model="registration.<?php echo $all["fldname"]; ?>" id="<?php echo $all["fldname"] ?>">
                                  <span class="slider round"></span>
                                </label>
                          <?php  break;
                              }

                            }


                          ?>
                        </div>
                       <a><i onclick="filterslider();" style="width:5em;height:5em;" class="fas fa-chevron-circle-down"></i></a>
                        <div style="min-height: 20em;" id="roomevent">

                        </div>

                        </div>

                        <div class="buttonbottom" style="text-align:center;">
                          <v-btn flat @click.native="step = 1">Previous</v-btn>
                          <v-btn color="primary" @click.prevent="submit">Book!</v-btn>
                        </div>
                      </v-stepper-content>
                    </v-stepper-items>
                  </v-stepper>

                </v-container>

            </v-content>


          </v-app>


            <br/><br/>

        </div>
        <div id="showinfo" class="modal">
         </div>
         <?php include"phpscripts/footer.php"; ?>

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js" type="text/javascript"></script>
    <script type="text/javascript">



    </script>
    <script src="js/sliderdate.js" type="text/javascript"></script>

            <script src='//static.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script><script src='https://unpkg.com/vue/dist/vue.js'></script><script src='https://unpkg.com/vuetify/dist/vuetify.min.js'></script>
            <script >new Vue({
              el: '#app',
              data: () => ({
                  step:1,
                  registration:{
                    name:null,
                    email:null,
                    street:null,
                    city:null,
                    state:null,
                    numtickets:0,
                    shirtsize:'XL'
                  },
                  sizes:['S','M','L','XL']
              }),
              methods:{
                submit() {
                  if(document.getElementById('attending') !== null){
                    $( "#loading" ).show();
                    var attending = document.getElementById('attending').value;
                    var time = document.getElementById('firsttime').textContent;
                    var time2 = document.getElementById('secondtime').textContent;
                    var info = {
                      starttime:time,
                      endtime:time2,
                      attendingnum:attending
                    }
                    $.ajax({
                      type: "POST",
                      url: "finalcreateroom.php?createbooking=true",
                      data: JSON.stringify(info),
                      contentType: "application/json",
                      dataType: "json",
                      success: function () {
                          var info = {
                            create:"yes"
                          }
                          console.log('ready');
                          $.ajax({
                            type: "POST",
                            url: "mail.php?roommail=true",
                            data: JSON.stringify(info),
                            contentType: "application/json",
                            dataType: "json",
                          });
                      },
                      error: function () {
                          var info = {
                            create:"yes"
                          }
                          $.ajax({
                            type: "POST",
                            url: "mail.php?roommail=true",
                            data: JSON.stringify(info),
                            contentType: "application/json",
                            dataType: "json",
                            error: function () {
                               window.location="index.php";
                            }
                          });
                      }

                    });
                  }
                  else{
                    $( "#loading" ).show();
                    var nameeventget = document.getElementById('namen').value;
                    var nameevent = nameeventget.split(' ').join('@');
                    var tickets = document.getElementById("tickets").value;
                    var time = document.getElementById('firsttime').textContent;
                    var time2 = document.getElementById('secondtime').textContent;
                    var discriptionget = document.getElementById('discription').value;
                    var discription = discriptionget.split(' ').join('@');
                    var Necessitiesget = document.getElementById('Necessities').value;
                    var Necessities = discriptionget.split(' ').join('@');
                    var info = {
                      name:nameevent,
                      ticket:tickets,
                      starttime:time,
                      endtime:time2,
                      discrip:discription,
                      nessessit:Necessities
                    }
                //  alert("jaaaaaaaaaaaa");
                var facebook = document.getElementById('facebook').checked;
                if(facebook == false){

                  $.ajax({
                    type: "POST",
                    url: "finalcreateroom.php?createevent=true",
                    data: JSON.stringify(info),
                    contentType: "application/json",
                    dataType: "json",
                    error: function(response){
                      document.getElementById("imageupload").submit();
                    }
                  });
                }
                else{
                    $.ajax({
                      type: "POST",
                      url: "finalcreateroom.php?createevent=true",
                      data: JSON.stringify(info),
                      contentType: "application/json",
                      dataType: "json",
                    });
                    var facebook = document.getElementById('facebook').checked;
                    if(facebook == false){
                      document.getElementById("imageupload").submit();
                    }
                    else{
                      var nameeventget = document.getElementById('namen').value;
                      var nameevent = nameeventget.split(' ').join('@');
                      var info = {
                        name:nameevent
                      }

                      $.ajax({
                        type: "POST",
                        url: "raw.php",
                        data: JSON.stringify(info),
                        contentType: "application/json",
                        dataType: "json",
                        error: function(response){
                          document.getElementById("imageupload").submit();
                        }
                      });
                    }
                  }
                }


                  console.log('done');




                }
              }
            })
            $("#slider-range").slider({
                range: true,
                min: 0,
                max: 1440,
                step: 5,
                values: [540, 1020],
                slide: function (e, ui) {
                    var hours1 = Math.floor(ui.values[0] / 60);
                    var minutes1 = ui.values[0] - (hours1 * 60);

                    if (hours1.length == 1) hours1 = '0' + hours1;
                    if (minutes1.length == 1) minutes1 = '0' + minutes1;
                    if (minutes1 == 0) minutes1 = '00';
                    if (hours1 >= 12) {
                        if (hours1 == 12) {
                            hours1 = hours1;
                            minutes1 = minutes1 + " PM";
                        } else {
                            hours1 = hours1 - 12;
                            minutes1 = minutes1 + " PM";
                        }
                    } else {
                        hours1 = hours1;
                        minutes1 = minutes1 + " AM";
                    }
                    if (hours1 == 0) {
                        hours1 = 12;
                        minutes1 = minutes1;
                    }



                    $('.slider-time').html(hours1 + ':' + minutes1);

                    var hours2 = Math.floor(ui.values[1] / 60);
                    var minutes2 = ui.values[1] - (hours2 * 60);

                    if (hours2.length == 1) hours2 = '0' + hours2;
                    if (minutes2.length == 1) minutes2 = '0' + minutes2;
                    if (minutes2 == 0) minutes2 = '00';
                    if (hours2 >= 12) {
                        if (hours2 == 12) {
                            hours2 = hours2;
                            minutes2 = minutes2 + " PM";
                        } else if (hours2 == 24) {
                            hours2 = 11;
                            minutes2 = "59 PM";
                        } else {
                            hours2 = hours2 - 12;
                            minutes2 = minutes2 + " PM";
                        }
                    } else {
                        hours2 = hours2;
                        minutes2 = minutes2 + " AM";
                    }

                    $('.slider-time2').html(hours2 + ':' + minutes2);
                }
            });
            $(document).ready(function(){
                  $(".sel__box__options--").click(function(){
                    query(<?php echo "'".$jscall."'"; ?>);
                  });
              });
            </script>
        </div>

      </div>
      <div id="selectboxstyles">
      <style media="screen">
        <?php
        $num = 500;
        foreach($selectboxes as &$option){
          echo ".sel--".$option."{
            z-index:".$num."
          }
          ";
          $num--;
        }
        ?>
      </style>
      </div>

    <script type="text/javascript" src="js/event.js"></script>
      <script async type="text/javascript" src="../js/bulma.js"></script>
<?php

 ?>
    </body>
    </html>
