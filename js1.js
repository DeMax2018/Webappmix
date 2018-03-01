function rights(){
  var parameter = document.getElementById('filter').value;
  $("#scrollaccr").load("adminfunctions.php?filter=" + parameter,function(){});
}
function eventsearch(){
  var search = document.getElementById('search').value;
  $("#events").load("indexfunctions.php?search=" + search,function(){});
}
function passwchecker(){
  var first = document.getElementById('password').value;
  var checker = document.getElementById('passchecker').value;
  if(first !== checker){ //hint bij js altijd !== en === gebruiken!
    //hier moeten nog toggles komen
  }
}
function create_event(names,type){
  alert(names);
  if(document.getElementById('create').checked == 1){
    var box = {
      checked: 1,
      name: names,
      type: type
    }
  }
  else{
    var box = {
      checked: 0,
      name: names,
      type: type
    }
  }
  console.log(box);
  $.ajax({
    type: "POST",
    url: "adminfunctionscreate.php",
    data: JSON.stringify(box),
    contentType: "application/json",
    dataType: "json",
  });
}

function mailevent(){
  var x = document.getElementsByTagName("p")[0].getAttribute("name");
  var parameters = {
    "id": x
  }
  $.ajax({
    type: "POST",
    url: "mail.php",
    data: JSON.stringify(parameters),
    contentType: "application/json",
    dataType: "json",
  });
}
