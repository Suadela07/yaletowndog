$(window).scroll(function() {
  if ($(document).scrollTop() > 50) {
    $('.site-header').addClass('scroll_start');
    $('.site-branding').addClass('scroll_start');
    $('.headwrapper').addClass('scroll_start');
    $('.headerlogo').addClass('scroll_start');
    $('.headerlogosmall').addClass('scroll_start');
    $('.headerlogotext').addClass('scroll_start');
    $('nav').addClass('scroll_start');
    $('.placehold').addClass('scroll_start');
    $('.menu-toggle').addClass('scroll_start');
  } else {
    $('.site-header').removeClass('scroll_start');
    $('.site-branding').removeClass('scroll_start');
    $('.headwrapper').removeClass('scroll_start');
    $('.headerlogo').removeClass('scroll_start');
    $('.headerlogosmall').removeClass('scroll_start');
    $('.headerlogotext').removeClass('scroll_start');
    $('nav').removeClass('scroll_start');
    $('.placehold').removeClass('scroll_start');
    $('.menu-toggle').removeClass('scroll_start');
  }
});
