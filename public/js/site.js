$(() => {
    var swiper = new Swiper(".mySwiper", {
        grabCursor: true,
        // roundLengths: true,
        // loop: true,
        // loopAdditionalSlides: 30,
        breakpoints: {
            640: {
                slidesPerView: 2,
                spaceBetween: 30,
            },
            768: {
                slidesPerView: 4,
                spaceBetween: 50,
            },
            1024: {
                slidesPerView: 6,
                spaceBetween: 80,
            },
        },
    });
});
