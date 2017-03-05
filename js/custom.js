jQuery(document).ready(function(){
	jQuery('.cm-banner').unslider({
		autoplay: true,
		arrows: false,
		delay: 2500,
	});


	var innerH = window.innerHeight;
	var minusH = 75;
	var totalH = innerH - minusH ;
	//alert( totalH );
		
	/*jQuery(window).resize(function(){
		//jQuery( '.cm-bg-wrap' ).css({ 'height': totalH + 'px' });
	});*/
});