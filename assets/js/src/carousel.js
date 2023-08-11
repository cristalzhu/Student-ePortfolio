/* global wpRigScreenReaderText */
/**
 * File carousel.js.
 *
 * Enables Slick carousel.
 */

if ( 'loading' === document.readyState ) {
	// The DOM has not yet been loaded.
	document.addEventListener( 'DOMContentLoaded', initSlick );
} else {
	// The DOM has already been loaded.
	
	initSlick();
}

// Initiate the carousel when the DOM loads.
function initSlick() {
	var $jq = jQuery.noConflict();
	$jq(".carousel").slick({
		dots: false,
		speed: 500,
        centerMode: true,
        //slidesPerRow: 3,
		//dots: true,
		//rows: 2,
		slidesToShow: 3,
		//appendArrows: $(htmlString)
		prevArrow:"<div class='slick-prev'><i class='fa fa-angle-left' style='color:white' aria-hidden='true'></i></div>",
        nextArrow:"<div class='slick-next'><i class='fa fa-angle-right' style='color:white' aria-hidden='true'></i></div>",
	})

}
	
