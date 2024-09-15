// import local dependencies
import accordion from './components/_accordion';
import custom from './components/_custom';
import scroll from './components/_scroll';
import swiper from './components/_swiper';
import forms from './components/_forms';

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