;(function($, window, document, undefined) { //jquery reference

$(window).scroll(function(){
	if ($(window).width() > 991) {
		var scroll = $(window).scrollTop();
		var windowHeight = $(window).height() - 15;

		if ($('.parallax-bg').length > 0) {
		  var parallaxFactorPositive = (scroll * 0.08) + 40;
		  $(".parallax-bg").css('background-position', '50% ' + parallaxFactorPositive + '%');
		}

		if ($('.parallax-img').length > 0) {

			$(".parallax-img.down").height($(".parallax-img.down img").height());
			$(".parallax-img.up").height($(".parallax-img.up img").height());

		  var parallaxFactorPositive = (scroll * 0.1) - 180;
		  var parallaxFactorPositiveDown = (scroll * 0.1) +110;
		  $(".parallax-img.down img").css('margin-bottom', '-' + parallaxFactorPositiveDown + 'px');
		  $(".parallax-img.up img").css('margin-top', '-' + parallaxFactorPositive + 'px');
		}
	}
});

$(document).ready(function(){
	$('.topic-item').each(function(){
		$(this).height($(this).width());
	});
});

})(window.Zepto || window.jQuery, window, document);