function rights(){
  var parameter = document.getElementById('filter').value;
  $("#scrollaccr").load("adminfunctions.php?filter=" + parameter,function(){});
}
function eventsearch(){
  var search = document.getElementById('search').value;
  $("#events").load("indexfunctions.php?search=" + search,function(){});
}
