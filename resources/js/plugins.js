import Swiper, { Navigation, Pagination } from 'swiper'
import 'swiper/css'
import 'swiper/css/navigation'
import 'swiper/css/pagination'

import { Fancybox } from '@fancyapps/ui'
;(function ($) {
    'use strict'

    // configure Swiper to use modules
    Swiper.use([Navigation, Pagination])

    var swiper = new Swiper('.swiperSlideHome', {
        loop: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev'
        }
    })

    var carousel = new Swiper('.swiperCarouselHome', {
        loop: true,
        spaceBetween: 30,
        pagination: {
            el: '.swiper-pagination',
            clickable: true
        },
        breakpoints: {
            450: {
                slidesPerView: 1,
                spaceBetween: 20
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 30
            },
            1024: {
                slidesPerView: 5,
                spaceBetween: 30
            }
        }
    })
})(jQuery, window, document)
