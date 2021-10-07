import SwiperCore, { Navigation, Pagination } from 'swiper/core';
import Alpine from 'alpinejs';
import intersect from '@alpinejs/intersect';
import collapse from '@alpinejs/collapse';
import persist from '@alpinejs/persist';
const ScrollMagic = require('scrollmagic');
import anime from 'animejs/lib/anime.es.js';
import 'swiper/swiper-bundle.css';
import PerfectScrollbar from 'perfect-scrollbar';
import "perfect-scrollbar/css/perfect-scrollbar.css";
import Cookies from 'js-cookie';

SwiperCore.use([Navigation, Pagination]);

window.Alpine = Alpine;

// ------------------------
// Manufacturers slider
// ------------------------

new SwiperCore('.swiper-container-manufacturers, .swiper-container-related', {
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

new SwiperCore('.swiper-container-materials, .swiper-container-simple', {
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
            product_link: null,
            product_title: null,
            errors: false,
            response: null,
            sent: false,
        },

        setProps(title, link) {
            this.data.product_link = link;
            this.data.product_title = title;
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
            .then(() => {
                this.data.errors = false;
                this.data.loading = false;
                this.data.response = '';
                this.data.sent = true;
                this.resetForm();
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

    // Alpine.data('wishlist', () => ({
    //     toggleFavorite(productId) {
    //         let currentItems = JSON.parse(localStorage.getItem('favs')) ?? [];
    //
    //         console.log(currentItems);
    //
    //         if (!currentItems) {
    //             currentItems.push(productId);
    //             localStorage.setItem('favs', JSON.stringify(currentItems));
    //             return;
    //         }
    //
    //         if (!currentItems.includes(productId)) {
    //             const newItems = currentItems.push(productId);
    //             localStorage.setItem('favs', JSON.stringify(newItems));
    //             return;
    //         }
    //
    //         if (currentItems.includes(productId)) {
    //             const newItems = currentItems.filter((item) => item === productId);
    //             localStorage.setItem('favs', JSON.stringify(newItems));
    //         }
    //     }
    // }));
});

// end Contact us form

// ------------------------
// Product categories
// ------------------------

const parentCategories = document.querySelectorAll('.wc-block-product-categories-list--depth-0 > .wc-block-product-categories-list-item');

parentCategories.forEach(function(el) {
    const parentCategory = el.querySelector('a');

    parentCategory
        .addEventListener('click', function(e) {
            e.preventDefault();

            const parentItem = e.target;
            const submenu = parentItem.nextElementSibling;

            parentItem.classList.toggle('inactive');
            submenu.classList.toggle('hidden');
        });


});

const bapfAttributeTitle = document.querySelectorAll('.bapf_head');

bapfAttributeTitle.forEach(function(el) {
    // @FIXME po filtravimo nebeveikia click event'as
    el.addEventListener('click', function(e) {
        e.preventDefault();

        this.nextElementSibling.classList.toggle('hidden');
    });
});

// end Product categories

// --------------------------
// Product categories mobile
// --------------------------

const parentItems = document.querySelectorAll('.nav-primary-mobile > .menu-item-has-children > .sub-menu > li.menu-item > a');

parentItems.forEach(function(parentItem) {
    parentItem.addEventListener('click', function(el) {
        el.preventDefault();

        const parentItemTitle = el.currentTarget.innerText;
        const subMenu = el.currentTarget.nextElementSibling;
        const subMenuTitleEl = document.createElement('li');
        const subMenuTitleBackEl = document.createElement('img');
        const subMenuTitleContent = document.createTextNode(parentItemTitle);

        subMenu.classList.add('active');

        subMenuTitleEl.classList.add('submenu-title');
        subMenuTitleEl.appendChild(subMenuTitleContent);

        subMenuTitleBackEl.setAttribute('src', '/arrow-left.svg');
        subMenuTitleBackEl.classList.add('submenu-back', 'w-6');

        subMenuTitleEl.prepend(subMenuTitleBackEl);
        subMenu.prepend(subMenuTitleEl);

        subMenu.querySelector('.submenu-back').addEventListener('click', function(e) {
            e.preventDefault();

            subMenuTitleEl.remove();
            subMenu.classList.remove('active');
        });
    });
});

// end Product categories mobile

// --------------------------
// Perfect scroll init
// --------------------------

if (document.querySelector('.inner-scroll')) {
    new PerfectScrollbar('.inner-scroll', {
        wheelSpeed: 2,
        wheelPropagation: true,
        minScrollbarLength: 20
    });
}

// end Perfect scroll init

Alpine.store('favs', {
    items: [],

    init() {
        const itemsCookie = Cookies.get('favs');

        if (itemsCookie) {
            this.items = JSON.parse(itemsCookie);
        }
    },

    toggleFav(productId) {
        if (!this.items.includes(productId)) {
            this.items.push(productId);
        } else {
            this.items = this.items.filter((item) => item !== productId);
        }

        Cookies.set('favs', JSON.stringify(this.items));
    },

    isSelected(productId) {
        return this.items.includes(productId);
    }
});

Alpine.plugin(persist);
Alpine.plugin(intersect);
Alpine.plugin(collapse);
Alpine.start();
