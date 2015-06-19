$(document).ready(function() {

	$.each(institutions, function(i,v){
		v.city = city[v.city];
		v.cuisine = cuisine[v.cuisine];
		v.type = type[v.type];
	});

	var map;
	function initialize() {
		var bounds = new google.maps.LatLngBounds();
		var markerIcon = { url: '../images/ico-marker.png'};
		var mapOptions = {
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			draggable: true, zoomControl: true, scrollwheel: false, disableDoubleClickZoom: true, navigationControl: true, disableDefaultUI: false
		};
		map = new google.maps.Map(document.getElementById("google-map"), mapOptions);

		$.each(institutions, function(index, value){
			value.marker = new google.maps.Marker({
				position: new google.maps.LatLng(value.lat, value.lng),
				map: map,
				icon: markerIcon,
	        });
        
			google.maps.event.addListener(value.marker, 'click', function() {
				adress-window.setContent('<div class="adress-window">' + value.adress + '</div>');
				adress-window.open(map, this);
			});
			bounds.extend(value.marker.position);
			
  			//}, index * 300);
		});
		map.fitBounds(bounds);
		sorting();
    }
	google.maps.event.addDomListener(window, 'load', initialize);

    /* СТРУКТУРИРОВАНИЕ СПИСКА ЗАВЕДЕНИЙ */

    $.each(institutions, function(index, value){
    	$('#city').append('<option value="' + value.city + '">' + value.city + '</option>');
    	$('#cuisine').append('<option value="' + value.cuisine + '">' + value.cuisine + '</option>');
    	$('#type').append('<option value="' + value.type + '">' + value.type + '</option>');

    	$('.institutions-list .institutions').append('<li class="js-sort-item" data-index="' + index + '">' + 
    		'<span data-value="' + value.city + '" class="city"></span>' + 
    		'<span data-value="' + value.name + '" class="name">' + value.name + '</span>' +
    		'<span data-value="' + value.type + '" class="type">' + value.type + '</span>' +
    		'<span data-value="' + value.cuisine + '" class="cuisine">' + value.cuisine + '</span>' +
    		'<span data-value="' + value.adress + '" class="adress">' + value.adress + '</span>' +
    		'<span data-value="' + value.operation_time + '" class="adress">' + value.operation_time + '</span>' +
    		'<span data-value="' + value.phone + '" class="adress">' + value.phone + '</span>' +
    		'<span data-value="' + value.site + '" class="adress">' + value.site + '</span>' +
    		'<span data-value="' + value.description + '" class="adress">' + value.description + '</span>' +
			'</li>');
    });

    /* СОРТИРОВКА ЗАВЕДЕНИЙ */

    var sorting = function(){
    	var vals = {};
    	vals.city = $('#city').val();
    	vals.cuisine = $('#cuisine').val();
    	vals.type = $('#type').val();
    	$('.js-sort-item').each(function(){
    		var $this = $(this);
    		var this_obj = institutions[parseInt($this.attr('data-index'))];
    		var this_marker = this_obj.marker;
    		//var this_marker = this_obj.marker;
    		var condition = true;
    		$.each(vals, function(i, v){
    			if(!$this.find('[data-value="' + v + '"]').length) {
    				condition = false;
    			}
    		});
    		if(condition) {
    			$this.show();
    			this_marker.setMap(map);
    		} else {
    			$this.hide();
    			this_marker.setMap(null);
    		}
    	});
    }; 

    $('.js-filter-select').on('change', function(){
    	sorting();
    });
}