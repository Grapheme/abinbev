$(document).ready(function(){function a(){{var a={center:new google.maps.LatLng(47.2249488,39.7239244),zoom:17,mapTypeId:google.maps.MapTypeId.ROADMAP,draggable:!1,zoomControl:!1,scrollwheel:!1,disableDoubleClickZoom:!0};new google.maps.Map(document.getElementById("google-map"),a),new google.maps.LatLng(47.2248231,39.7273844)}}$("fotorama").fotorama(),$("a.product").fancybox({width:643,height:435,autoSize:!1,afterShow:function(){$(".about-product").mCustomScrollbar()}}),$(".institutions-list").mCustomScrollbar(),$(".fix").hover(function(){$(".fix-2").addClass("smoke"),$(".fix-2.smoke").hover(function(){$(".responsibility-page-head").addClass("kek")})}),$.fn.smart_map=function(a){$(this).each(function(){function t(a){var t=a.pageX-p.offset().left,n=a.pageY-p.offset().top;if(r.find(".js-admin-dot").length)r.find(".js-admin-dot").css({left:t,top:n});else{var o={radius:$(".js-admin-map-radius").val(),posY:n,posX:t},s=d(0,o,!0);r.find(".js-map-block").append(s)}$(".js-admin-map-x").val(t),$(".js-admin-map-y").val(n)}function n(){var a=parseInt($(".js-admin-map-x").val()),t=parseInt($(".js-admin-map-y").val());r.find(".js-admin-dot").css({left:a,top:t})}function o(){{var a=parseInt($(".js-admin-map-x").val()),t=parseInt($(".js-admin-map-y").val());parseInt($(".js-admin-map-radius").val())}r.find(".js-admin-dot").remove();var n={radius:parseInt($(".js-admin-map-radius").val()),posY:t,posX:a},o=d(0,n,!0);r.find(".js-map-block").append(o)}function s(t){var n;n="<"==t?-1:1;var o=l+n;-1==o&&(o=a.length-1),o==a.length&&(o=0),e(o)}function e(t){var n=a[t],o=n.items,s=n.name,e=n.posX,i=n.posY,d="";$.each(o,function(a,t){d+="<li>"+t}),c.find(".js-desc-title").text(s),c.find(".js-desc-items").html(d),setTimeout(function(){c.find(".js-desc-items").customScrollbar()},1);var m=p.width()/4-e,r=p.height()/2-i,f=transform("translateX("+m+"px) translateY("+r+"px)");p.attr("style",f),$(".js-map-dot[data-id="+t+"]").addClass("active").siblings().removeClass("active"),c.show(),l=parseInt(t)}function i(){p.attr("style",transform("translateX(0px) translateY(0px)")),$(".js-map-dot").removeClass("active"),c.hide()}function d(a,t,n){11*t.radius;if(n)var o=" js-admin-dot";else var o="";var s='<a href="#" class="map-dot js-map-dot'+o+'" style="top: '+t.posY+"px; left: "+t.posX+'px;" data-id="'+a+'"></a>';return s}function m(t,n,o){var s="";$.each(a,function(a,t){var n=d(a,t,!0);s+=n}),p.html(s),c.hide(),$(window).width()<=768&&e(0)}var r=$(this),p=r.find(".js-map-block"),c=r.find(".js-map-desc"),l=!1;r.hasClass("js-admin-map")?($(document).on("click",".js-map-dot",function(){return!1}),$(document).on("click",".js-map-block",function(a){t(a)}),$(document).on("input",".js-admin-map-x, .js-admin-map-y",function(){n()}),$(document).on("change",".js-admin-map-radius",function(){o()})):($(document).on("click",".js-map-dot",function(){var a=$(this).attr("data-id");return e(a),!1}),$(document).on("click",".js-desc-close",function(){return i(),!1}),$(document).on("click",".js-map-control",function(){return s($(this).attr("data-direction")),!1})),m()})},$(".js-admin-map").smart_map([{posX:200,posY:200}]),$(".js-client-map").smart_map([{posX:200,posY:200}]),google.maps.event.addDomListener(window,"load",a)});