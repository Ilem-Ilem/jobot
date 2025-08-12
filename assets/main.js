/*-----------------------------------------------------------------------------------

    Theme Name: Amava - Startup Agency and SasS Business Template
    Description: Startup Agency and SasS Business Template
    Author: Chitrakoot Web
    Version: 3.2
        
    ---------------------------------- */

! function (a) {
    "use strict";
    var o = a(window);

    function s() {
        var e, s;
        e = a(".full-screen"), s = o.height(), e.css("min-height", s), e = a("header").height(), s = a(".screen-height"), e = o.height() - e, s.css("height", e);
    }
    a.scrollIt({
        upKey: 38,
        downKey: 40,
        easing: "swing",
        scrollTime: 600,
        activeClass: "active",
        onPageChange: null,
        topOffset: -70
    }), a("#preloader").fadeOut("normall", function () {
        a(this).remove();
    }), o.on("scroll", function () {
        var e = o.scrollTop(),
            s = a(".navbar-brand.inner-logo img"),
            t = a(".navbar-brand.dark-logo img");
        e <= 50 ? (a("header").removeClass("scrollHeader").addClass("fixedHeader"), t.attr("src", "img/logos/logo.png"), s.attr("src", "img/logos/logo-white.png")) : (a("header").removeClass("fixedHeader").addClass("scrollHeader"), t.attr("src", "img/logos/logo-white.png"), 992 <= o.width() && s.attr("src", "img/logos/logo.png"));
    }), o.width() <= 991 && a(".onepage-header .navbar-nav .nav-link").on("click", function () {
        a(".navbar-nav").css("display", "none"), a(".navbar .navbar-toggler").removeClass("menu-opened");
    }), o.on("scroll", function () {
        500 < a(this).scrollTop() ? a(".scroll-to-top").fadeIn(400) : a(".scroll-to-top").fadeOut(400);
    }), a(".scroll-to-top").on("click", function (e) {
        e.preventDefault(), a("html, body").animate({
            scrollTop: 0
        }, 600);
    }), new WOW({
        boxClass: "wow",
        animateClass: "animated",
        offset: 0,
        mobile: !1,
        live: !0
    }).init(), a(".parallax,.bg-img").each(function (e) {
        a(this).attr("data-background") && a(this).css("background-image", "url(" + a(this).data("background") + ")");
    }), a(".story-video").magnificPopup({
        delegate: ".video",
        type: "iframe"
    }), a(".popup-youtube").magnificPopup({
        disableOn: 700,
        type: "iframe",
        mainClass: "mfp-fade",
        removalDelay: 160,
        preloader: !1,
        fixedContentPos: !1
    }), a(".source-modal").magnificPopup({
        type: "inline",
        mainClass: "mfp-fade",
        removalDelay: 160
    }), 0 !== a(".copy-clipboard").length && (new ClipboardJS(".copy-clipboard"), a(".copy-clipboard").on("click", function () {
        var e = a(this);
        e.text();
        e.text("Copied"), setTimeout(function () {
            e.text("Copy");
        }, 2e3);
    })), a(".tab1").click(function () {
        a(".second, .third, .four").fadeOut(), a(".first").fadeIn(1e3);
    }), a(".tab2").click(function () {
        a(".first, .third, .four").fadeOut(), a(".second").fadeIn(1e3);
    }), a(".tab3").click(function () {
        a(".second, .first, .four").fadeOut(), a(".third").fadeIn(1e3);
    }), a(".tab4").click(function () {
        a(".first, .second, .third").fadeOut(), a(".four").fadeIn(1e3);
    }), o.resize(function (e) {
        setTimeout(function () {
            s();
        }, 500), e.preventDefault();
    }), s(), a(document).ready(function () {
        a("#testmonials-carousel").owlCarousel({
            loop: !0,
            responsiveClass: !0,
            autoplay: !0,
            smartSpeed: 800,
            nav: !1,
            dots: !0,
            center: !0,
            margin: 0,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 1
                },
                992: {
                    items: 1
                }
            }
        }), a(".app_screenshots_slides").owlCarousel({
            items: 1,
            loop: !0,
            autoplay: !0,
            smartSpeed: 800,
            margin: 30,
            center: !0,
            dots: !0,
            responsive: {
                0: {
                    items: 1
                },
                576: {
                    items: 2
                },
                768: {
                    items: 3
                },
                992: {
                    items: 4
                },
                1200: {
                    items: 5
                }
            }
        }), a(".testmonial-carousel").owlCarousel({
            loop: !0,
            responsiveClass: !0,
            autoplay: !0,
            smartSpeed: 800,
            nav: !0,
            dots: !1,
            center: !0,
            margin: 0,
            navText: ["<span>&#10229;</span>", "<span>&#10230;</span>"],
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 1
                },
                992: {
                    items: 1
                }
            }
        }), a(".testmonial-style02").owlCarousel({
            loop: !0,
            responsiveClass: !0,
            autoplay: !0,
            smartSpeed: 800,
            nav: !0,
            dots: !1,
            center: !1,
            margin: 0,
            navText: ["<i class='ti-arrow-left'></i>", "<i class='ti-arrow-right'></i>"],
            responsive: {
                0: {
                    items: 1,
                    dots: !1
                },
                768: {
                    items: 1
                },
                992: {
                    items: 1
                }
            }
        }), a(".testmonial-style03").owlCarousel({
            loop: !0,
            responsiveClass: !0,
            autoplay: !0,
            smartSpeed: 800,
            nav: !1,
            dots: !1,
            center: !1,
            margin: 0,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                992: {
                    items: 3
                }
            }
        }), a(".testmonial-style05").owlCarousel({
            loop: !0,
            responsiveClass: !0,
            autoplay: !0,
            smartSpeed: 800,
            nav: !1,
            dots: !0,
            center: !0,
            margin: 0,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                992: {
                    items: 3
                }
            }
        }), a(".testmonial-style07").owlCarousel({
            loop: !0,
            responsiveClass: !0,
            autoplay: !0,
            smartSpeed: 900,
            nav: !1,
            dots: !0,
            margin: 0,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 1
                },
                992: {
                    items: 1
                }
            }
        }), a(".testmonial-style08 .owl-carousel").owlCarousel({
            loop: !0,
            responsiveClass: !0,
            autoplay: !1,
            smartSpeed: 800,
            nav: !1,
            dots: !0,
            center: !1,
            margin: 40,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                992: {
                    items: 3
                }
            }
        }), a(".testimonial-style09 .owl-carousel").owlCarousel({
            loop: !0,
            responsiveClass: !0,
            autoplay: !0,
            smartSpeed: 800,
            nav: !1,
            navText: ["<i class='ti-arrow-left'></i>", "<i class='ti-arrow-right'></i>"],
            dots: !1,
            center: !1,
            margin: 0,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                992: {
                    items: 3,
                    dots: !0,
                    nav: !0
                }
            }
        }), a(".testimonial-style10 .owl-carousel").owlCarousel({
            loop: !0,
            responsiveClass: !0,
            autoplay: !0,
            smartSpeed: 800,
            nav: !1,
            navText: ["<i class='ti-arrow-left'></i>", "<i class='ti-arrow-right'></i>"],
            dots: !1,
            center: !1,
            margin: 0,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 1
                },
                992: {
                    items: 1
                }
            }
        }), a(".testimonial-style11 .owl-carousel").owlCarousel({
            loop: !0,
            responsiveClass: !0,
            autoplay: !0,
            smartSpeed: 800,
            nav: !1,
            navText: ["<i class='ti-arrow-left'></i>", "<i class='ti-arrow-right'></i>"],
            dots: !0,
            center: !1,
            margin: 0,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 1
                },
                992: {
                    items: 2
                }
            }
        }), a(".testimonial-style12").owlCarousel({
            loop: !0,
            responsiveClass: !0,
            autoplay: !0,
            thumbs: !0,
            thumbsPrerendered: !0,
            smartSpeed: 1500,
            nav: !1,
            navText: ["<i class='ti-arrow-left'></i>", "<i class='ti-arrow-right'></i>"],
            dots: !1,
            center: !0,
            items: 1,
            margin: 0
        }), a(".testimonials-carousel13").owlCarousel({
            loop: !0,
            responsiveClass: !0,
            autoplay: !1,
            smartSpeed: 800,
            nav: !0,
            navText: ["<span>Prev</span>", "<span>Next</span>"],
            dots: !1,
            center: !1,
            margin: 30,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 1
                },
                992: {
                    items: 1
                },
                1200: {
                    items: 1
                }
            }
        }), a(".course-category .owl-carousel").owlCarousel({
            loop: !0,
            responsiveClass: !0,
            autoplay: !0,
            smartSpeed: 800,
            nav: !1,
            navText: ["<i class='ti-arrow-left'></i>", "<i class='ti-arrow-right'></i>"],
            dots: !1,
            center: !1,
            margin: 30,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                992: {
                    items: 4,
                    nav: !0
                },
                1200: {
                    items: 5,
                    nav: !0
                }
            }
        }), a("#clients").owlCarousel({
            loop: !0,
            nav: !1,
            dots: !1,
            autoplay: !0,
            smartSpeed: 900,
            autoplayTimeout: 3e3,
            responsiveClass: !0,
            autoplayHoverPause: !1,
            responsive: {
                0: {
                    items: 2,
                    margin: 20
                },
                768: {
                    items: 3,
                    margin: 40
                },
                992: {
                    items: 4,
                    margin: 60
                },
                1200: {
                    items: 5,
                    margin: 80
                }
            }
        }), a(".clients-style2").owlCarousel({
            loop: !0,
            nav: !1,
            dots: !1,
            autoplay: !0,
            smartSpeed: 800,
            autoplayTimeout: 3e3,
            responsiveClass: !0,
            autoplayHoverPause: !1,
            responsive: {
                0: {
                    items: 2,
                    margin: 30
                },
                576: {
                    items: 3,
                    margin: 40
                },
                768: {
                    items: 4,
                    margin: 40
                },
                992: {
                    items: 5,
                    margin: 60
                },
                1200: {
                    items: 6,
                    margin: 80
                }
            }
        }), a("#carousel-style2").owlCarousel({
            loop: !0,
            responsiveClass: !0,
            autoplay: !0,
            autoplayTimeout: 3e3,
            smartSpeed: 800,
            nav: !1,
            dots: !1,
            center: !1,
            margin: 0,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                992: {
                    items: 2
                },
                1200: {
                    items: 3
                },
                1600: {
                    items: 4
                }
            }
        }), a(".service-carousel").owlCarousel({
            loop: !0,
            responsiveClass: !0,
            autoplay: !1,
            autoplayTimeout: 3e3,
            smartSpeed: 800,
            nav: !1,
            dots: !1,
            center: !1,
            margin: 30,
            responsive: {
                0: {
                    items: 1
                },
                576: {
                    items: 2
                },
                768: {
                    items: 2
                },
                992: {
                    items: 3
                },
                1200: {
                    items: 3
                },
                1400: {
                    items: 4
                },
                1600: {
                    items: 5
                }
            }
        }), a(".service-carousel01").owlCarousel({
            loop: !0,
            responsiveClass: !0,
            autoplay: !0,
            smartSpeed: 1500,
            nav: !0,
            navText: ["<i class='ti-arrow-left'></i>", "<i class='ti-arrow-right'></i>"],
            dots: !1,
            center: !1,
            margin: 30,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                992: {
                    items: 2
                },
                1200: {
                    items: 3
                }
            }
        }), a(".case-studies").owlCarousel({
            loop: !0,
            responsiveClass: !0,
            autoplay: !0,
            smartSpeed: 800,
            nav: !1,
            dots: !0,
            center: !1,
            margin: 0,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                992: {
                    items: 3
                }
            }
        }), a(".product-grid").owlCarousel({
            loop: !0,
            responsiveClass: !0,
            autoplay: !0,
            smartSpeed: 800,
            nav: !1,
            dots: !0,
            center: !1,
            margin: 30,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                992: {
                    items: 4
                }
            }
        }), a(".clients-style3").owlCarousel({
            loop: !0,
            nav: !1,
            dots: !1,
            autoplay: !0,
            smartSpeed: 800,
            autoplayTimeout: 3e3,
            responsiveClass: !0,
            autoplayHoverPause: !1,
            responsive: {
                0: {
                    items: 2,
                    margin: 10
                },
                576: {
                    items: 3,
                    margin: 10
                },
                768: {
                    items: 3,
                    margin: 10
                },
                992: {
                    items: 2,
                    margin: 10
                },
                1200: {
                    items: 4,
                    margin: 30
                }
            }
        }), a(".owl-carousel").owlCarousel({
            items: 1,
            loop: !0,
            dots: !1,
            margin: 0,
            autoplayTimeout: 3e3,
            autoplay: !0,
            smartSpeed: 900
        }), 0 !== a(".horizontaltab").length && a(".horizontaltab").easyResponsiveTabs({
            type: "default",
            width: "auto",
            fit: !0,
            tabidentify: "hor_1",
            activate: function (e) {
                var s = a(this),
                    t = a("#nested-tabInfo");
                a("span", t).text(s.text()), t.show();
            }
        }), 0 !== a(".childverticaltab").length && a(".childverticaltab").easyResponsiveTabs({
            type: "vertical",
            width: "auto",
            fit: !0,
            tabidentify: "ver_1",
            activetab_bg: "#fff",
            inactive_bg: "#F5F5F5",
            active_border_color: "#c1c1c1",
            active_content_border_color: "#c1c1c1"
        }), 0 !== a(".verticaltab").length && a(".verticaltab").easyResponsiveTabs({
            type: "vertical",
            width: "auto",
            fit: !0,
            closed: "accordion",
            tabidentify: "hor_1",
            activate: function (e) {
                var s = a(this),
                    t = a("#nested-tabInfo2");
                a("span", t).text(s.text()), t.show();
            }
        }), a(".countup").counterUp({
            delay: 25,
            time: 2e3
        }), a(".countdown").countdown({
            date: "01 Jun 2026 00:01:00",
            format: "on"
        }), a(".slow-redirect a[href^='#']").click(function (e) {
            e.preventDefault();
            e = a(a(this).attr("href")).offset().top - 85;
            a("body, html").animate({
                scrollTop: e
            }, 1e3);
        }), a(".current-year").text((new Date).getFullYear());
    }), o.on("load", function () {
        var s = a(".portfolio-gallery-isotope").isotope({});
        a(".filtering").on("click", "span", function () {
            var e = a(this).attr("data-filter");
            s.isotope({
                filter: e
            });
        }), a(".filtering").on("click", "span", function () {
            a(this).addClass("active").siblings().removeClass("active");
        }), a(".filtering2").on("click", "span", function () {
            var e = a(this).attr("data-filter");
            s.isotope({
                filter: e
            });
        }), a(".filtering2").on("click", "span", function () {
            a(this).addClass("active").siblings().removeClass("active");
        }), a(".portfolio-gallery,.portfolio-gallery-isotope").lightGallery(), a(".portfolio-link").on("click", e => {
            e.stopPropagation();
        }), a(".tabs_div").toggleClass("tabs_div_visible");
    });
}(jQuery);