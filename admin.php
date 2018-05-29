<?php
include"conn.php";
//include "auth.php";
session_start();
$_SESSION["rightsearch"] = "user";
include"dbclasses.php";
$pageauth = new classes;
$admin = "admin";
$pageauth->pageauth("admin");
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
    <link rel="shortcut icon" type="image/png" href="images/flavicon.jpg"/>
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
.styled-select {
   background: url(http://i62.tinypic.com/15xvbd5.png) no-repeat 96% 0;
   height: 29px;
   overflow: hidden;
   width: 240px;
}

.styled-select select {
   background: transparent;
   border: none;
   font-size: 14px;
   height: 29px;
   padding: 5px; /* If you add too much padding here, the options won't show in IE */
   width: 268px;
}

.styled-select.slate {
   background: url(http://i62.tinypic.com/2e3ybe1.jpg) no-repeat right center;
   height: 34px;
   width: 240px;
}

.styled-select.slate select {
   border: 1px solid #ccc;
   font-size: 16px;
   height: 34px;
   width: 268px;
}

/* -------------------- Rounded Corners */
.rounded {
   -webkit-border-radius: 20px;
   -moz-border-radius: 20px;
   border-radius: 20px;
}

.semi-square {
   -webkit-border-radius: 5px;
   -moz-border-radius: 5px;
   border-radius: 5px;
}

/* -------------------- Colors: Background */
.slate   { background-color: #ddd; }
.green   { background-color: #779126; }
.blue    { background-color: #3b8ec2; }
.yellow  { background-color: #eec111; }
.black   { background-color: #000; }

/* -------------------- Colors: Text */
.slate select   { color: #000; }
.green select   { color: #fff; }
.blue select    { color: #fff; }
.yellow select  { color: #000; }
.black select   { color: #fff; }


/* -------------------- Select Box Styles: danielneumann.com Method */
/* -------------------- Source: http://danielneumann.com/blog/how-to-style-dropdown-with-css-only/ */
#mainselection select {
   border: 0;
   color: #EEE;
   background: transparent;
   font-size: 20px;
   font-weight: bold;
   padding: 2px 10px;
   width: 378px;
   *width: 350px;
   *background: #58B14C;
   -webkit-appearance: none;
}

#mainselection {
   overflow:hidden;
   width:350px;
   -moz-border-radius: 9px 9px 9px 9px;
   -webkit-border-radius: 9px 9px 9px 9px;
   border-radius: 9px 9px 9px 9px;
   box-shadow: 1px 1px 11px #330033;
   background: #58B14C url("http://i62.tinypic.com/15xvbd5.png") no-repeat scroll 319px center;
}


/* -------------------- Select Box Styles: stackoverflow.com Method */
/* -------------------- Source: http://stackoverflow.com/a/5809186 */
select#soflow, select#soflow-color {
   -webkit-appearance: button;
   -webkit-border-radius: 2px;
   -webkit-box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.1);
   -webkit-padding-end: 20px;
   -webkit-padding-start: 2px;
   -webkit-user-select: none;
   background-image: url(http://i62.tinypic.com/15xvbd5.png), -webkit-linear-gradient(#FAFAFA, #F4F4F4 40%, #E5E5E5);
   background-position: 97% center;
   background-repeat: no-repeat;
   border: 1px solid #AAA;
   color: #555;
   font-size: inherit;
   margin: 20px;
   overflow: hidden;
   padding: 5px 10px;
   text-overflow: ellipsis;
   white-space: nowrap;
   width: 300px;
}

select#soflow-color {
   color: #fff;
   background-image: url(http://i62.tinypic.com/15xvbd5.png), -webkit-linear-gradient(#779126, #779126 40%, #779126);
   background-color: #779126;
   -webkit-border-radius: 20px;
   -moz-border-radius: 20px;
   border-radius: 20px;
   padding-left: 15px;
}
</style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.js"></script>
    <script src="/js/room.js"></script>
    <link rel="stylesheet" href="/css/room.css">

    <link rel="stylesheet" href="css/admin.css">
    <script>


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
          var result = [];
          var url = "filterloading.php?fieldcreate=1&get=";
          var options = document.getElementById('filter-menu');
          var opt;
          var finaladd = false;
          for (var i=0, iLen=options.length; i<iLen; i++) {
            opt = options[i];

            if (opt.selected) {
              result.push(opt.value || opt.text);
            }
          }
          for (var i = 0, len = result.length ; i < len; i++) {
            if(result[i] === "image"){
              finaladd = true;
            }
            url += "_" + result[i];
          }
          if(finaladd == true){
            url += "&reloadpage=true";
          }
          $("#filterresults").load(url,function(){
            $("#filterresults").trigger("create");
          });

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
        }
        function addfilter(){
          var name = document.getElementById("namefilter").value;
          var type = document.getElementById("typeselect").value;
          var urluse = "";
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
            changebuildingstate();
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
        function changerightstate(){
          var stateswitch = document.getElementById('rightswitch').checked;
          var parameter = document.getElementById('filter').value;
          if(stateswitch === true){
            $("#scrollaccr").load("adminswitch.php?switch=true&right=yes&filter=" + parameter,function(){
              $("#scrollaccr").trigger("create");
            });
          }
          else if(stateswitch === false){
            var parameter = document.getElementById('filter').value;
            $("#scrollaccr").load("adminfunctions.php?user=yes&filter=" + parameter,function(){
              $("#scrollaccr").trigger("create");
            });
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
          //var realurl = "filterloading.php?createroom=true&modify=true&variables=" + url ;

          //$("#testing").load(realurl,function(){});
          changeroomstate();
        }
        function changefilterstate(){
          var checked = document.getElementById("filterswitch").checked;
          $("#addfilterssw").load("phpscripts/filters.php?state=" + checked,function(){
            $("#body").trigger("create");
          });
        }
        function changebuildingstate(){
          var checked = document.getElementById('buildingswitch').checked;
          $("#buildingload").load("phpscripts/filters.php?statebuilding=" + checked, function(){
            $("#buildingload").trigger("create");
          })

        }
        function updatetype(){
          var id = document.getElementById("filterselect").value;
          $("#changetype").load("phpscripts/filters.php?loadfiltersetup=" + id,function(){
              $("#changetype").trigger("create");
          });

        }
        function checkaddfilter(){
          var checkforaddfilter = document.getElementById("typeselect").value;
          if(checkforaddfilter === "addselect"){
            $("#invisible").css("display","initial");
            $("#selectselectbox").load("adminfunctions.php?addfilterselect=true",function(){
              $("#selectselectbox").trigger("create");
            });
          }
          else{
            $("#selectselectbox").empty();
            $("#invisible").css("display","none");
          }
        }
        function deletefilter(){
          var del = document.getElementById('filterselect').value;
          var data = {
            ids:del
          }
          $.ajax({
              type: "POST",
              url: "adminfunctions.php?deletefilter=true",
              data: JSON.stringify(data),
              contentType: "application/json",
              dataType: "json",
            });
            changefilterstate()
        }
        function modifyfilter(){
          var id = document.getElementById("filterselect").value;
          var name = document.getElementById("namefilter").value;
          var type = document.getElementById("typeselect").value;
          if(type === "addselect"){
            var addid = document.getElementById("addtofilterid").value;
            var url = "adminfunctions.php?modifyfilter=true&ids=" + id + "&nam=" + name + "&addidd=" + addid;
          }
          else{
            var url = "adminfunctions.php?modifyfilter=true&ids=" + id + "&nam=" + name + "&typ=" + type;

        }
        $("#addfilterssw").load(url,function(){
          $("#body").trigger("create");
        });

      }
      function modifybuilding(){
        var id = document.getElementById('buildingselect').value;
        var info = document.getElementById("namebuilding").value;
        var inputs = info.replace(" ","£");
        var data = {
          input:inputs
        }
        $.ajax({
            type: "POST",
            url: "adminfunctions.php?modifybuilding=" + id,
            data: JSON.stringify(data),
            contentType: "application/json",
            dataType: "json",
          });

      changebuildingstate();
    }
    function deletebuilding(){
      var id = document.getElementById("buildingselect").value;
      var data = {
        ids:id
      }
      $.ajax({
          type: "POST",
          url: "adminfunctions.php?deletebuilding=true",
          data: JSON.stringify(data),
          contentType: "application/json",
          dataType: "json",
        });
        changebuildingstate();
    }
    function loadbuildingname(){
      var id = document.getElementById('buildingselect').value;
      $("#buildingname").load("phpscripts/filters.php?buildingnameload=" + id,function(){
        $("#buildingname").trigger("create");
      })
    }
    </script>
  </head>
  <body id=body>


        <script async type="text/javascript" src="../js/bulma.js"></script>

        <?php include"phpscripts/navbar.php"; ?>

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

                      <i class="fas fa-user"></i>
                      <input  id='rightswitch' data-role='flipswitch' onchange='changerightstate();'  type='checkbox' data-on-text='' data-off-text='' data-wrapper-class='custom-label-flipswitch'>
                      <i class="fas fa-users"></i>
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
                     while($record = $numright->fetch(PDO::FETCH_ASSOC)){
                       $name = str_replace("_"," ",$record["fldName"]);
                       ?>
                     <th class="is-hidden-touch"><?php echo $name ?></th>

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
                              echo '<td><input type="checkbox" id="create'.$record["fldName"].' '.$record["fldLastname"].'" data-role="flipswitch" name="'.$record["fldName"].' '.$record["fldLastname"].'" onchange="create_event(this.name,1);" data-on-text="" data-off-text="" data-wrapper-class="custom-label-flipswitch" checked></td>';
                           }
                           else{
                             echo '<td><input type="checkbox" id="create'.$record["fldName"].' '.$record["fldLastname"].'" data-role="flipswitch" name="'.$record["fldName"].' '.$record["fldLastname"].'" onchange="create_event(this.name,1);" data-on-text="" data-off-text="" data-wrapper-class="custom-label-flipswitch"></td>';
                           }
                           if($rows["Delete_Events"] == 1){
                              echo "<td><input  id='delete".$record["fldName"]." ".$record["fldLastname"]."' data-role='flipswitch' name='".$record["fldName"]." ".$record["fldLastname"]."' onchange='create_event(this.name,2);' checked type='checkbox' data-on-text='' data-off-text='' data-wrapper-class='custom-label-flipswitch'></td>";
                           }
                           else{
                             echo "<td><input  id='delete".$record["fldName"]." ".$record["fldLastname"]."' data-role='flipswitch'  name='".$record["fldName"]." ".$record["fldLastname"]."' onchange='create_event(this.name,2);' type='checkbox' data-on-text='' data-off-text='' data-wrapper-class='custom-label-flipswitch'></td>";
                           }
                           if($rows["Acces_Rights_System"] == 1){
                              echo "<td><input  id='right".$record["fldName"]." ".$record["fldLastname"]."' data-role='flipswitch'  name='".$record["fldName"]." ".$record["fldLastname"]."' onchange='create_event(this.name,3);' checked type='checkbox' data-on-text='' data-off-text='' data-wrapper-class='custom-label-flipswitch'></td>";
                           }
                           else{
                             echo "<td><input  id='right".$record["fldName"]." ".$record["fldLastname"]."' data-role='flipswitch'  name='".$record["fldName"]." ".$record["fldLastname"]."' onchange='create_event(this.name,3);' type='checkbox' data-on-text='' data-off-text='' data-wrapper-class='custom-label-flipswitch'></td>";
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

          <div id="filtersw" class="tile is-parent">

              <article class="tile is-child box">
                <p class="title">Create a new filter for a room.</p>
                <p class="subtitle">Give a room certain objects that people can filter on.</p>
                <i class="fas fa-plus"></i>
                <input  id='filterswitch' data-role='flipswitch' onchange='changefilterstate();'  type='checkbox' data-on-text='' data-off-text='' data-wrapper-class='custom-label-flipswitch'>
                <i class="fas fa-cogs"></i>
                <div id="addfilterssw">
                <div id="filterload" class="flexing">
                  <div class="percentage">
                    <label>Name</label>
                    <input type="text" class="input" placeholder="give the name of the room" id="namefilter" name="" value="">
                  </div>
                  <div class="percentage">
                    <label>Type</label>
                    <select id="typeselect" onchange="checkaddfilter();"placeholder="ja" data-native-menu="false">
                        <?php
                        $all = $dbh->prepare("SELECT * FROM sorting;");
                        $all->execute();
                        while($records = $all->fetch(PDO::FETCH_ASSOC)){ ?>
                          <option value="<?php echo $records["SortingID"]; ?>"><?php echo $records["fldSorting"]; ?></option>
                        <?php }
                        ?><option value="addselect">add to filter</option>
                    </select>
                  </div><div class="percentage" style="display:none" id="invisible">
                  <div id="selectselectbox"></div></div>
                  <div class="percentage">
                    <label>Add</label>
                    <input type="button" onclick="addfilter();" class="input" id="addfilters" name="" value="Add new filter">
                  </div>
                </div>
                </div>
              </article>
          </div>
          <div id="selecting" class="tile is-parent">

              <article class="tile is-child box">
                <p class="title">Create a new Building!</p>
                <p class="subtitle">Add a new building to your database!</p>
                <i class="fas fa-plus"></i>
                <input  id='buildingswitch' data-role='flipswitch' onchange='changebuildingstate();'  type='checkbox' data-on-text='' data-off-text='' data-wrapper-class='custom-label-flipswitch'>
                <i class="fas fa-cogs"></i>
                <div id="buildingload">
                <div class="flexing">
                  <div class="percentage">
                    <label>Name</label>
                    <input type="text" class="input" placeholder="give the building a name" id="namebuilding" name="" value="">
                  </div>
                  <div class="percentage">
                    <label>Add</label>
                    <input type="button" onclick="addbuilding();" class="input" id="addbuilding" name="" value="Add new filter">
                  </div>
                </div>
              </div>
          </div>
        </div>
    </div>
<?php include"phpscripts/footer.php"; ?>
  </body>

</html>
