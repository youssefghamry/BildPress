/***************************************************
==================== JS INDEX ======================
****************************************************
01. ScrollToTop Js
02. Smooth Scroll
03. WOW Js
04. NiceSelect
05. Number Input
06. Mean-menu Navbar
07. OwlCarousel for home page 
08. Sticky Menu 
09. CounterUp
10. Isotope Js for Project
11. Fancy Box
12. Search Box
13. Info bar
14. OwlCarousel for project home 01 
15. OwlCarousel for testimonial home 01
16. OwlCarousel for news home 01
17. OwlCarousel for team home 03
18. Counter Js home 01
19. Counter Js home 03
20. OwlCarousel for testimonial home 02
21. OwlCarousel for testimonial home 03
22. Progress-skill
23. Preloader Js
****************************************************/


(function ($) {
    ("use strict");

    $(window).on("load", function () {
        $("#loading").delay(500).fadeOut(500);
        // $("#loading").fadeOut(200);
    });

    ////////////////////////////////////////////////////
    // 01. ScrollToTop Js
    $(window).on("scroll", function () {
        if ($(this).scrollTop() > 500) {
            $(".scrollToTop").fadeIn();
        } else {
            $(".scrollToTop").fadeOut();
        }
    });

    $(".scrollToTop").on("click", function () {
        $("html, body").animate(
            {
                scrollTop: 0,
            },
            800
        );
        return false;
    });

    $(document).on("scroll", function (e) {
        var scrollPos = $(this).scrollTop();
        if (scrollPos > 400) {
            $("#header__menu-wrapper").addClass("menu_sticky");
            $("#header__menu-wrapper").addClass("animated");
            $("#header__menu-wrapper").addClass("slideInDown");
        } else {
            $("#header__menu-wrapper").removeClass("menu_sticky");
            $("#header__menu-wrapper").removeClass("animated");
            $("#header__menu-wrapper").removeClass("slideInDown");
        }
    });

    /* Search
    -------------------------------------------------------*/
    var $searchWrap = $(".search-wrap");
    var $navSearch = $(".nav-search");
    var $searchClose = $("#search-close");

    $(".search-trigger").on("click", function (e) {
        e.preventDefault();
        $searchWrap.animate({ opacity: "toggle" }, 500);
        $navSearch.add($searchClose).addClass("open");
    });

    $(".search-close").on("click", function (e) {
        e.preventDefault();
        $searchWrap.animate({ opacity: "toggle" }, 500);
        $navSearch.add($searchClose).removeClass("open");
    });

    function closeSearch() {
        $searchWrap.fadeOut(200);
        $navSearch.add($searchClose).removeClass("open");
    }

    $(document.body).on("click", function (e) {
        closeSearch();
    });

    $(".search-trigger, .main-search-input").on("click", function (e) {
        e.stopPropagation();
    });

    // One Page Nav
    var top_offset = $(".tp-header").height() - 200;
    $(".tp-header nav ul").onePageNav({
        currentClass: "active",
        scrollOffset: top_offset,
        // filter: ':not(.external)',
    });

    // data - background
    $("[data-background]").each(function () {
        $(this).css(
            "background-image",
            "url(" + $(this).attr("data-background") + ")"
        );
    });

    $("[data-bg-color]").each(function () {
        $(this).css("background-color", $(this).attr("data-bg-color"));
    });

    /* magnificPopup img view */
    $(".popup-image").magnificPopup({
        type: "image",
        gallery: {
            enabled: true,
        },
    });

    /* magnificPopup video view */
    $(".popup-video").magnificPopup({
        type: "iframe",
    });

    // data - background
    $("[data-background]").each(function () {
        $(this).css(
            "background-image",
            "url(" + $(this).attr("data-background") + ")"
        );
    });

    $("[data-bg-color]").each(function () {
        $(this).css("background", $(this).attr("data-bg-color"));
    });

    // menu-last class
    $(".main-menu nav > ul > li").slice(-4).addClass("menu-last");

    // meanmenu
    $("#mobile-active").meanmenu({
        meanMenuContainer: ".mobile-menu",
        meanScreenWidth: "992",
    });

    $(".open-mobile-menu").on("click", function () {
        $(".side-info").addClass("info-open");
        $(".offcanvas-overlay").addClass("overlay-open");
    });

    $(".side-info-close,.offcanvas-overlay,.mobile_one_page li.menu-item a.nav-link").on("click", function () {
        $(".side-info").removeClass("info-open");
        $(".offcanvas-overlay").removeClass("overlay-open");
    });

    // $('#mobile-menu-active .has-children > a').on('click', function (e) {
    //     e.preventDefault();
    // });

    ////////////////////////////////////////////////////
    // 02. Smooth Scroll
    $("a.smooth-scroll").on("click", function (event) {
        event.preventDefault();
        var section_smooth = $(this).attr("href");
        $("html, body").animate(
            {
                scrollTop: $(section_smooth).offset().top,
            },
            1250,
            "easeInOutExpo"
        );
    });

    ////////////////////////////////////////////////////
    // 03. WOW Js
    new WOW().init();

    ////////////////////////////////////////////////////
    // 04. NiceSelect
    $("select").niceSelect();

    ////////////////////////////////////////////////////
    // 05. Number Input
    jQuery(
        '<div class="quantity-nav"><div class="quantity-button quantity-up"><i class="fas fa-plus"></i></div><div class="quantity-button quantity-down"><i class="fas fa-minus"></i></div></div>'
    ).insertAfter(".quantity input");
    jQuery(".quantity").each(function () {
        var spinner = jQuery(this),
            input = spinner.find('input[type="number"]'),
            btnUp = spinner.find(".quantity-up"),
            btnDown = spinner.find(".quantity-down"),
            min = input.attr("min"),
            max = input.attr("max");
        btnUp.on("click", function () {
            var oldValue = parseFloat(input.val());
            if (oldValue >= max) {
                var newVal = oldValue;
            } else {
                var newVal = oldValue + 1;
            }
            spinner.find("input").val(newVal);
            spinner.find("input").trigger("change");
        });
        btnDown.on("click", function () {
            var oldValue = parseFloat(input.val());
            if (oldValue <= min) {
                var newVal = oldValue;
            } else {
                var newVal = oldValue - 1;
            }
            spinner.find("input").val(newVal);
            spinner.find("input").trigger("change");
        });
    });

    // Activate rtl slider
    let rtl_setting = $('body').hasClass("rtl") ? true : false;

    ////////////////////////////////////////////////////
    // 07. OwlCarousel for home page
    function homeSlider() {
        var CarouselWidgetHandler = function () {
            $("[data-background]").each(function () {
                $(this).css(
                    "background-image",
                    "url(" + $(this).attr("data-background") + ")"
                );
            });

            var slider = $(".slider1__active,.slider-active,.slider-active2");

            var conrol_data = slider.attr("data-controls");

            var autoslide = true;
            var navShow = true;
            var dot_nav_show = true;
            var ts_slider_speed = 5000;

            if (conrol_data) {
                var controls = JSON.parse(slider.attr("data-controls"));
                navShow = Boolean(controls.show_nav ? true : false);
                autoslide = Boolean(controls.auto_nav_slide ? true : false);
                dot_nav_show = Boolean(controls.dot_nav_show ? true : false);
                ts_slider_speed = parseInt(controls.ts_slider_speed);
            }

            slider.owlCarousel({
                loop: true,
                animateIn: "fadeIn",
                animateOut: "fadeOut",
                autoplay: autoslide,
                nav: navShow,
                dots: dot_nav_show,
                autoplayTimeout: ts_slider_speed,
                rtl: rtl_setting,
                navText: [
                    '<i class="ti-arrow-left"></i>',
                    '<i class="ti-arrow-right"></i>',
                ],
                smartSpeed: 1100,
                responsive: {
                    0: {
                        items: 1,
                    },
                    600: {
                        items: 1,
                    },
                    1000: {
                        items: 1,
                    },
                },
            });
            slider.on("translate.owl.carousel", function () {
                var layer = $("[data-animation]");
                layer.each(function () {
                    var slider_animation = $(this).data("animation");
                    $(this)
                        .removeClass("animated " + slider_animation)
                        .css("opacity", "0");
                });
            });
            $("[data-delay]").each(function () {
                var animation_delay = $(this).data("delay");
                $(this).css("animation-delay", animation_delay);
            });
            $("[data-duration]").each(function () {
                var animation_dutation = $(this).data("duration");
                $(this).css("animation-duration", animation_dutation);
            });
            slider.on("translated.owl.carousel", function () {
                var layer = slider
                    .find(".owl-item.active")
                    .find("[data-animation]");
                layer.each(function () {
                    var slider_animation = $(this).data("animation");
                    $(this)
                        .addClass("animated " + slider_animation)
                        .css("opacity", "1");
                });
            });
        };
        //# Make sure you run this code under Elementor..
        $(window).on("elementor/frontend/init", function () {
            elementorFrontend.hooks.addAction(
                "frontend/element_ready/slider.default",
                CarouselWidgetHandler
            );
        });
    }

    homeSlider();


    ////////////////////////////////////////////////////
    // 09. CounterUp
    $(".counter").counterUp({
        delay: 10,
        time: 2500,
    });

    ////////////////////////////////////////////////////
    // 10. Isotope Js for Project
    $(".projects2__active button").on("click", function () {
        $(".projects2__active button").removeClass("active");
        $(this).addClass("active");
        var selector = $(this).attr("data-filter");
        $("#isotope-container").isotope({
            filter: selector,
        });
    });
    $(window).on("load", function () {
        $("#isotope-container").isotope();
    });

    $(".projects3__active button").on("click", function () {
        $(".projects3__active button").removeClass("active");
        $(this).addClass("active");
        var selector = $(this).attr("data-filter");
        $("#isotope-container").isotope({
            filter: selector,
        });
    });
    $(window).on("load", function () {
        $("#isotope-container").isotope();
    });

    //////////////////////////////////////////////////
    // 11. Fancy Box
    $('[data-fancybox="gallery_1"]').fancybox({
        loop: true,
        buttons: [
            "zoom",
            "share",
            "slideShow",
            "fullScreen",
            "download",
            "thumbs",
            "close",
        ],
        animationEffect: "zoom-in-out",
        transitionEffect: "circular",
    });

    ////////////////////////////////////////////////////
    // 12. Search Box
    if ($(".search_box_container").length) {
        var searchToggleBtn = $(".search_btn");
        var searchContent = $(".search_form");
        var body = $("body");

        searchToggleBtn.on("click", function (e) {
            searchContent.toggleClass("search_form_toggle");
            e.stopPropagation();
        });

        body.on("click", function () {
            searchContent.removeClass("search_form_toggle");
        })
            .find(searchContent)
            .on("click", function (e) {
                e.stopPropagation();
            });
    }

    ////////////////////////////////////////////////////
    // 13. Info bar
    $(".extra_info_btn").on("click", function () {
        $(".extra_info").addClass("extra_info_open");
    });

    $(".extra_info_close").on("click", function () {
        $(".extra_info").removeClass("extra_info_open");
    });

    ////////////////////////////////////////////////////
    // 14. OwlCarousel for project home 01
    var ProjectWidgetHandler = function () {
        $(".projects1__carousel").owlCarousel({
            loop: true,
            autoplay: false,
            smartSpeed: 1500,
            autoplayHoverPause: true,
            margin: 30,
            autoplayTimeout: 6000,
            rtl: rtl_setting,
            nav: false,
            dots: false,
            responsive: {
                0: {
                    items: 1,
                },
                768: {
                    items: 2,
                },
                992: {
                    items: 2,
                },
                1000: {
                    items: 2,
                },
            },
        });

        $(".portfolio-full-slide").owlCarousel({
            loop: true,
            autoplay: false,
            smartSpeed: 1500,
            autoplayHoverPause: true,
            margin: 0,
            autoplayTimeout: 6000,
            rtl: rtl_setting,
            nav: false,
            dots: false,
            responsive: {
                0: {
                    items: 1,
                },
                768: {
                    items: 3,
                },
                992: {
                    items: 4,
                },
                1000: {
                    items: 5,
                },
            },
        });


        $(".project-slider").owlCarousel({
            loop: true,
            autoplay: true,
            smartSpeed: 500,
            autoplayHoverPause: true,
            margin: 30,
            autoplayTimeout: 5000,
            rtl: rtl_setting,
            nav: false,
            dots: false,
            navText: [
                "<i class='fal fa-angle-left'></i>",
                "<i class='fal fa-angle-right'></i>",
            ],
            responsive: {
                0: {
                    items: 1,
                },
                680: {
                    items: 2,
                },
                1100: {
                    items: 3,
                },
                1400: {
                    items: 4,
                },
            },
        });

        ////////////////////////////////////////////////////
        // OwlCarousel for company slider
        $(".gallery-active").owlCarousel({
            loop: false,
            autoplay: true,
            smartSpeed: 500,
            autoplayHoverPause: true,
            margin: 0,
            autoplayTimeout: 5000,
            rtl: rtl_setting,
            nav: true,
            dots: false,
            navText: ["<i class='fal fa-angle-left'></i>","<i class='fal fa-angle-right'></i>"],
            responsive: {
                0: {
                    items: 1,
                },
                580: {
                    items: 2,
                },
                992: {
                    items: 2,
                },
                1200: {
                    items: 2,
                },
                1500: {
                    items: 3,
                }
            }
        });

    };

    //# Make sure you run this code under Elementor..
    $(window).on("elementor/frontend/init", function () {
        elementorFrontend.hooks.addAction(
            "frontend/element_ready/project_slider.default",
            ProjectWidgetHandler
        );
    });

    ////////////////////////////////////////////////////
    // 15. OwlCarousel for testimonial home 01
    var TestWidgetHandler = function () {
        $("[data-background]").each(function () {
            $(this).css(
                "background-image",
                "url(" + $(this).attr("data-background") + ")"
            );
        });
        $(".testimonial1__carousel").owlCarousel({
            loop: true,
            autoplay: true,
            smartSpeed: 1500,
            autoplayHoverPause: true,
            margin: 0,
            autoplayTimeout: 6000,
            rtl: rtl_setting,
            nav: false,
            dots: true,
            responsive: {
                0: {
                    items: 1,
                },
                768: {
                    items: 1,
                },
                992: {
                    items: 1,
                },
                1000: {
                    items: 1,
                },
            },
        });

        ////////////////////////////////////////////////////
        // 20. OwlCarousel for testimonial home 02
        $(".testimonial2__carousel").owlCarousel({
            loop: true,
            autoplay: true,
            smartSpeed: 1500,
            autoplayHoverPause: true,
            margin: 0,
            autoplayTimeout: 6000,
            rtl: rtl_setting,
            nav: false,
            dots: true,
            responsive: {
                0: {
                    items: 1,
                },
                768: {
                    items: 1,
                },
                991: {
                    items: 1,
                },
                992: {
                    items: 2,
                },
                1000: {
                    items: 2,
                },
            },
        });

        $(".testimonial-active").owlCarousel({
            loop: true,
            autoplay: true,
            smartSpeed: 500,
            autoplayHoverPause: true,
            margin: 80,
            autoplayTimeout: 5000,
            rtl: rtl_setting,
            nav: true,
            dots: true,
            navText: ["<i class='fal fa-arrow-left'></i>","<i class='fal fa-arrow-right'></i>"],
            responsive: {
                0: {
                    items: 1,
                },
                992: {
                    items: 1,
                },
            },
        });

    };
    //# Make sure you run this code under Elementor..
    $(window).on("elementor/frontend/init", function () {
        elementorFrontend.hooks.addAction(
            "frontend/element_ready/testimonial_slider.default",
            TestWidgetHandler
        );
    });

    ////////////////////////////////////////////////////
    // 16. OwlCarousel for news home 01
    $(".news1__carousel").owlCarousel({
        loop: true,
        autoplay: true,
        smartSpeed: 1000,
        autoplayHoverPause: true,
        margin: 30,
        autoplayTimeout: 5000,
        rtl: rtl_setting,
        nav: true,
        navText: [
            '<i class="fas fa-chevron-left"></i> PREV',
            'NEXT <i class="fas fa-chevron-right"></i>',
        ],
        dots: false,
        responsive: {
            0: {
                items: 1,
            },
            768: {
                items: 2,
            },
            992: {
                items: 3,
            },
            1000: {
                items: 3,
            },
        },
    });

    ////////////////////////////////////////////////////
    // 17. OwlCarousel for team home 03
    var TeamWidgetHandler = function () {
        $(".team1__carousel").owlCarousel({
            loop: true,
            autoplay: true,
            smartSpeed: 1000,
            autoplayHoverPause: true,
            margin: 30,
            autoplayTimeout: 5000,
            rtl: rtl_setting,
            nav: true,
            navText: ["PREV", "NEXT"],
            dots: false,
            responsive: {
                0: {
                    items: 1,
                },
                768: {
                    items: 2,
                },
                992: {
                    items: 3,
                },
                1000: {
                    items: 3,
                },
            },
        });
    };
    //# Make sure you run this code under Elementor..
    $(window).on("elementor/frontend/init", function () {
        elementorFrontend.hooks.addAction(
            "frontend/element_ready/member_slider.default",
            TeamWidgetHandler
        );
    });

    ////////////////////////////////////////////////////
    // 19. Counter Js home 03
    var KnobWidgetHandler = function () {
        if (typeof $.fn.knob != "undefined") {
            $(".knob").each(function () {
                var $this = $(this),
                    knobVal = $this.attr("data-rel");

                $this.knob({
                    draw: function () {
                        $(this.i).val(this.cv + "%");
                    },
                });

                $this.appear(
                    function () {
                        $({
                            value: 0,
                        }).animate(
                            {
                                value: knobVal,
                            },
                            {
                                duration: 2000,
                                easing: "swing",
                                step: function () {
                                    $this
                                        .val(Math.ceil(this.value))
                                        .trigger("change");
                                },
                            }
                        );
                    },
                    {
                        accX: 0,
                        accY: -150,
                    }
                );
            });
        }
    };
    //# Make sure you run this code under Elementor..
    $(window).on("elementor/frontend/init", function () {
        elementorFrontend.hooks.addAction(
            "frontend/element_ready/fact.default",
            KnobWidgetHandler
        );
    });

    $("#counter1").waypoint(
        function () {
            var skill_settings0 = $(".skill-item-0").data("skill0");
            var skill_settings1 = $(".skill-item-1").data("skill1");
            var skill_settings2 = $(".skill-item-2").data("skill2");
            var skill_settings3 = $(".skill-item-3").data("skill3");

            // circle-1
            $("#circle-0")
                .circleProgress({
                    value: 0.78,
                    size: 200,
                    thickness: 10,
                    // lineCap: 'round',
                    emptyFill: "#314D79",
                    fill: "#ff5e14",
                })
                .on("circle-animation-progress", function (event, progress) {
                    $(this)
                        .find(".counter1__percentage")
                        .html(
                            Math.round(skill_settings0.num * progress) +
                                "<i>%</i>"
                        );
                });
            // circle-2
            $("#circle-1")
                .circleProgress({
                    value: 0.9,
                    size: 200,
                    thickness: 10,
                    emptyFill: "#314D79",
                    fill: "#ff5e14",
                })
                .on("circle-animation-progress", function (event, progress) {
                    $(this)
                        .find(".counter1__percentage")
                        .html(
                            Math.round(skill_settings1.num * progress) +
                                "<i>%</i>"
                        );
                });
            // circle-3
            $("#circle-2")
                .circleProgress({
                    value: 0.62,
                    size: 200,
                    thickness: 10,
                    emptyFill: "#314D79",
                    fill: "#ff5e14",
                })
                .on("circle-animation-progress", function (event, progress) {
                    $(this)
                        .find(".counter1__percentage")
                        .html(
                            Math.round(skill_settings2.num * progress) +
                                "<i>%</i>"
                        );
                });
            // circle-4
            $("#circle-3")
                .circleProgress({
                    value: 0.85,
                    size: 200,
                    thickness: 10,
                    emptyFill: "#314D79",
                    fill: "#ff5e14",
                })
                .on("circle-animation-progress", function (event, progress) {
                    $(this)
                        .find(".counter1__percentage")
                        .html(
                            Math.round(skill_settings3.num * progress) +
                                "<i>%</i>"
                        );
                });
        },
        {
            offset: "bottom-in-view",
        }
    );

    ////////////////////////////////////////////////////
    // 21. OwlCarousel for testimonial home 03
    var BrandWidgetHandler = function () {
        $(".brand-active").owlCarousel({
            loop: true,
            autoplay: false,
            smartSpeed: 500,
            autoplayHoverPause: true,
            margin: 30,
            autoplayTimeout: 5000,
            rtl: rtl_setting,
            nav: false,
            dots: false,
            responsive: {
                0: {
                    items: 1,
                },
                570: {
                    items: 2,
                },
                768: {
                    items: 3,
                },
                992: {
                    items: 4,
                },
                1200: {
                    items: 5,
                },
            },
        });

        $(".brand-active").owlCarousel({
            loop: true,
            autoplay: false,
            smartSpeed: 500,
            autoplayHoverPause: true,
            margin: 30,
            autoplayTimeout: 5000,
            rtl: rtl_setting,
            nav: false,
            dots: false,
            responsive: {
                0: {
                    items: 1,
                },
                570: {
                    items: 2,
                },
                768: {
                    items: 3,
                },
                992: {
                    items: 4,
                },
                1200: {
                    items: 5,
                },
            },
        });

        ////////////////////////////////////////////////////
        // 21. OwlCarousel for testimonial home 03
        $(".testimonial3__sponsor").owlCarousel({
            loop: true,
            autoplay: true,
            smartSpeed: 500,
            autoplayHoverPause: true,
            margin: 30,
            autoplayTimeout: 5000,
            rtl: rtl_setting,
            nav: false,
            dots: false,
            responsive: {
                0: {
                    items: 2,
                },
                641: {
                    items: 3,
                },
                768: {
                    items: 4,
                },
                992: {
                    items: 3,
                },
                1200: {
                    items: 4,
                },
            },
        });


        $(".company-slider").owlCarousel({
            loop: true,
            autoplay: true,
            smartSpeed: 500,
            autoplayHoverPause: true,
            margin: 80,
            autoplayTimeout: 5000,
            rtl: rtl_setting,
            nav: false,
            dots: false,
            responsive: {
                0: {
                    items: 1,
                },
                580: {
                    items: 2,
                },
                768: {
                    items: 3,
                },
                992: {
                    items: 4,
                },
            },
        });

        $(".client-active").owlCarousel({
            loop: true,
            autoplay: true,
            smartSpeed: 500,
            autoplayHoverPause: true,
            margin: 0,
            autoplayTimeout: 5000,
            rtl: rtl_setting,
            nav: false,
            dots: false,
            navText: ["<i class='fal fa-arrow-left'></i>","<i class='fal fa-arrow-right'></i>"],
            responsive: {
                0: {
                    items: 1,
                },
                580: {
                    items: 3,
                },
                992: {
                    items: 3,
                },
                1200: {
                    items: 4,
                },
            },
        });
    };

    //# Make sure you run this code under Elementor..
    $(window).on("elementor/frontend/init", function () {
        elementorFrontend.hooks.addAction(
            "frontend/element_ready/brand.default",
            BrandWidgetHandler
        );
    });

    ////////////////////////////////////////////////////
    // 22. Progress-skill
    $("#progress-elements").waypoint(
        function () {
            $(".progress-bar").each(function () {
                $(this).animate(
                    {
                        width: $(this).attr("aria-valuenow") + "%",
                    },
                    2000
                );
            });
            this.destroy();
        },
        {
            offset: "bottom-in-view",
        }
    );

    ////////////////////////////////////////////////////
    // OwlCarousel for company slider
    $(".arc-testimonial-active").owlCarousel({
        loop: true,
        autoplay: true,
        smartSpeed: 500,
        autoplayHoverPause: true,
        margin: 80,
        autoplayTimeout: 5000,
        rtl: rtl_setting,
        nav: false,
        dots: false,
        navText: ["<i class='fal fa-arrow-left'></i>","<i class='fal fa-arrow-right'></i>"],
        responsive: {
            0: {
                items: 1,
            },
            992: {
                items: 1,
            },
        },
    });



    // OwlCarousel for about slider
    var AboutWidgetHandler = function () {
        $(".about-active").owlCarousel({
    		loop: true,
    		autoplay: true,
    		smartSpeed: 500,
    		autoplayHoverPause: true,
    		margin: 20,
    		autoplayTimeout: 5000,
            rtl: rtl_setting,
    		nav: true,
    		dots: false,
    		navText: [
    			"<i class='fal fa-angle-left'></i>",
    			"<i class='fal fa-angle-right'></i>",
    		],
    		responsive: {
    			0: {
    				items: 1,
    			},
    			520: {
    				items: 2,
    			},
    			992: {
    				items: 2,
    			},
    			1200: {
    				items: 2,
    			},
    		},
    	});
    };

    //# Make sure you run this code under Elementor..
    $(window).on("elementor/frontend/init", function () {
        elementorFrontend.hooks.addAction(
            "frontend/element_ready/about.default",
            AboutWidgetHandler
        );
    });

     $(".sliderOil-active").owlCarousel({
			loop: true,
			animateIn: "fadeIn",
			animateOut: "fadeOut",
			autoplay: autoslide,
			nav: navShow,
			dots: dot_nav_show,
            rtl: rtl_setting,
			autoplayTimeout: ts_slider_speed,
			navText: [
				'<i class="ti-arrow-left"></i>',
				'<i class="ti-arrow-right"></i>',
			],
			smartSpeed: 1100,
			responsive: {
				0: {
					items: 1,
				},
				600: {
					items: 1,
				},
				1000: {
					items: 1,
				},
			},
		});



    //////////////////////////////////////////////////////
    // window load function
    $(window).on("load", function () {
        //////////////////////////////////////////////////////
        // 23. Preloader Js
        $(".preloader").delay(350).fadeOut("slow");
    });
})(jQuery);