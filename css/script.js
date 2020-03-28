jQuery.noConflict();

let deviceTier, deviceOrientation;

jQuery(function() {
	tierAndOrientation();
});

jQuery(window).on("load", function (e) {
	img4x3();
	img16x9();
});

jQuery(window).resize(function() {
	tierAndOrientation();
	img4x3();
	img16x9();
});

jQuery(window).scroll(function() {

});

function tierAndOrientation() {
  	if (jQuery(".visible-xl").css('display') == 'block') {
		deviceTier = "xl";
	}
	else if (jQuery(".visible-lg").css('display') == 'block') {
		deviceTier = "lg";
	}
	else if (jQuery(".visible-md").css('display') == 'block') {
		deviceTier = "md";
	}
	else if (jQuery(".visible-sm").css('display') == 'block') {
		deviceTier = "sm";
	}
	else if (jQuery(".visible-xs").css('display') == 'block') {
		deviceTier = "xs";
	}
	if (window.innerHeight >= window.innerWidth) {
		deviceOrientation = "portrait";
	}
	else {
		deviceOrientation = "landscape";
	}
	jQuery("body").removeClass('xl lg md sm xs portrait landscape').addClass(deviceTier).addClass(deviceOrientation);
}

function img4x3() {
	jQuery(".img-4x3").each(function() {
		jQuery(this).height((jQuery(this).width() * 3) / 4);
	});
}

function img16x9() {
	jQuery(".img-16x9").each(function() {
		jQuery(this).height((jQuery(this).width() * 9) / 16);
	});
}