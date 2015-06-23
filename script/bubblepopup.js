$(document).ready(function(){
	$("#submenu li").hover(function() {
		$(this).children("div").animate({opacity: "show", top: "-148"}, "slow");
	}, function() {
		$(this).children("div").animate({opacity: "hide", top: "-190"}, "fast");
	});
});