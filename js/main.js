$(function () {
  "use strict";

  // SVG Inject js
  SVGInject(document.querySelectorAll("img.injectable"));

  // Menu fix js
  $(window).scroll(function () {
    if ($(this).scrollTop() > 0) {
      if ($(".main_menu").offset() != undefined) {
        if (!$(".main_menu").hasClass("menu_fix")) {
          $(".main_menu").addClass("menu_fix");
        }
      }
    } else {
      if ($(".main_menu").offset() != undefined) {
        $(".main_menu").removeClass("menu_fix");
      }
    }
  });

  // Banner Slider
  $(".banner_slider").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 4000,
    fade: true,
    dots: true,
    arrows: false,
  });

  // Category Slider
  $(".category_slider").slick({
    slidesToShow: 6,
    slidesToScroll: 6,
    autoplay: true,
    autoplaySpeed: 4000,
    dots: true,
    arrows: false,
    // for RTL
    // rtl: true,
    responsive: [
      {
        breakpoint: 1400,
        settings: {
          slidesToShow: 5,
          slidesToScroll: 5,
        },
      },
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 4,
        },
      },
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 4,
        },
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
        },
      },
      {
        breakpoint: 576,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
        },
      },
    ],
  });

  // Select js
  $(".select_js").niceSelect();

  // Counter js
  $(".counter").countUp();

  // Vanobox js
  $(".venobox").venobox();

  // Barfiller js
  $(document).ready(function () {
    $(".barfiller").each(function () {
      $(this).barfiller({});
    });
  });

  // Service Slider
  $(".service_slider").slick({
    slidesToShow: 4,
    slidesToScroll: 4,
    autoplay: true,
    autoplaySpeed: 4000,
    dots: true,
    arrows: false,
    // for RTL
    // rtl: true,
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 3,
        },
      },
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
        },
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 2,
        },
      },
      {
        breakpoint: 576,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });

  // Marquee animi
  $(".marquee_animi").marquee({
    speed: 50,
    gap: 25,
    delayBeforeStart: 0,
    direction: "right",
    // for RTL
    // direction: 'left',
    duplicated: true,
    pauseOnHover: true,
    startVisible: true,
  });

  // Event Slider
  $(".event_slider").slick({
    slidesToShow: 3,
    slidesToScroll: 3,
    autoplay: true,
    autoplaySpeed: 4000,
    dots: true,
    arrows: false,
    // for RTL
    // rtl: true,
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
        },
      },
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
        },
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 576,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });

  // Volunteer slider
  $(".volunteer_slider").slick({
    slidesToShow: 4,
    slidesToScroll: 4,
    autoplay: true,
    autoplaySpeed: 4000,
    dots: true,
    arrows: false,
    // for RTL
    // rtl: true,
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 3,
        },
      },
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 2,
        },
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
        },
      },
      {
        breakpoint: 576,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });

  // Brand Slider
  $(".brand_slider").slick({
    slidesToShow: 5,
    slidesToScroll: 5,
    autoplay: true,
    autoplaySpeed: 4000,
    dots: false,
    arrows: true,
    nextArrow: '<i class="far fa-arrow-right nextArrow"></i>',
    prevArrow: '<i class="far fa-arrow-left prevArrow"></i>',
    // for RTL
    // rtl: true,
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 4,
        },
      },
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          arrows: false,
        },
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
          arrows: false,
        },
      },
      {
        breakpoint: 576,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
          arrows: false,
        },
      },
    ],
  });

  // related campaing Slider
  $(".related_campaing_slider").slick({
    slidesToShow: 3,
    slidesToScroll: 3,
    autoplay: true,
    autoplaySpeed: 4000,
    dots: true,
    arrows: false,
    // for RTL
    // rtl: true,
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
        },
      },
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
        },
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 576,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });

  // Sticky sidebar
  if ($(".sticky_sidebar").length > 0) {
    $(".sticky_sidebar").stickit({
      top: 90,
    });
  }

  // campaign details slider
  $(".campaign_slider_large").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: false,
    asNavFor: ".campaign_slider_small",
    // for RTL
    // rtl: true,
  });
  $(".campaign_slider_small").slick({
    slidesToShow: 5,
    slidesToScroll: 1,
    asNavFor: ".campaign_slider_large",
    dots: false,
    arrows: false,
    centerMode: true,
    centerPadding: "0",
    focusOnSelect: true,
    // for RTL
    // rtl: true,
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 5,
        },
      },
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 5,
        },
      },
    ],
  });

  // testiminial Slider
  $(".testimonial_slider").slick({
    slidesToShow: 2,
    slidesToScroll: 2,
    autoplay: true,
    autoplaySpeed: 4000,
    dots: true,
    arrows: false,
    // for RTL
    // rtl: true,
    responsive: [
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 576,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });

  // select 2 js
  $(document).ready(function () {
    $(".select_2").select2();
  });

  // Testimonial 2 Slider
  $(".testimonial_2_slider").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: false,
    autoplaySpeed: 3000,
    dots: true,
    arrows: true,
    nextArrow: '<i class="far fa-arrow-right nextArrow"></i>',
    prevArrow: '<i class="far fa-arrow-left prevArrow"></i>',
    // for RTL
    // rtl: true,
    responsive: [
      {
        breakpoint: 992,
        settings: {
          arrows: false,
        },
      },
      {
        breakpoint: 768,
        settings: {
          arrows: false,
        },
      },
      {
        breakpoint: 576,
        settings: {
          arrows: false,
        },
      },
    ],
  });

  $(document).ready(function () {
    $(".payment_method").on("click", function (e) {
      e.preventDefault(); // prevent the link from jumping
      $(".payment_method").removeClass("active"); // remove from all
      $(this).addClass("active"); // add to the clicked one
    });
  });

  $(document).ready(function () {
    $(".video_donation_box ul li").on("click", function () {
      // remove '$' and trim text
      let value = $(this).text().replace("$", "").trim();

      // update input value
      $(".video_donation_box .input_box input").val(value);

      // manage active class
      $(".video_donation_box ul li").removeClass("active");
      $(this).addClass("active");
    });
  });

  // banner 3 heading animation
  $(".animate-zoom").animatedHeadline({
    animationType: "zoom",
  });

  // Event 3 slider
  $(".event_3_slider").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: false,
    autoplaySpeed: 3000,
    dots: false,
    arrows: true,
    nextArrow: '<i class="far fa-arrow-right nextArrow"></i>',
    prevArrow: '<i class="far fa-arrow-left prevArrow"></i>',
    // for RTL
    // rtl: true,
  });
});
