$(document).ready(function(){function a(){var a=new google.maps.LatLngBounds,n={url:"../images/ico-marker.png"},e={mapTypeId:google.maps.MapTypeId.ROADMAP,draggable:!0,zoomControl:!0,scrollwheel:!1,disableDoubleClickZoom:!0,navigationControl:!0,disableDefaultUI:!1};t=new google.maps.Map(document.getElementById("google-map"),e),$.each(institutions,function(s,e){e.marker=new google.maps.Marker({position:new google.maps.LatLng(e.lat,e.lng),map:t,icon:n}),google.maps.event.addListener(e.marker,"click",function(){adress-window.setContent('<div class="adress-window">'+e.adress+"</div>"),adress-window.open(t,this)}),a.extend(e.marker.position)}),t.fitBounds(a),s()}$("fotorama").fotorama(),$("a.product").fancybox({width:643,height:435,autoSize:!1,afterShow:function(){$(".about-product").mCustomScrollbar()}}),$(".institutions-list").mCustomScrollbar(),$(".fix").hover(function(){$(".fix-2").addClass("smoke"),$(".fix-2.smoke").hover(function(){$(".responsibility-page-head").addClass("kek")})}),$.fn.smart_map=function(a){$(this).each(function(){function n(a){for(var n=a.pageX-c.offset().left,t=a.pageY-c.offset().top,s=999,e=999,o=0;691>o;o+=12){var p=Math.abs(n-o);e>p&&(e=p,s=o)}for(var r=999,o=0;376>o;o+=12){var p=Math.abs(t-o);r>p&&(r=p,net_y=o)}if(n=s-6,t=net_y-6,d.find(".js-admin-dot").length)d.find(".js-admin-dot").css({left:n,top:t});else{var l={radius:$(".js-admin-map-radius").val(),posY:t,posX:n},m=i(0,l,!0);d.find(".js-map-block").append(m)}$(".js-admin-map-x").val(n),$(".js-admin-map-y").val(t)}function t(){var a=parseInt($(".js-admin-map-x").val()),n=parseInt($(".js-admin-map-y").val());d.find(".js-admin-dot").css({left:a,top:n})}function s(){{var a=parseInt($(".js-admin-map-x").val()),n=parseInt($(".js-admin-map-y").val());parseInt($(".js-admin-map-radius").val())}d.find(".js-admin-dot").remove();var t={radius:parseInt($(".js-admin-map-radius").val()),posY:n,posX:a},s=i(0,t,!0);d.find(".js-map-block").append(s)}function e(n){var t;t="<"==n?-1:1;var s=l+t;-1==s&&(s=a.length-1),s==a.length&&(s=0),openDesc(s)}function o(){c.attr("style",transform("translateX(0px) translateY(0px)")),$(".js-map-dot").removeClass("active"),r.hide()}function i(a,n,t){11*n.radius;if(t)var s=" js-admin-dot";else var s="";var e='<a href="#" data-index="'+n.index+'" class="map-dot js-map-dot'+s+'" style="top: '+n.posY+"px; left: "+n.posX+'px;" data-id="'+a+'"></a>';return e}function p(n,t,s){var e="";$.each(a,function(a,n){var t=i(a,n,!0);e+=t}),c.html(e),r.hide(),$(window).width()<=768&&openDesc(0)}var d=$(this),c=d.find(".js-map-block"),r=d.find(".js-map-desc"),l=!1;d.hasClass("js-admin-map")?($(document).on("click",".js-map-dot",function(){return!1}),$(document).on("click",".js-map-block",function(a){n(a)}),$(document).on("input",".js-admin-map-x, .js-admin-map-y",function(){t()}),$(document).on("change",".js-admin-map-radius",function(){s()})):($(document).on("click",".js-map-dot",function(){var a=$(this).attr("data-id");return openDesc(a),!1}),$(document).on("click",".js-desc-close",function(){return o(),!1}),$(document).on("click",".js-map-control",function(){return e($(this).attr("data-direction")),!1})),p()})},$(".js-admin-map").smart_map([{posX:200,posY:200}]),$.each(plant,function(a,n){$(".brand-menu ul").prepend('<li><span><a href="#" class="js-popup-hover" data-index="'+a+'">'+n.city+"</a></span></li>")});var n=[];$.each(plant,function(a,t){n.push({posX:t.left,posY:t.top,index:a})}),$(".js-client-map").smart_map(n),$(document).on("mouseover",".js-map-dot, .js-popup-hover",function(){var a=plant[$(this).attr("data-index")];$('.js-map-dot[data-index="'+$(this).attr("data-index")+'"]').append('<div class="popup"><div class="title">'+a.city+"</div><p>"+a.name+" "+a.post_code+" "+a.adress+"</p><p>"+a.phone+"</p></div>"),$(".popup").show()}),$(document).on("mouseout",".js-map-dot, .js-popup-hover",function(){$(".popup").remove()});var t;google.maps.event.addDomListener(window,"load",a),$.each(institutions,function(a,n){$("#city").append('<option value="'+n.city+'">'+n.city+"</option>"),$("#cuisine").append('<option value="'+n.cuisine+'">'+n.cuisine+"</option>"),$("#type").append('<option value="'+n.type+'">'+n.type+"</option>"),$(".institutions-list .institutions").append('<li class="js-sort-item" data-index="'+a+'"><span data-value="'+n.city+'" class="city"></span><span data-value="'+n.name+'" class="name">'+n.name+'</span><span data-value="'+n.type+'" class="type">'+n.type+'</span><span data-value="'+n.cuisine+'" class="cuisine">'+n.cuisine+'</span><span data-value="'+n.adress+'" class="adress">'+n.adress+"</span></li>")});var s=function(){var a={};a.city=$("#city").val(),a.cuisine=$("#cuisine").val(),a.type=$("#type").val(),$(".js-sort-item").each(function(){var n=$(this),s=institutions[parseInt(n.attr("data-index"))],e=s.marker,o=!0;$.each(a,function(a,t){n.find('[data-value="'+t+'"]').length||(o=!1)}),o?(n.show(),e.setMap(t)):(n.hide(),e.setMap(null))})};$(".js-filter-select").on("change",function(){s()})});