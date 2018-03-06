// The following code is based off a toggle menu by @Bradcomp
// source: https://gist.github.com/Bradcomp/a9ef2ef322a8e8017443b626208999c1
(function() {
    var burger = document.querySelector('.nav-toggle');
    var menu = document.querySelector('.nav-menu');
    burger.addEventListener('click', function() {
        burger.classList.toggle('is-active');
        menu.classList.toggle('is-active');
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
function hover(){
  var span1 = document.querySelector('.spans1');
  var span2 = document.querySelector('.spans2');
  var span3 = document.querySelector('.spans3');
  span1.style.background= '#1fc8db';
  span2.style.background= '#1fc8db';
  span3.style.background= '#1fc8db';
}
function hoverout(){
  var span1 = document.querySelector('.spans1');
  var span2 = document.querySelector('.spans2');
  var span3 = document.querySelector('.spans3');
  span1.style.background= '#69707a';
  span2.style.background= '#69707a';
  span3.style.background= '#69707a';
}
