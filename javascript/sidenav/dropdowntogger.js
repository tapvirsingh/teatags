$(document).ready(function(){

	$('.ttag-nav-multi-link-cap').unbind('click').on('click',function(event){
		event.preventDefault();
		var targetId = $(this).data('target');

		$('#'+targetId).toggleClass('collapse',1000,'easeOutSine');
		
	});

});