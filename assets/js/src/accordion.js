/* global wpRigScreenReaderText */
/**
 * File carousel.js.
 *
 * Enables Slick carousel.
 */

if ( 'loading' === document.readyState ) {
	// The DOM has not yet been loaded.
	document.addEventListener( 'DOMContentLoaded', initAccordion );
} else {
	// The DOM has already been loaded.
	initAccordion();
}

// Initiate the carousel when the DOM loads.
function initAccordion() {
	var acc = document.getElementsByClassName("accordion");
	var i;
	
	for (i = 0; i < acc.length; i++) {
	  acc[i].addEventListener("click", function() {
		this.classList.toggle("active");
		var panel = this.nextElementSibling;
		if (panel.style.display === "block") {
		  panel.style.display = "none";
		} else {
		  panel.style.display = "block";
		}
	  });
	}
}

		
