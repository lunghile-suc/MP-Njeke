$('.menu-toggle').click(function () {
	$('ul').toggleClass('active');
});

$('.link-toggle').click(function () {
	$('ul').toggleClass('active');
});


// hide when you scroll down and show menu when you scroll up
var previousScroll = 0;
$(window).scroll(function () {
	var currentScroll = $(this).scrollTop();
	if (currentScroll < 100) {
		showTopNav();
	} else if (currentScroll > 0 && currentScroll < $(document).height() - $(window).height()) {
		if (currentScroll > previousScroll) {
			hideNav();
			$('ul').removeClass('active');
		} else {
			showNav();

		}
		previousScroll = currentScroll;
	}
});

function hideNav() {
	$(".nav").addClass("hide");
}

function showNav() {
	$(".nav").removeClass("hide");
}