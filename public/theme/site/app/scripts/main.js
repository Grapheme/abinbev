$(document).ready(function() {

	$('fotorama').fotorama();

	$('.fix').hover(function() {
		$('.fix-2').addClass('smoke');
			$('.fix-2.smoke').hover(function() {
			$('.responsibility-page-head').addClass('kek');
		});
	});

	$("a.product").fancybox({
		width: 643,
		height: 435,
		autoSize: false,
		afterShow : function(){
			$(".about-product").mCustomScrollbar();
		}
	});
	

});