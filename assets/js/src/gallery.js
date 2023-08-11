/* global wpRigScreenReaderText */
/**
 * File carousel.js.
 *
 * Enables Slick carousel.
 */

if ( 'loading' === document.readyState ) {
	// The DOM has not yet been loaded.
	document.addEventListener( 'DOMContentLoaded', initGallery );
} else {
	// The DOM has already been loaded.
	initGallery();
}

// Initiate the carousel when the DOM loads.
  function onClick(element) {
    document.getElementById("img01").src = element.src;
    document.getElementById("description01").innerHTML = element.alt;
    document.getElementById("modal01").style.display = "block";
  }

		
