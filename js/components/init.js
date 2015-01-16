( function() {

	if ( window.addEventListener ) {
		window.addEventListener('load', function() {
			FastClick.attach(document.body);
		}, false);
	}

	/**
	 * The Off Canvas Navigation
	 */
	var page, navToggle, content;

	// get variables by grabbing elements by ID
	var page = document.getElementById( 'page' );
	var navToggle = document.getElementById( 'menu-btn' );
	var content = document.getElementById( 'overlay' );

	
	/** 
	 * Adds a reveal class to the page wrapper
	 */
	function revealNav() {

		page.classList.toggle( 'reveal' );
		navToggle.classList.toggle( 'active' );

	}
	
	/** 
	 * Removes the reveal and active classes when
	 * the overlay element is clicked on
	 */
	function closeNav() {
		if ( page.classList.contains( 'reveal' ) ) {
			page.classList.remove( 'reveal' );
			navToggle.classList.remove( 'active' );
		}
	}

	// check to see if addEventListener is supported in the browser
	// if not, fallback to attachEvent
	if ( window.addEventListener ) {

		navToggle.addEventListener( 'click', revealNav, false );
		content.addEventListener( 'click', closeNav, false );

	} else {
		// legacy support for onclick function
		navToggle.attachEvent( 'onclick', revealNav );
		content.attachEvent( 'onclick', closeNav );
	}
	/**  END OFF CANVAS NAVIGATION  **/

})();