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
function create_event(names){
  if(document.getElementById('create').checked == 1){
    var box = {
      checked: "yes",
      name: names
    }
  }
  else{
    var box = {
      checked: "no",
      name: names
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
