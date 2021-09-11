import SwiperCore, { Navigation, Pagination } from 'swiper/core';
import Alpine from 'alpinejs';
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

Alpine.start();
