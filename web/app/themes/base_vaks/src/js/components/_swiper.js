var hero_slider, related, partners_slider;

hero_slider = new Swiper('.hero-slider', {
	updateOnWindowResize: true,
	centeredSlides: true,
	slidesPerColumnFill: 'row',
	slidesPerView: 1,
	spaceBetween: 0,
	loop: true,
	speed: 2000,
	autoplay: {
		delay: 7000,
		disableOnInteraction: false,
	},
	keyboard: {
		enabled: true,
		onlyInViewport: false,
	},
	navigation: {
		prevEl: '.swiper-button-prev',
		nextEl: '.swiper-button-next'
	},
	pagination: {
		el: ".swiper-pagination",
		clickable: true
	},
	grabCursor: true
});

// Related pages & posts
related = new Swiper('.related-pages.swiper-slider, .related-posts.swiper-slider', {
	observeSlideChildren: true,
	slideToClickedSlide: true,
	updateOnWindowResize: true,
	slidesPerView: 3,
	spaceBetween: 30,
	loop: true,
	speed: 5000,
	breakpoints: {
		320: {
			slidesPerView: 1
		},
		760: {
			slidesPerView: 2
		},
		992: {
			slidesPerView: 3
		}
	},
	autoplay: {
		delay: 7000,
		disableOnInteraction: false,
	},
	keyboard: {
		enabled: true,
		onlyInViewport: false,
	},
	navigation: {
		nextEl: '.swiper-button-next',
		prevEl: '.swiper-button-prev',
	},
	grabCursor: true
});

partners_slider = new Swiper('.section__partners', {
	updateOnWindowResize: true,
	centeredSlides: true,
	slidesPerColumnFill: 'row',
	slidesPerView: 5.9,
	spaceBetween: 0,
	loop: true,
	speed: 2000,
	autoplay: {
		delay: 7000,
		disableOnInteraction: false,
	},
	keyboard: {
		enabled: true,
		onlyInViewport: false,
	},
	navigation: {
		prevEl: '.wp-image-197',
		nextEl: '.wp-image-198'
	},
	grabCursor: true
});