jQuery(document).ready(function () {
    jQuery(".third-button").on("click", function () {
        jQuery(".animated-icon3").toggleClass("open");
    });

    // Hamburger menu
    jQuery(".hammy").on("click", function (e) {
        e.preventDefault();
        jQuery(this).toggleClass("animate");
        jQuery("nav.mobile-navigation").toggleClass("show");
        jQuery("body").toggleClass("push-toright");
    });

    // Mobile navigation
    jQuery("body").addClass("push");

    if(jQuery("#hero-carousel").length) {
        jQuery("#hero-carousel").owlCarousel({
            autoplay: true,
            autoplayTimeout: 7000,
            loop: true,
            margin: 0,
            nav: true,
            lazyLoad: true,
            video: true,
            singleItem: true,
            dots: true,
            items: 1,
            smartSpeed: 1000,
            autoHeight: hero_carousel_height_auto,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            },
            onTranslate: function (event) {

                var currentSlide, player, command;

                currentSlide = jQuery('.owl-item.active');

                player = currentSlide.find(".videoWrapper iframe").get(0);

                command = {
                    "event": "command",
                    "func": "pauseVideo"
                };

                if (player != undefined) {
                    player.contentWindow.postMessage(JSON.stringify(command), "*");

                }

            }
        });
    }
    jQuery(".news-carousel").owlCarousel({
        loop: false,
        margin: 10,
        nav: true,
        dots: false,
        items: 3,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 3
            }
        }
    });

    jQuery(".testimonials-carousel").owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            }
        }
    });
});

(function ($) {
    $.fn.searchBox = function (ev) {
        var $searchEl = $(".search-elem");
        var $placeHolder = $(".placeholder");
        var $sField = $("#search-field");

        if (ev === "open") {
            $searchEl.addClass("search-open");
        }

        if (ev === "close") {
            $searchEl.removeClass("search-open"),
                $placeHolder.removeClass("move-up"),
                $sField.val("");
        }

        var moveText = function () {
            $placeHolder.addClass("move-up");
        };

        $sField.focus(moveText);
        $placeHolder.on("click", moveText);

        $(".submit").prop("disabled", true);
        $("#search-field").keyup(function () {
            if ($(this).val() != "") {
                $(".submit").prop("disabled", false);
            }
        });
    };
})(jQuery);

jQuery(".search-btn").on("click", function (e) {
    jQuery(this).searchBox("open");
    e.preventDefault();
});

jQuery(".close").on("click", function () {
    jQuery(this).searchBox("close");
});

jQuery('.main-navigation .dropdown-toggle, #menu-top-quicklinks .dropdown-toggle').on('click',function(e){
    e.preventDefault();
    location.href = jQuery(this).attr('href');
});


//mobile menu
jQuery('#mobile-top-navigation li').each(function (i, li) {
    if (jQuery(this).hasClass('menu-item-has-children')) {
        jQuery(this).children('a').after('<div class="dropdown-arrow"></div>');
    }
});

jQuery('#mobile-top-navigation li.menu-item-has-children .dropdown-arrow').on('click',function(e){
    jQuery(this).parent().children('.sub-menu').toggleClass('show');
});
