function test(){
  var info = {
    ja:"ja"
  }
  $.ajax({
    type: "POST",
    url: "raw.php",
    data: JSON.stringify(info),
    contentType: "application/json",
    dataType: "json",
  });
  }
