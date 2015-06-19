$(document).ready(function() {
	$.fn.smart_map = function(map_array) {
	$(this).each(function(){
		var parent = $(this),
			map_block = parent.find('.js-map-block'),
			map_desc = parent.find('.js-map-desc'),
			active_id = false;

		if(parent.hasClass('js-admin-map')){
			$(document).on('click', '.js-map-dot', function(){
				return false;
			});

			$(document).on('click', '.js-map-block', function(e){
				admin_click(e);
			});

			$(document).on('input', '.js-admin-map-x, .js-admin-map-y', function(){
				admin_pos();
			});

			$(document).on('change', '.js-admin-map-radius', function(){
				admin_rad();
			});

		} else {
			$(document).on('click', '.js-map-dot', function(){
				var id = $(this).attr('data-id');
				openDesc(id);

				return false;
			});

			$(document).on('click', '.js-desc-close', function(){
				closeDesc();
				return false;
			});

			$(document).on('click', '.js-map-control', function(){
				goDesc($(this).attr('data-direction'));
				return false;
			});
		}

		function admin_click(e) {
			var x = e.pageX - map_block.offset().left;
			var y = e.pageY - map_block.offset().top;
			var net_x = 999;
			var max_diff = 999;
			for(var i = 0; i < 691; i = i+12) {
				var diff = Math.abs(x - i);
				if(diff < max_diff) {
					max_diff = diff;
					net_x = i;
				}
			}
			var max_diff_y = 999;
			for(var i = 0; i < 376; i = i+12) {
				var diff = Math.abs(y - i);
				if(diff < max_diff_y) {
					max_diff_y = diff;
					net_y = i;
				}
			}
			x = net_x - 6;
			y = net_y - 6;
			if(parent.find('.js-admin-dot').length) {
				parent.find('.js-admin-dot').css({
					'left': x,
					'top': y
				});
			} else {
				var dot_default = { radius: $('.js-admin-map-radius').val(),
									posY: y,
									posX: x };

				var str = dotStr(0, dot_default, true);
				parent.find('.js-map-block').append(str);
			}

			$('.js-admin-map-x').val(x);
			$('.js-admin-map-y').val(y);
		}

		function admin_pos() {
			var x = parseInt($('.js-admin-map-x').val());
			var y = parseInt($('.js-admin-map-y').val());

			parent.find('.js-admin-dot').css({
				'left': x,
				'top': y
			});
		}

		function admin_rad() {
			var x = parseInt($('.js-admin-map-x').val());
			var y = parseInt($('.js-admin-map-y').val());
			var radius = parseInt($('.js-admin-map-radius').val());

			parent.find('.js-admin-dot').remove();
			var dot_settings = { radius: parseInt($('.js-admin-map-radius').val()),
								posY: y,
								posX: x };

			var str = dotStr(0, dot_settings, true);
			parent.find('.js-map-block').append(str);
		}

		function goDesc(d) {
			var dir;
			if(d == '<') {
				dir = -1;
			} else {
				dir = 1;
			}

			var new_id = active_id + dir;

			if(new_id == -1) {
				new_id = map_array.length - 1;
			}
			if(new_id == map_array.length) {
				new_id = 0;
			}

			openDesc(new_id);
		}

		function closeDesc() {
			map_block.attr('style', transform('translateX(0px) translateY(0px)'));
			$('.js-map-dot').removeClass('active');
			map_desc.hide();
		}

		function dotStr(index, value, admin_dot) {
			var rad_width = value.radius * 11;
			var style_str = 	'margin-top: -' + rad_width/2 + 'px; '+
				'margin-left: -' + rad_width/2 + 'px; '+
				'width: ' + rad_width + 'px; '+
				'height: ' + rad_width + 'px; '+
				'border-radius: ' + rad_width + 'px; ';
			if(admin_dot) {
				var admin_class = ' js-admin-dot';
			} else {
				var admin_class = '';
			}

			var str = 	'<a href="#" data-index="' + value.index + '" class="map-dot js-map-dot' + admin_class + '" style="top: ' + value.posY + 'px; left: ' + value.posX + 'px;" data-id="' + index + '">'+
				//'<i class="map-rad" style="' + style_str + '"></i>'+
				'</a>';

			return str;
		}

		function init(x, y, r) {
			var map_html = '';

			$.each(map_array, function(index, value){
				var str = dotStr(index, value, true);
				map_html += str;
			});

			map_block.html(map_html);
			map_desc.hide();

			if($(window).width() <= 768) {
				openDesc(0);
			}
		}

		init();
	});
	}
	$('.js-admin-map').smart_map([
		{
	    	posX: 200, posY: 200
		}
	]);

	/* ТУЛТИП ТОЧЕЧНОЙ КАРТЫ */

	$.each(plant, function(index, value) {
		$('.brand-menu ul').prepend(
			'<li><span><a href="#" class="js-popup-hover" data-index="' + index + '">' + value.city + '</a></span></li>'
		);

		//$('.brand-menu ul li').mouseover(cross_pop_up);
	});

	var dots_array = [];
	$.each(plant, function(i,v){
		dots_array.push({
			posX: v.left,
			posY: v.top,
			index: i
		});
	});

	$('.js-client-map').smart_map(dots_array);

	$(document).on('mouseover', '.js-map-dot, .js-popup-hover', function(){
		var value = plant[$(this).attr('data-index')];
		$('.js-map-dot[data-index="' + $(this).attr('data-index') + '"]').append (
			'<div class="popup">' + 
			'<div class="title">' +
			value.city +
			'</div>' +
			
			'<p>' +
			value.name + ' ' + value.post_code + ' ' + value.adress +
			'</p>' +

			'<p>' +
			value.phone +
			'</p>' +

			'</div>'
		);

		$('.popup').show();
	});

	$(document).on('mouseout', '.js-map-dot, .js-popup-hover', function(){
		$('.popup').remove();
	});
}