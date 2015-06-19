$(document).ready(function() {

	$('fotorama').fotorama();

	$("a.product").fancybox({
		width: 643,
		height: 435,
		autoSize: false,
		afterShow : function(){
			$(".about-product").mCustomScrollbar();
		}
	});

	$('.institutions-list').mCustomScrollbar();

	$('.fix').hover(function() {
		$('.fix-2').addClass('smoke');
			$('.fix-2.smoke').hover(function() {
			$('.responsibility-page-head').addClass('kek');
		});
	});
	
});