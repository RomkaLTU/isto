import SwiperCore, { Navigation, Pagination } from 'swiper/core';
import Alpine from 'alpinejs';
import 'swiper/swiper-bundle.css';

SwiperCore.use([Navigation, Pagination]);

window.Alpine = Alpine;

Alpine.start();
