jQuery.noConflict();

let deviceTier, deviceOrientation;

jQuery(function() {
	setTierAndOrientation();
	stylePagination();
});

jQuery(window).on('load', function (e) {
	
});

jQuery(window).resize(function() {
	setTierAndOrientation();
});

jQuery(window).scroll(function() {

});

jQuery('#off-canvas-open-button').click(function() {
	openOffCanvas();
});

jQuery('#off-canvas-close-button').click(function() {
	closeOffCanvas();
});

jQuery('#dark-layer').click(function() {
	closeOffCanvas();
});

function setTierAndOrientation() {
    if (jQuery('#visible-xs').css('display') == 'block') {
        deviceTier = 'xs';
    }
    if (jQuery('#visible-sm').css('display') == 'block') {
        deviceTier = 'sm';
    }
    if (jQuery('#visible-md').css('display') == 'block') {
        deviceTier = 'md';
    }
    if (jQuery('#visible-lg').css('display') == 'block') {
        deviceTier = 'lg';
    }
    if (jQuery('#visible-xl').css('display') == 'block') {
        deviceTier = 'xl';
    }
    if (window.innerHeight >= window.innerWidth) {
        deviceOrientation = 'portrait';
    }
    else {
        deviceOrientation = 'landscape';
    }
    jQuery('body').removeClass('xs sm md lg xl portrait landscape').addClass(deviceTier).addClass(deviceOrientation);
}


function img4x3() {
	jQuery('.img-4x3').each(function() {
		jQuery(this).height((jQuery(this).width() * 3) / 4);
	});
}

function img16x9() {
	jQuery('.img-16x9').each(function() {
		jQuery(this).height((jQuery(this).width() * 9) / 16);
	});
}

function stylePagination() {
	jQuery('.pagination aside').unwrap();
	jQuery('.pagenav').addClass('page-link');
	jQuery('span.pagenav').parent().addClass('disabled');
}

function openOffCanvas() {
    jQuery('body').addClass('overflow-hidden');
    jQuery("#dark-layer").removeClass('invisible');
    jQuery('#off-canvas').addClass('off-canvas--open');
}

function closeOffCanvas() {
    jQuery('#off-canvas').removeClass('off-canvas--open');
    jQuery("#dark-layer").addClass('invisible');
    jQuery('body').removeClass('overflow-hidden');
}

function enableLoader() {
    jQuery('body').addClass('overflow-hidden');
    jQuery("#loader").removeClass('invisible');
}

function disableLoader() {
    jQuery("#loader").addClass('invisible');
    jQuery('body').removeClass('overflow-hidden');
}