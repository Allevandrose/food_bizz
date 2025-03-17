<style>
  @import url("https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.min.css");

  .carousel-container {
    width: 70vw;
    height: 70vh;
    margin: 0 auto;
    position: relative;
  }

  .swiper {
    width: 100%;
    height: 100%;
  }

  .swiper-slide {
    position: relative;
    overflow: hidden;
  }

  .swiper-slide img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 1.5s ease-in-out;
  }

  .description {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: linear-gradient(to top, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0));
    color: white;
    padding: 20px;
    font-size: 1.2rem;
    font-weight: bold;
    opacity: 0;
    transform: translateY(100%);
    transition: opacity 1s ease, transform 1s ease;
  }

  .swiper-slide-active .description {
    opacity: 1;
    transform: translateY(0);
  }

  .swiper-controls {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 20px;
    margin-top: 15px;
  }

  .swiper-button-next,
  .swiper-button-prev {
    position: relative;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: orangered;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
  }

  .swiper-button-next::after,
  .swiper-button-prev::after {
    font-family: remixicon;
    font-size: 24px;
  }

  .swiper-button-prev::after {
    content: "\ea64";
  }

  .swiper-button-next::after {
    content: "\ea6e";
  }

  .swiper-pagination-bullet {
    background: #fff;
    opacity: 0.7;
    transition: all 0.3s ease;
  }

  .swiper-pagination-bullet-active {
    opacity: 1;
    background: orangered;
    transform: scale(1.3);
  }

  .swiper-button-next:hover,
  .swiper-button-prev:hover {
    background: orangered;
    transform: scale(1.1);
  }

  /* Responsive Carousel Sizing */
  @media (max-width: 640px) {
    .carousel-container {
      width: 90vw;
      height: 50vh;
    }
  }
</style>

<!-- Mobile Swiper -->
<div class="carousel-container md:hidden">
  <div class="swiper mobile-swiper">
    <div class="swiper-wrapper">
      <div class="swiper-slide">
        <img src="{{ asset('assets/images/mobile_banner1.jpeg') }}" alt="Mobile Burger">
        <div class="description">Fresh & Tasty Burger</div>
      </div>
      <div class="swiper-slide">
        <img src="{{ asset('assets/images/mobile_banner2.jpeg') }}" alt="Mobile Pizza">
        <div class="description">Crispy & Melty Pizza</div>
      </div>
      <div class="swiper-slide">
        <img src="{{ asset('assets/images/mobile_banner3.jpeg') }}" alt="Mobile Kebab">
        <div class="description">Flame-Grilled Kebab</div>
      </div>
    </div>
  </div>
  <div class="swiper-controls">
    <div class="swiper-button-prev mobile-prev"></div>
    <div class="swiper-pagination mobile-pagination"></div>
    <div class="swiper-button-next mobile-next"></div>
  </div>
</div>

<!-- Desktop Swiper -->
<div class="carousel-container hidden md:block">
  <div class="swiper desktop-swiper">
    <div class="swiper-wrapper">
      <div class="swiper-slide">
        <img src="{{ asset('assets/images/banner.jpg') }}" alt="Burger">
        <div class="description">Juicy & Delicious Burger</div>
      </div>
      <div class="swiper-slide">
        <img src="{{ asset('assets/images/banner2.jpg') }}" alt="Pizza">
        <div class="description">Hot & Cheesy Pizza</div>
      </div>
      <div class="swiper-slide">
        <img src="{{ asset('assets/images/banner3.jpg') }}" alt="Kebab">
        <div class="description">Spicy & Tasty Kebab</div>
      </div>
    </div>
  </div>
  <div class="swiper-controls">
    <div class="swiper-button-prev desktop-prev"></div>
    <div class="swiper-pagination desktop-pagination"></div>
    <div class="swiper-button-next desktop-next"></div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Mobile Swiper
    new Swiper('.mobile-swiper', {
      loop: true,
      effect: 'fade',
      speed: 2000,
      autoplay: {
        delay: 3000,
        disableOnInteraction: false,
      },
      fadeEffect: { crossFade: true },
      pagination: {
        el: '.mobile-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.mobile-next',
        prevEl: '.mobile-prev',
      },
    });

    // Desktop Swiper
    new Swiper('.desktop-swiper', {
      loop: true,
      effect: 'fade',
      speed: 2000,
      autoplay: {
        delay: 3000,
        disableOnInteraction: false,
      },
      fadeEffect: { crossFade: true },
      pagination: {
        el: '.desktop-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.desktop-next',
        prevEl: '.desktop-prev',
      },
    });
  });
</script>