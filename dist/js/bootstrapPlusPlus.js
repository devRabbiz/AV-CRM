/*!
 * BootstrapPlusPlus v1.0.0-beta (https://bootstrapplusplus.com)
 * Copyright 2017 The BootstrapPlusPlus
 * Licensed under MIT (https://github.com/BootstrapPlusPlus/BootstrapPlusPlus/blob/master/LICENSE.md)
 */

$(document).ready(function(){

  /* script for dropdown on hover */
  $('.dropdown-hover').hover(function() {
        $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeIn(300);
      }, function() {
        $(this).find('.dropdown-menu').stop(true, true).delay(50).fadeOut(300);
  });

  /* script for label color */
  $('.form-group').click(function(){
    $(this).addClass('label-focus');
  });
  $('input').blur(function(){
    $('.form-group').removeClass('label-focus');
  });

  // Ripple (waves) effect
  $(".waves").click(function(event) {
  	var surface = $(this);

  	if (surface.find(".waves-ink").length == 0) {
      surface.prepend("<div class='waves-ink'></div>");
    }

  	var ink = surface.find(".waves-ink");

  	ink.removeClass("animate");

  	if (!ink.height() && !ink.width()) {
  		var d = Math.max(surface.outerWidth(), surface.outerHeight());
  		ink.css({height: d, width: d});
  	}

  	var x = event.pageX - surface.offset().left - (ink.width() / 2);
  	var y = event.pageY - surface.offset().top - (ink.height() / 2);

  	ink.css({
  		top: y + 'px',
  		left: x + 'px'
  	}).addClass("animate");
  });

});
