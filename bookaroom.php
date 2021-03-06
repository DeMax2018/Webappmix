<?php
include"conn.php";
session_start();
$selectboxes = array();
$_SESSION["arrayfilter"] = array();

 ?>
<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Events</title>
  <link rel="stylesheet" type="text/css" href="../css/bulma.css">

  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons'><link rel='stylesheet prefetch' href='css/vuetify.css'>

    <link rel="stylesheet" href="/css/eventcreate.css">
  <link rel="stylesheet" type="text/css" href="css/nav.css">
<style media="screen">
.sel__box{
  position: inherit;
}
.tdinfo{
  border: 1px solid black;
}
  .popup-trigger {
  display: block;
  width: 2em;
  right: 2rem;
  margin: 3em auto;
  text-align: center;
  color: #FFF;
  font-size: 18px;
  padding:1rem 2rem;
  text-decoration:none;
  font-weight: bold;
  text-transform: uppercase;
  border-radius: 50em;
  background: #35a785;
  box-shadow: 0 3px 0 rgba(0, 0, 0, 0.07);
  transition:300ms all;
  }
  .td{
    border: 1px solid black;
  }
.popup-trigger:hover {
  opacity:.8;
}

.popup {
position: fixed;
left: 0;
top: 0;
height: 100%;
z-index: 1000;
width: 100%;
background-color: rgba(94, 110, 141, 0.9);
opacity: 0;
visibility: hidden;
transition:500ms all;

}

.popup.is-visible {
opacity: 1;
visibility: visible;
transition:1s all;
}

.popup-container {
transform:translateY(-50%);
transition:500ms all;
position: relative;
width: 40%;
margin: 2em auto;
top: 5%;
padding:5rem;
background: #FFF;
border-radius: .25em .25em .4em .4em;
text-align: center;
box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
}

.is-visible .popup-container {
transform:translateY(0);
transition:500ms all;
}

.popup-container .popup-close {
position: absolute;
top: 8px;
font-size:0;
right: 8px;
width: 30px;
height: 30px;
}


.popup-container .popup-close::before,
.popup-container .popup-close::after {
content: '';
position: absolute;
top: 12px;
width: 14px;
height: 3px;
background-color: #8f9cb5;
}

.popup-container .popup-close::before {
-webkit-transform: rotate(45deg);
-moz-transform: rotate(45deg);
-ms-transform: rotate(45deg);
-o-transform: rotate(45deg);
transform: rotate(45deg);
left: 8px;
}

.popup-container .popup-close::after {
-webkit-transform: rotate(-45deg);
-moz-transform: rotate(-45deg);
-ms-transform: rotate(-45deg);
-o-transform: rotate(-45deg);
transform: rotate(-45deg);
right: 8px;
}


.popup-container .popup-close:hover:before,
.popup-container .popup-close:hover:after {
background-color:#35a785;
transition:300ms all;
}

</style>
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
      $("#roomevent").load("loadrooms.php?load=first",function(){});
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
        var url = url + res[i] + "-" + value;
      }
      else{
        var url = url + "_" + res[i] + "-" + value;
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
}
  </script>
</script>

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
      <div class="secondsubcontainer">
        <ul class="ulsearch nobullets isflex justify_stuff">

        </ul>
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
          <div class="sectionfix">
            <a href="#" class="item"><span class="icon"><i class="fa fa-plus"></i></span></a>
          </div>
          <div class="sectionfix">
            <a href="#" class="item"><span class="icon"><i class="fa fa-calendar-check"></i></span><span class="name">Event management</span></a>
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
          <a href="index.php" class="item active"><span class="icon"><i class="fa fa-calendar-alt"></i></span><span class="name">Events</span></a>
          <a href="#" class="item"><span class="icon"><i class="fa fa-users"></i></span><span class="name">My meetings</span></a>
          <a href="#" class="item"><span class="icon"><i class="fa fa-calendar-check"></i></span><span class="name">My events</span></a>
          <a href="eventcreate.php" class="item"><span class="icon"><i class="fa fa-calendar-plus"></i></span><span class="name">Make an event</span></a>
          <a href="#" class="item"><span class="icon"><i class="fa fa-calendar-alt"></i></span><span class="name">Event management</span></a>
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
      <div class="content column is-9-nav nav-aside">

        <span class="aside-toggle is-marginless">
          <span></span>
          <span></span>
          <span></span>
        </span>
        <ul class="ulsearch nobullets isflex justify_stuff is-hidden-mobile">


        </ul>
      </div>
      <div id="events" style="margin:auto;" class="section things">
          <div id="app">

          <v-app>

            <v-content>

        				<v-container>
                  <v-stepper v-model="step" vertical>
                    <v-stepper-header>
                      <v-stepper-step step="1" :complete="step > 1">Information event</v-stepper-step>
                      <v-divider></v-divider>
                      <v-stepper-step step="2" :complete="step > 2">Pick a room</v-stepper-step>
                    </v-stepper-header>
                    <v-stepper-items>
                      <v-stepper-content step="1">

                         <v-text-field id="namen" label="Name of event" v-model="registration.eventname" required></v-text-field>
                         <v-text-field label="Max-tickets" id="tickets" type="number"
                            v-model="registration.numtickets" required></v-text-field>
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
                                  <v-text-field id="discription" label="Discription" type="textarea"
                                     v-model="registration.discription" required></v-text-field>

                                         <p>
                                            <input onchange="test()" type='file' id='_file'>
                                         </p>
                                         <div class='progress_outer'>
                                             <div id='_progress' class='progress'></div>
                                         </div>
                                         <label>facebook</label><br>
                                         <label style="margin-left:0 !important" class="switch">
                                           <input type="checkbox"  v-model="registration.facebookcheck" id="facebook">
                                           <span class="slider round"></span>
                                         </label>
                        <v-btn color="primary" style="float:right" onclick="loadrooms();"id='_submit' @click.native="step = 2">Continue</v-btn>
                      </v-stepper-content>
                      <v-stepper-content step="2">
                        <div class="wrapper-room-filter">
                        <div style="display: block;float: left;min-height: 20em; width: 40%;" id="roomfilters">
                          <?php
                            $jscall = "";
                            $prequery = $dbh->prepare("SELECT * FROM details WHERE listoption is null ;");
                            $prequery->execute();
                            while($pre = $prequery->fetch(PDO::FETCH_ASSOC)){
                              if($jscall === ""){
                                $jscall = $pre["fldname"];
                              }
                              else{
                                $jscall .= "_".$pre["fldname"];
                              }
                            }
                            $getall = $dbh->prepare("SELECT * FROM details WHERE listoption is null ;");
                            $getall->execute();
                            while($all = $getall->fetch(PDO::FETCH_ASSOC)){
                              array_push($_SESSION["arrayfilter"], $all["fldname"]);
                              switch ($all["SortingID"]) {
                                case 1: ?>
                                  <v-text-field label="Name of <?php echo $all["fldname"]; ?>" id="<?php echo $all["fldname"]; ?>" onchange="query(<?php echo "'".$jscall."'"; ?>);" v-model="registration.<?php echo $all["fldname"] ?>" required></v-text-field>
                          <?php  break;
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
                                  <input type="checkbox" onchange="query(<?php echo "'".$jscall."'"; ?>);" v-model="registration.check" id="<?php echo $all["fldname"] ?>">
                                  <span class="slider round"></span>
                                </label>
                          <?php  break;
                              }

                            }


                          ?>
                        </div>
                        <div style="float: right;width: 60%;min-height: 20em;" id="roomevent">

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


            <br/><br/>Debug: {{registration}}

        </div>
        <div id="testapi">
          <p>jajajajajajajajajajajaj</p>
        </div>
        <div id="showinfo" class="modal">
         </div>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js" type="text/javascript"></script>
    <script type="text/javascript">

    function test(){
    var _submit = document.getElementById('_submit'),
    _file = document.getElementById('_file'),
    _progress = document.getElementById('_progress');

    var upload = function(){

        if(_file.files.length === 0){
            return;
        }

        var data = new FormData();
        data.append('SelectedFile', _file.files[0]);

        var request = new XMLHttpRequest();
        request.onreadystatechange = function(){
            if(request.readyState == 4){
                try {

                    var resp = JSON.parse(request.response);

                } catch (e){
                    var resp = {
                        status: 'error',
                        data: 'Unknown error occurred: [' + request.responseText + ']'
                    };
                }
                alert(resp.status + ': ' + resp.data);
            }
        };

        request.upload.addEventListener('progress', function(e){
            _progress.style.width = Math.ceil(e.loaded/e.total) * 100 + '%';
        }, false);

        request.open('POST', 'receive.php');
        request.send(data);
    }

    _submit.addEventListener('click', upload);
    }

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

                  var nameeventget = document.getElementById('namen').value;
                  var nameevent = nameeventget.split(' ').join('+');
                  var tickets = document.getElementById("tickets").value;
                  var time = document.getElementById('firsttime').textContent;
                  var time2 = document.getElementById('secondtime').textContent;
                  var discriptionget = document.getElementById('discription').value;
                  var discription = discriptionget.split(' ').join('+');
                  var imageget = document.getElementById('_file').value;
                  var image = imageget.replace(/^.*[\\\/]/, '');
                  var info = {
                    name:nameevent,
                    ticket:tickets,
                    starttime:time,
                    endtime:time2,
                    discrip:discription,
                    imagename:image
                  }
                  console.log('done');
                  $.ajax({
                    type: "POST",
                    url: "finalcreateroom.php?$createevent=true",
                    data: JSON.stringify(info),
                    contentType: "application/json",
                    dataType: "json",
                    success: function (info) {
                      alert("Your event is created!");
                      var facebook = document.getElementById('facebook').checked;
                      if(facebook == false){
                      }
                      else{
                        var nameeventget = document.getElementById('namen').value;
                        var nameevent = nameeventget.split(' ').join('+');
                        var info = {
                          name:nameevent
                        }
                        console.log('ready');
                        $.ajax({
                          type: "POST",
                          url: "raw.php",
                          data: JSON.stringify(info),
                          contentType: "application/json",
                          dataType: "json",
                        });

                      }
                    },
                    error: function (info) {
                      alert("Your event is created!");
                      var facebook = document.getElementById('facebook').checked;
                      if(facebook == false){
                      }
                      else{
                        var nameeventget = document.getElementById('namen').value;
                        var nameevent = nameeventget.split(' ').join('+');
                        var info = {
                          name:nameevent
                        }
                        console.log('ready');
                        $.ajax({
                          type: "POST",
                          url: "raw.php",
                          data: JSON.stringify(info),
                          contentType: "application/json",
                          dataType: "json",
                        });

                      }
                    }

                  });



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
print_r($_SESSION["arrayfilter"]);
 ?>
    </body>
    </html>
