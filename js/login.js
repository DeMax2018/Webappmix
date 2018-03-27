function login() {
  $("#register").fadeOut(500);
  $("#div-register").animate({color: '#7a7a7a', backgroundColor: 'white'}, 1000);
  $("#login").delay(500).fadeIn(500);
  $("#div-login").animate({color: 'white', backgroundColor: '#0093D1'}, 1000);

}
function register() {
  $("#login").fadeOut(500);
  $("#div-login").animate({color: '#7a7a7a', backgroundColor: 'white'}, 1000);
  $("#register").delay(500).fadeIn().animate({color: '#7a7a7a'}, 500);
  $("#div-register").animate({color: 'white', backgroundColor: '#0093D1'}, 1000);
}
var inputs = document.querySelectorAll( '.inputfile' );
Array.prototype.forEach.call( inputs, function( input )
{
	var label	 = input.nextElementSibling,
		labelVal = label.innerHTML;

	input.addEventListener( 'change', function( e )
	{
		var fileName = '';
		if( this.files && this.files.length > 1 )
			fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
		else
			fileName = e.target.value.split( '\\' ).pop();

		if( fileName )
			label.querySelector( 'span' ).innerHTML = fileName;
		else
			label.innerHTML = labelVal;
	});
});

function emailcheck(){
  var mailregister = document.getElementById('mailregister').value;
  var mailuse = mailregister.replace("@","_")
  var dataValues = {
    mail:mailuse
  }
  $.ajax({
            type: 'POST',
            dataType: 'json',
            data: JSON.stringify(dataValues),
            url: 'succestest.php',
            success: function(response){
                 if(response.success) {
                   element = document.getElementById("mailregister");
                   element.classList.remove("is-danger");
                   element.classList.add("is-success");
                 }
                 else {
                   element = document.getElementById("mailregister");
                   element.classList.add("is-danger");
                   element.classList.remove("is-success");
                   alert('this email is already used!');
                 }
            }
        });
}
