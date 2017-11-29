;(function($, window, document, undefined) { //jquery reference

$(window).scroll(function(){
	var scroll = $(window).scrollTop();
	var windowHeight = $(window).height() - 15;

	if ($('.parallax-bg').length > 0) {

	  var parallaxFactorPositive = (scroll * 0.08) + 40;
	  $(".parallax-bg").css('background-position', '50% ' + parallaxFactorPositive + '%');
	}

});

})(window.Zepto || window.jQuery, window, document);