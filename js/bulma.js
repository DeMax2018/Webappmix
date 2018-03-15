// The following code is based off a toggle menu by @Bradcomp
// source: https://gist.github.com/Bradcomp/a9ef2ef322a8e8017443b626208999c1
$(document).ready(function(){
    $("#nav-toggle").click(function(){
        $("#nav-menu").slideToggle();
    });
});
(function() {
    var burger = document.querySelector('.nav-toggle');
    burger.addEventListener('click', function() {
        burger.classList.toggle('is-active');
    });
})();
(function() {
    var burger = document.querySelector('.aside-toggle');
    var menu = document.querySelector('aside');
    var page = document.querySelector('.is-9');
    var fixed = document.querySelector('.is-9-nav');
    burger.addEventListener('click', function() {
        burger.classList.toggle('is-active');
        menu.classList.toggle('is-active');
        page.classList.toggle('is-active');
        fixed.classList.toggle('is-active');
    });
})();

  function click(){

//open popup


  $('.popup').addClass('is-visible');

}
//close popup
jQuery(document).ready(function($){
$('.popup').on('click', function(event){
  if( $(event.target).is('.popup-close') || $(event.target).is('.popup') ) {
    event.preventDefault();
    $(this).removeClass('is-visible');
  }
});
//close popup when clicking the esc keyboard button
$(document).keyup(function(event){
    if(event.which=='27'){
      $('.popup').removeClass('is-visible');
    }
  });
});

function show(){
  var d = document.getElementById("showinfo");
d.className += " is-active";
}
