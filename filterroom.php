<html>
    <head>
        <link href="https://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.css" rel="stylesheet" type="text/css" />
        <link href="view_event.css" rel="stylesheet" type="text/css" />

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.js"></script>
        <script src="/js/room.js"></script>
        <link rel="stylesheet" href="/css/room.css">

        <title>View Event</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <script>
            $("#main").live("pageshow", function(event, data) {
                //add icons to horizontal checkbox group
                $("#twitterlbl").children("span").append("<span class='ui-icon ui-icon-shadow ui-icon-checkbox-off'>").trigger("create");
                $("#twitterlbl").addClass("ui-btn-icon-left").trigger("refresh");
                $("#facebooklbl").children("span").append("<span class='ui-icon ui-icon-shadow ui-icon-checkbox-off'>").trigger("create");
                $("#facebooklbl").addClass("ui-btn-icon-left").trigger("refresh");
                updatePosts();
                updateComments();
                $("#posts").bind("change", updatePosts);
                $("#comments").bind("change", updateComments);
            });

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
        </script>
        </head>
    <body>

  <!-- Main Page -->
  <form style="width: 50%;" class="" action="index.html" method="post">

    <div id="main" data-role="page" data-theme="a">
        <div data-role="header" data-theme="a">
            <h1>Create Event</h1>
        </div>
        <div data-role="content">
               <label for="text-6">Event Name:</label>
               <input type="text" style="width:50%;" name="text-6" id="text-6" value="" placeholder="e.g. Badminton Grp">
                <legend>Choose Category/Sport:</legend>
                    <select id="filter-menu" data-native-menu="false" multiple>
                        <option value="SFO">Opt 1</option>
                        <option value="LAX">Opt 2</option>
                        <option value="YVR">Opt 3</option>
                        <option value="YYZ">Opt 4</option>
                    </select>

          			<div data-role="fieldcontain">
        	     	    <label for="date">Date:</label>
        	     	    <input type="date" name="date" id="date" value=""  />
          			</div>


                <label for="select-custom-1">Location:</label>
                <select name="select-custom-1" id="select-custom-1" data-native-menu="false">
                    <option value="1">The 1st Option</option>
                    <option value="2">The 2nd Option</option>
                    <option value="3">The 3rd Option</option>
                    <option value="4">The 4th Option</option>
                </select>

                <fieldset data-role="controlgroup" data-type="horizontal" data-theme="a">
                    <legend>Start Time:</legend>
                    <label for="select-native-11">Select A</label>
                    <select name="select-native-11" id="select-native-11">
                        <option value="#">01</option>
                        <option value="#">02</option>
                      <option value="#">03</option>
                        <option value="#">04</option>
                        <option value="#">05</option>
                      <option value="#">06</option>
                        <option value="#">07</option>
                        <option value="#">08</option>
                      <option value="#">09</option>
                        <option value="#">10</option>
                        <option value="#">11</option>
                      <option value="#">12</option>
                    </select>
                    <label for="select-native-12">Select B</label>
                    <select name="select-native-12" id="select-native-12">
                        <option value="#">00</option>
                        <option value="#">10</option>
                        <option value="#">20</option>
                        <option value="#">30</option>
                        <option value="#">40</option>
                        <option value="#">50</option>
                    </select>
                  <label for="select-native-12">Select B</label>
                    <select name="select-native-12" id="select-native-12">
                        <option value="#">AM</option>
                        <option value="#">PM</option>
                    </select>
                </fieldset>

                <fieldset data-role="controlgroup" data-type="horizontal" data-theme="a">
                    <legend>End Time:</legend>
                    <label for="select-native-11">Select A</label>
                    <select name="select-native-11" id="select-native-11">
                        <option value="#">01</option>
                        <option value="#">02</option>
                        <option value="#">03</option>
                        <option value="#">04</option>
                        <option value="#">05</option>
                        <option value="#">06</option>
                        <option value="#">07</option>
                        <option value="#">08</option>
                        <option value="#">09</option>
                        <option value="#">10</option>
                        <option value="#">11</option>
                        <option value="#">12</option>
                    </select>
                    <label for="select-native-12">Select B</label>
                    <select name="select-native-12" id="select-native-12">
                        <option value="#">00</option>
                        <option value="#">10</option>
                        <option value="#">20</option>
                        <option value="#">30</option>
                        <option value="#">40</option>
                        <option value="#">50</option>
                    </select>
                    <label for="select-native-12">Select B</label>
                    <select name="select-native-12" id="select-native-12">
                        <option value="#">AM</option>
                        <option value="#">PM</option>
                    </select>
                </fieldset>

                <div data-role="fieldcontain">
                    <fieldset data-role="controlgroup" data-type="horizontal">
                          <legend>Share To:</legend>
                          <input type="checkbox" name="twitter" id="twitter" />
                          <label for="twitter" id="twitterlbl">Twitter</label>
                          <input type="checkbox" name="facebook" id="facebook" />
                          <label for="facebook" id="facebooklbl">Facebook</label>
                    </fieldset>
                </div>

                <label for="textarea-1">Description:</label>
                <textarea name="textarea-1" id="textarea-1"></textarea>

                            <button class="ui-btn ui-btn-icon-left ui-shadow-icon ui-btn-b">Submit</button>
            </form>



        </div>
    </div>
    </body>
</html>
