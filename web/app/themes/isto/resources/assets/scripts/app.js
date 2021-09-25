import SwiperCore, { Navigation, Pagination } from 'swiper/core';
import Alpine from 'alpinejs';
import intersect from '@alpinejs/intersect';
const ScrollMagic = require('scrollmagic');
import anime from 'animejs/lib/anime.es.js';
import 'swiper/swiper-bundle.css';

SwiperCore.use([Navigation, Pagination]);

window.Alpine = Alpine;

// ------------------------
// Manufacturers slider
// ------------------------

new SwiperCore('.swiper-container-manufacturers', {
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    slidesPerView: 1,
    spaceBetween: 8,
    breakpoints: {
        640: {
          slidesPerView: 3,
          spaceBetween: 16,
        },
    }
});

// end Manufacturers slider

// ------------------------
// Hero slider
// ------------------------

new SwiperCore('.swiper-container-hero', {
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    slidesPerView: 1,
    spaceBetween: 8,
    on: {
        init: function (swiper) {
            const tl = anime.timeline({
                easing: 'easeOutSine',
            });

            const line = document.querySelector(`[data-hero-line="${swiper.activeIndex}"]`);
            const text = document.querySelector(`[data-hero-text="${swiper.activeIndex}"]`);
            const slide = document.querySelector(`[data-swiper-slide="${swiper.activeIndex}"]`);

            tl
                .add({
                    targets: line,
                    top: 0,
                    duration: 1700,
                })
                .add({
                    targets: text,
                    opacity: 1,
                    duration: 1700,
                });
        },
        slideNextTransitionStart: function(swiper) {
            const tl = anime.timeline({
                easing: 'easeOutSine',
            });

            const line = document.querySelector(`[data-hero-line="${swiper.activeIndex}"]`);
            const text = document.querySelector(`[data-hero-text="${swiper.activeIndex}"]`);
            const slide = document.querySelector(`[data-swiper-slide="${swiper.activeIndex}"]`);

            tl
                .add({
                    targets: line,
                    top: 0,
                    duration: 1700,
                })
                .add({
                    targets: text,
                    opacity: 1,
                    duration: 1700,
                });
        },
    },
});

// end Hero slider

// ------------------------
// Materials slider
// ------------------------

new SwiperCore('.swiper-container-materials', {
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    pagination: {
        el: ".swiper-pagination",
        type: "fraction",
    },
    slidesPerView: 1,
    spaceBetween: 8,
});

// end Materials slider

document.querySelectorAll('.scrollmagic').forEach(function(el) {
    const controller = new ScrollMagic.Controller();
    const tl = anime.timeline({
        easing: 'easeOutSine',
    });

    const lineDown = el.querySelector('.anime-line-down');
    const fadeFromLeft = el.querySelector('.anime-fade-from-left');
    const fadeIn = el.querySelector('.anime-fade-in');

    new ScrollMagic.Scene({ triggerElement: el, reverse: false, triggerHook: 100 })
        .addTo(controller)
        .on("enter", function () {
            tl.add({
                targets: lineDown,
                height: '150%',
            }).add({
                targets: fadeFromLeft,
                opacity: 1,
                translateX: ['-100%', '0'],
            }).add({
                targets: fadeIn,
                opacity: 1,
            });
        });
});

// ------------------------
// Contact us form
// ------------------------

document.addEventListener('alpine:init', () => {
    Alpine.data('contactUs', () => ({
        data: {
            loading: false,
            name: null,
            email: null,
            phone: null,
            message: null,
            cities: [],
            privacy_policy: false,
            errors: false,
            response: null,
            sent: false,
        },

        handleErrors(response) {
            if (!response.ok) {
                throw Error(response.statusText);
            }

            return response;
        },

        handleValidation() {
            if (
                !this.data.name ||
                !this.data.email ||
                !this.data.phone ||
                !this.data.message ||
                !this.data.cities.length ||
                !this.data.privacy_policy
            ) {
                this.data.errors = true;
                this.data.sent = false;
                this.data.loading = false;
                this.data.response = 'Fields market with * is required.';

                return false;
            }

            return true;
        },

        resetForm() {
            this.data.name = null;
            this.data.email = null;
            this.data.phone = null;
            this.data.message = null;
            this.data.cities = [];
            this.data.privacy_policy = false;
        },

        submitForm() {
            this.data.loading = true;
            this.data.errors = false;

            if (!this.handleValidation()) {
                return;
            }

            fetch('/wp-json/isto/v1/contactus', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(this.data),
            })
            .then(this.handleErrors)
            .then((response) => {
                this.data.errors = false;
                this.data.loading = false;
                this.data.response = '';
                this.data.sent = true;
                this.resetForm();

                console.log(response);
            })
            .catch((error) => {
                this.data.errors = true;
                this.data.loading = false;
                this.data.response = error;
            })
            .finally(() => {
                this.loading = false;
            });
        },
    }));
});

// end Contact us form

Alpine.plugin(intersect);
Alpine.start();
