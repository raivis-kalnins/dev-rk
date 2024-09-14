// import local dependencies
import accordion from './components/accordion';
import custom from './components/custom';
import scroll from './components/scroll';
import swiper from './components/swiper';
import forms from './components/forms';

// Populate Router instance with DOM routes
const 	$ = jQuery.noConflict(),
		routes = new Router({
			accordion,
			custom,
			scroll,
			swiper,
			forms
		});

// Load Events
$(document).ready(() => routes.loadEvents());