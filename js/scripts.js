jQuery(document).ready(function($){

	// Zebra Stripe
	$(".table-body div:nth-child(odd)").addClass("odd");

	// Toggle Menu

	$("button.toggle-menu").click(function () {
		$("button.toggle-menu").toggleClass('close');
		$("html").toggleClass('open');
	});


	function checkWidth() {
		if ($(window).width() > 960) {
			$('html').removeClass('open');
			$("button.toggle-menu").removeClass('close');

		}
	}

	$(window).resize(checkWidth);


});
