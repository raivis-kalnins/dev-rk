document.addEventListener("DOMContentLoaded", function() {

	const 	$ = jQuery.noConflict();
	var d = new Date(),
		n = d.getFullYear(),
		page = $('html, body');
			
	$('.foo__copy em').text(n).addClass('foo__copy-year');
});