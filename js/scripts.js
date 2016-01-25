jQuery(document).ready(function($){

	// Zebra Stripe
	$(".table-body div:nth-child(odd)").addClass("odd");

	// Toggle Menu

	$("button.toggle-menu").click(function () {
		$("button.toggle-menu").toggleClass('close');
		$("html").toggleClass('open');
	});

	// Fitvids

    jQuery(".embed-youtube").fitVids();
    jQuery(".embed-vimeo").fitVids();


	function checkWidth() {
		if ($(window).width() > 960) {
			$('html').removeClass('open');
			$("button.toggle-menu").removeClass('close');

		}
	}

	$(window).resize(checkWidth);

	// Header Scroll 

    $(window).scroll(function() {
        var scroll = $(window).scrollTop();

        if (scroll >= 200) {
            $("body").addClass('scroll');
        } else {
            $("body").removeClass('scroll');
        }
    });

});
