(function($) {
	// carousel
	var owl = $("#owl_banner");
	owl.owlCarousel({
		itemsCustom : [
			[0, 1],
		],
		items: 1,
		loop: true,
		autoplay: true,
		autoplayTimeout: 5000,
		nav : false,
		navText : false,
		autoHeight: true,
		slideSpeed : 2000
		});

	$('.cloze-f').click(function(){
		$('.reviews_form').slideUp('slow');
		$('.show-f').addClass('act');
	});
	$('.show-f').click(function(){
		$('.reviews_form').slideDown('slow');
		$(this).removeClass('act');
	});
	console.log('custom is loading...')
}(jQuery))
