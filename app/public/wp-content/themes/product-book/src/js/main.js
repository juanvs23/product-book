import * as Bootstrap from '../../node_modules/bootstrap/dist/js/bootstrap.bundle.min';
import Swiper from 'swiper';
import { Navigation, Pagination,Scrollbar,EffectCoverflow } from 'swiper/modules';
// import Swiper and modules styles
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/scrollbar';
import 'swiper/css/effect-coverflow';
import 'swiper/css/pagination'

const swiper = new Swiper('#menu-swiper', {
    // Install modules
    modules: [ Scrollbar,Navigation],
    speed: 500,
    navigation: {
      nextEl: '.menu-category-next',
      prevEl: '.menu-category-prev',
    },
   // slidesPerView:5,
    spaceBetween: 20,
    // ...
    breakpoints: {
        0:{
            slidesPerView:2,
        },
        768:{
            slidesPerView:3,
        },
        1024:{
            slidesPerView:4,
        },
        1200:{
            slidesPerView:5,
        }
    }
  });
  if (document.getElementById('carousel-home')) {
   const  homeCarousel = new Swiper('#carousel-home', {
      modules:[EffectCoverflow,Navigation],
      effect: 'coverflow',
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: 3,
      loop: true,
      coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows: false,
      },
      navigation: {
        nextEl: '.carousel-home-next',
        prevEl: '.carousel-home-prev',
      },
      breakpoints:{
        0:{
          slidesPerView:1,
        },
        768:{
          slidesPerView:2
        },
        992:{
          slidesPerView:3
        }
      }

    })
  }
  if(document.getElementById('our-books')){
    const ourBooksCarousel = new Swiper('#our-books', {
      modules:[Navigation],
      spaceBetween:15,
      breakpoints:{
        0:{
          slidesPerView:1,
        },
        768:{
          slidesPerView:2
        },
        992:{
          slidesPerView:3
        }
      }
    })
  }