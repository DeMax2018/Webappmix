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
