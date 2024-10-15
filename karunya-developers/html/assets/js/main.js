! function (t) {
    "use strict";

    function e(e) {
        t(e).length > 0 && t(e).each((function () {
            var e = t(this).find("a");
            t(this).find(e).each((function () {
                t(this).on("click", (function () {
                    var e = t(this.getAttribute("href"));
                    e.length && (event.preventDefault(), t("html, body").stop().animate({
                        scrollTop: e.offset().top - 10
                    }, 1e3))
                }))
            }))
        }))
    }
    if (t(window).on("load", (function () {
            t(".preloader").fadeOut(), t(".slick-slider").slick("refresh")
        })), t(window).on("resize", (function () {
            t(".slick-slider").slick("refresh")
        })), t(".preloader").length > 0 && t(".preloaderCls").each((function () {
            t(this).on("click", (function (e) {
                e.preventDefault(), t(".preloader").css("display", "none")
            }))
        })), t.fn.thmobilemenu = function (e) {
            var s = t.extend({
                menuToggleBtn: ".th-menu-toggle",
                bodyToggleClass: "th-body-visible",
                subMenuClass: "th-submenu",
                subMenuParent: "th-item-has-children",
                subMenuParentToggle: "th-active",
                meanExpandClass: "th-mean-expand",
                appendElement: '<span class="th-mean-expand"></span>',
                subMenuToggleClass: "th-open",
                toggleSpeed: 400
            }, e);
            return this.each((function () {
                var e = t(this);

                function a() {
                    e.toggleClass(s.bodyToggleClass);
                    var a = "." + s.subMenuClass;
                    t(a).each((function () {
                        t(this).hasClass(s.subMenuToggleClass) && (t(this).removeClass(s.subMenuToggleClass), t(this).css("display", "none"), t(this).parent().removeClass(s.subMenuParentToggle))
                    }))
                }
                e.find("li").each((function () {
                    var e = t(this).find("ul");
                    e.addClass(s.subMenuClass), e.css("display", "none"), e.parent().addClass(s.subMenuParent), e.prev("a").append(s.appendElement), e.next("a").append(s.appendElement)
                }));
                var i = "." + s.meanExpandClass;
                t(i).each((function () {
                    t(this).on("click", (function (e) {
                        var a;
                        e.preventDefault(), a = t(this).parent(), t(a).next("ul").length > 0 ? (t(a).parent().toggleClass(s.subMenuParentToggle), t(a).next("ul").slideToggle(s.toggleSpeed), t(a).next("ul").toggleClass(s.subMenuToggleClass)) : t(a).prev("ul").length > 0 && (t(a).parent().toggleClass(s.subMenuParentToggle), t(a).prev("ul").slideToggle(s.toggleSpeed), t(a).prev("ul").toggleClass(s.subMenuToggleClass))
                    }))
                })), t(s.menuToggleBtn).each((function () {
                    t(this).on("click", (function () {
                        a()
                    }))
                })), e.on("click", (function (t) {
                    t.stopPropagation(), a()
                })), e.find("div").on("click", (function (t) {
                    t.stopPropagation()
                }))
            }))
        }, t(".th-menu-wrapper").thmobilemenu(), t(window).scroll((function () {
            t(this).scrollTop() > 500 ? t(".sticky-wrapper").addClass("sticky") : t(".sticky-wrapper").removeClass("sticky")
        })), e(".onepage-nav"), e(".scroll-down"), t(".scroll-top").length > 0) {
        var s = document.querySelector(".scroll-top"),
            a = document.querySelector(".scroll-top path"),
            i = a.getTotalLength();
        a.style.transition = a.style.WebkitTransition = "none", a.style.strokeDasharray = i + " " + i, a.style.strokeDashoffset = i, a.getBoundingClientRect(), a.style.transition = a.style.WebkitTransition = "stroke-dashoffset 10ms linear";
        var o = function () {
            var e = t(window).scrollTop(),
                s = t(document).height() - t(window).height(),
                o = i - e * i / s;
            a.style.strokeDashoffset = o
        };
        o(), t(window).scroll(o);
        jQuery(window).on("scroll", (function () {
            jQuery(this).scrollTop() > 50 ? jQuery(s).addClass("show") : jQuery(s).removeClass("show")
        })), jQuery(s).on("click", (function (t) {
            return t.preventDefault(), jQuery("html, body").animate({
                scrollTop: 0
            }, 750), !1
        }))
    }
    t("[data-bg-src]").length > 0 && t("[data-bg-src]").each((function () {
        var e = t(this).attr("data-bg-src");
        t(this).css("background-image", "url(" + e + ")"), t(this).removeAttr("data-bg-src").addClass("background-image")
    })), t("[data-bg-color]").length > 0 && t("[data-bg-color]").each((function () {
        var e = t(this).attr("data-bg-color");
        t(this).css("background-color", e), t(this).removeAttr("data-bg-color")
    })), t("[data-mask-src]").length > 0 && t("[data-mask-src]").each((function () {
        var e = t(this).attr("data-mask-src");
        t(this).css({
            "mask-image": "url(" + e + ")",
            "-webkit-mask-image": "url(" + e + ")"
        }), t(this).addClass("bg-mask"), t(this).removeAttr("data-mask-src")
    })), t(".th-carousel").each((function () {
        var e = t(this);

        function s(t) {
            return e.data(t)
        }
        var a = '<button type="button" class="slick-prev"><i class="' + s("prev-arrow") + '"></i></button>',
            i = '<button type="button" class="slick-next"><i class="' + s("next-arrow") + '"></i></button>';
        t("[data-slick-next]").each((function () {
            t(this).on("click", (function (e) {
                e.preventDefault(), t(t(this).data("slick-next")).slick("slickNext")
            }))
        })), t("[data-slick-prev]").each((function () {
            t(this).on("click", (function (e) {
                e.preventDefault(), t(t(this).data("slick-prev")).slick("slickPrev")
            }))
        })), 1 == s("arrows") && (e.closest(".arrow-wrap").length || e.closest(".container").parent().addClass("arrow-wrap")), e.slick({
            dots: !!s("dots"),
            fade: !!s("fade"),
            arrows: !!s("arrows"),
            speed: s("speed") ? s("speed") : 1e3,
            asNavFor: !!s("asnavfor") && s("asnavfor"),
            autoplay: 0 != s("autoplay"),
            infinite: 0 != s("infinite"),
            slidesToShow: s("slide-show") ? s("slide-show") : 1,
            adaptiveHeight: !!s("adaptive-height"),
            centerMode: !!s("center-mode"),
            autoplaySpeed: s("autoplay-speed") ? s("autoplay-speed") : 8e3,
            centerPadding: s("center-padding") ? s("center-padding") : "0",
            focusOnSelect: 0 != s("focuson-select"),
            pauseOnFocus: !!s("pauseon-focus"),
            pauseOnHover: !!s("pauseon-hover"),
            variableWidth: !!s("variable-width"),
            vertical: !!s("vertical"),
            verticalSwiping: !!s("vertical"),
            swipeToSlide: !!s("swipetoslide"),
            prevArrow: s("prev-arrow") ? a : '<button type="button" class="slick-prev"><i class="far fa-arrow-left"></i></button>',
            nextArrow: s("next-arrow") ? i : '<button type="button" class="slick-next"><i class="far fa-arrow-right"></i></button>',
            rtl: "rtl" == t("html").attr("dir"),
            responsive: [{
                breakpoint: 1600,
                settings: {
                    arrows: !!s("xl-arrows"),
                    dots: !!s("xl-dots"),
                    slidesToShow: s("xl-slide-show") ? s("xl-slide-show") : s("slide-show"),
                    centerMode: !!s("xl-center-mode"),
                    centerPadding: "0"
                }
            }, {
                breakpoint: 1400,
                settings: {
                    arrows: !!s("ml-arrows"),
                    dots: !!s("ml-dots"),
                    slidesToShow: s("ml-slide-show") ? s("ml-slide-show") : s("slide-show"),
                    centerMode: !!s("ml-center-mode"),
                    centerPadding: 0
                }
            }, {
                breakpoint: 1200,
                settings: {
                    arrows: !!s("lg-arrows"),
                    dots: !!s("lg-dots"),
                    slidesToShow: s("lg-slide-show") ? s("lg-slide-show") : s("slide-show"),
                    centerMode: !!s("lg-center-mode") && s("lg-center-mode"),
                    centerPadding: 0
                }
            }, {
                breakpoint: 992,
                settings: {
                    arrows: !!s("md-arrows"),
                    dots: !!s("md-dots"),
                    slidesToShow: s("md-slide-show") ? s("md-slide-show") : 1,
                    centerMode: !!s("md-center-mode") && s("md-center-mode"),
                    centerPadding: 0
                }
            }, {
                breakpoint: 768,
                settings: {
                    arrows: !!s("sm-arrows"),
                    dots: !!s("sm-dots"),
                    slidesToShow: s("sm-slide-show") ? s("sm-slide-show") : 1,
                    centerMode: !!s("sm-center-mode") && s("sm-center-mode"),
                    centerPadding: 0,
                    variableWidth: !!s("sm-variable-width")
                }
            }, {
                breakpoint: 576,
                settings: {
                    arrows: !!s("xs-arrows"),
                    dots: !!s("xs-dots"),
                    slidesToShow: s("xs-slide-show") ? s("xs-slide-show") : 1,
                    centerMode: !!s("xs-center-mode") && s("xs-center-mode"),
                    centerPadding: 0,
                    variableWidth: !!s("xs-variable-width")
                }
            }]
        })
    })), t("[data-ani-duration]").each((function () {
        var e = t(this).data("ani-duration");
        t(this).css("animation-duration", e)
    })), t("[data-ani-delay]").each((function () {
        var e = t(this).data("ani-delay");
        t(this).css("animation-delay", e)
    })), t("[data-ani]").each((function () {
        var e = t(this).data("ani");
        t(this).addClass(e), t(".slick-current [data-ani]").addClass("th-animated")
    })), t(".th-carousel").on("afterChange", (function (e, s, a, i) {
        t(s.$slides).find("[data-ani]").removeClass("th-animated"), t(s.$slides[a]).find("[data-ani]").addClass("th-animated")
    }));
    var n, r, l, c = ".ajax-contact",
        d = '[name="email"]',
        p = t(".form-messages");

    function u() {
        var e = t(c).serialize();
        (function () {
            var e, s = !0;

            function a(a) {
                a = a.split(",");
                for (var i = 0; i < a.length; i++) e = c + " " + a[i], t(e).val() ? (t(e).removeClass("is-invalid"), s = !0) : (t(e).addClass("is-invalid"), s = !1)
            }
            a('[name="name"],[name="email"],[name="subject"],[name="number"],[name="message"]'), t(d).val() && t(d).val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/) ? (t(d).removeClass("is-invalid"), s = !0) : (t(d).addClass("is-invalid"), s = !1);
            return s
        })() && jQuery.ajax({
            url: t(c).attr("action"),
            data: e,
            type: "POST"
        }).done((function (e) {
            p.removeClass("error"), p.addClass("success"), p.text(e), t(c + ' input:not([type="submit"]),' + c + " textarea").val("")
        })).fail((function (t) {
            p.removeClass("success"), p.addClass("error"), "" !== t.responseText ? p.html(t.responseText) : p.html("Oops! An error occured and your message could not be sent.")
        }))
    }

    function h(t) {
        return parseInt(t, 10)
    }
    t(c).on("submit", (function (t) {
            t.preventDefault(), u()
        })), n = ".popup-search-box", r = ".searchClose", l = "show", t(".searchBoxToggler").on("click", (function (e) {
            e.preventDefault(), t(n).addClass(l)
        })), t(n).on("click", (function (e) {
            e.stopPropagation(), t(n).removeClass(l)
        })), t(n).find("form").on("click", (function (e) {
            e.stopPropagation(), t(n).addClass(l)
        })), t(r).on("click", (function (e) {
            e.preventDefault(), e.stopPropagation(), t(n).removeClass(l)
        })),
        function (e, s, a, i) {
            t(s).on("click", (function (s) {
                s.preventDefault(), t(e).addClass(i)
            })), t(e).on("click", (function (s) {
                s.stopPropagation(), t(e).removeClass(i)
            })), t(e + " > div").on("click", (function (s) {
                s.stopPropagation(), t(e).addClass(i)
            })), t(a).on("click", (function (s) {
                s.preventDefault(), s.stopPropagation(), t(e).removeClass(i)
            }))
        }(".sidemenu-wrapper", ".sideMenuToggler", ".sideMenuCls", "show"), t(".popup-image").magnificPopup({
            type: "image",
            mainClass: "mfp-zoom-in",
            removalDelay: 260,
            gallery: {
                enabled: !0
            }
        }), t(".popup-video").magnificPopup({
            type: "iframe",
            mainClass: "mfp-zoom-in",
            removalDelay: 260
        }), t(".popup-content").magnificPopup({
            type: "inline",
            midClick: !0
        }), t(".popup-content").on("click", (function () {
            t(".slick-slider").slick("refresh")
        })), t.fn.sectionPosition = function (e, s) {
            t(this).each((function () {
                var a, i, o, n, r, l = t(this);
                a = Math.floor(l.height() / 2), i = l.attr(e), o = l.attr(s), n = h(t(o).css("padding-top")), r = h(t(o).css("padding-bottom")), "top-half" === i ? (t(o).css("padding-bottom", r + a + "px"), l.css("margin-top", "-" + a + "px")) : "bottom-half" === i && (t(o).css("padding-top", n + a + "px"), l.css("margin-bottom", "-" + a + "px"))
            }))
        };
    t("[data-sec-pos]").length && t("[data-sec-pos]").imagesLoaded((function () {
        t("[data-sec-pos]").sectionPosition("data-sec-pos", "data-pos-for")
    })), t.fn.sectionSpace = function (e, s) {
        t(this).each((function () {
            var a, i, o, n, r, l, c = t(this);
            a = c.attr(e), i = c.attr(s), o = c.data("margin-top"), n = c.data("margin-bottom"), r = h(t(i).css("padding-top")), l = h(t(i).css("padding-bottom")), "margin-top" === a ? (t(i).css("padding-bottom", l + h(o) + "px"), c.css("margin-top", "-" + h(o) + "px").css({
                position: "relative",
                "z-index": "3"
            })) : "margin-bottom" === a && (t(i).css("padding-top", r + h(n) + "px"), c.css("margin-bottom", "-" + h(n) + "px").css({
                position: "relative",
                "z-index": "3"
            }))
        }))
    };

    function f() {
        t(".feature-circle .progressbar").each((function () {
            var e = t(this).attr("data-path-color"),
                s = t(this).offset().top,
                a = t(window).scrollTop(),
                i = t(this).find(".circle").attr("data-percent"),
                o = (parseInt(i, 10), parseInt(100, 10), t(this).data("animate"));
            s < a + t(window).height() - 30 && !o && (t(this).data("animate", !0), t(this).find(".circle").circleProgress({
                startAngle: -Math.PI / 2,
                value: i / 100,
                size: 100,
                thickness: 6,
                emptyFill: "transparent",
                lineCap: "round",
                fill: {
                    color: e
                }
            }).on("circle-animation-progress", (function (e, s, a) {
                t(this).find(".circle-num").text((100 * a).toFixed(0) + "%")
            })).stop())
        })), t(".skill-circle .progressbar").each((function () {
            var e = t(this).offset().top,
                s = t(window).scrollTop(),
                a = t(this).find(".circle").attr("data-percent"),
                i = (parseInt(a, 10), parseInt(100, 10), t(this).data("animate"));
            e < s + t(window).height() - 30 && !i && (t(this).data("animate", !0), t(this).find(".circle").circleProgress({
                startAngle: -Math.PI / 2,
                value: a / 100,
                size: 100,
                thickness: 8,
                emptyFill: "#E0E0E0",
                lineCap: "round",
                fill: {
                    gradient: ["#F11F22", "#F2891D"]
                }
            }).on("circle-animation-progress", (function (e, s, a) {
                t(this).find(".circle-num").text((100 * a).toFixed(0) + "%")
            })).stop())
        }))
    }
    t("[data-sec-space]").length && t("[data-sec-space]").imagesLoaded((function () {
        t("[data-sec-space]").sectionSpace("data-sec-space", "data-pos-space")
    })), t(".filter-active").imagesLoaded((function () {
        if (t(".filter-active").length > 0) {
            var e = t(".filter-active").isotope({
                itemSelector: ".filter-item",
                filter: "*",
                masonry: {
                    columnWidth: 1
                }
            });
            t(".filter-menu-active").on("click", "button", (function () {
                var s = t(this).attr("data-filter");
                e.isotope({
                    filter: s
                })
            })), t(".filter-menu-active").on("click", "button", (function (e) {
                e.preventDefault(), t(this).addClass("active"), t(this).siblings(".active").removeClass("active")
            }))
        }
    })), t("#projectSlide3").slick({
        centerMode: !0,
        centerPadding: "330px",
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: !1,
        dots: !1,
        autoplay: !0,
        speed: 1e3,
        autoplaySpeed: 6e3,
        focusOnSelect: !0,
        responsive: [{
            breakpoint: 1670,
            settings: {
                centerPadding: "100px",
                slidesToShow: 3
            }
        }, {
            breakpoint: 1199,
            settings: {
                centerPadding: "300px",
                slidesToShow: 1
            }
        }, {
            breakpoint: 992,
            settings: {
                centerPadding: "200px",
                slidesToShow: 1
            }
        }, {
            breakpoint: 767,
            settings: {
                centerPadding: "50px",
                slidesToShow: 1
            }
        }, {
            breakpoint: 440,
            settings: {
                centerPadding: "0",
                slidesToShow: 1
            }
        }]
    }), t(".masonary-active").imagesLoaded((function () {
        t(".masonary-active").length > 0 && t(".masonary-active").isotope({
            itemSelector: ".filter-item",
            filter: "*",
            masonry: {
                columnWidth: 1
            }
        })
    })), t(".masonary-active, .woocommerce-Reviews .comment-list").imagesLoaded((function () {
        var e = ".masonary-active, .woocommerce-Reviews .comment-list";
        t(e).length > 0 && t(e).isotope({
            itemSelector: ".filter-item, .woocommerce-Reviews .comment-list li",
            filter: "*",
            masonry: {
                columnWidth: 1
            }
        }), t('[data-bs-toggle="tab"]').on("shown.bs.tab", (function (s) {
            t(e).isotope({
                filter: "*"
            })
        }))
    })), t(".filter-active-cat1").imagesLoaded((function () {
        if (t(".filter-active-cat1").length > 0) {
            var e = t(".filter-active-cat1").isotope({
                itemSelector: ".filter-item",
                filter: ".cat1",
                masonry: {
                    columnWidth: 1
                }
            });
            t(".filter-menu-active").on("click", "button", (function () {
                var s = t(this).attr("data-filter");
                e.isotope({
                    filter: s
                })
            })), t(".filter-menu-active").on("click", "button", (function (e) {
                e.preventDefault(), t(this).addClass("active"), t(this).siblings(".active").removeClass("active")
            }))
        }
    })), t(".counter-number").counterUp({
        delay: 10,
        time: 1e3
    }), t.fn.thTab = function (e) {
        var s = t.extend({
            sliderTab: !1,
            tabButton: "button"
        }, e);
        t(this).each((function () {
            var e = t(this),
                a = e.find(s.tabButton);
            e.append('<span class="indicator"></span>');
            var i = e.find(".indicator");
            if (a.on("click", (function (e) {
                    e.preventDefault();
                    var a = t(this);
                    a.addClass("active").siblings().removeClass("active"), s.sliderTab ? t(o).slick("slickGoTo", a.data("slide-go-to")) : r()
                })), s.sliderTab) {
                var o = e.data("asnavfor"),
                    n = 0;
                a.each((function () {
                    var a = t(this);
                    a.attr("data-slide-go-to", n), n++, a.hasClass("active") && t(o).slick("slickGoTo", a.data("slide-go-to")), t(o).on("beforeChange", (function (t, a, i, o) {
                        e.find(s.tabButton + '[data-slide-go-to="' + o + '"]').addClass("active").siblings().removeClass("active"), r()
                    }))
                }))
            }

            function r() {
                var o = e.find(s.tabButton + ".active"),
                    n = o.css("height"),
                    r = o.css("width"),
                    l = o.position().top + "px",
                    c = o.position().left + "px";
                i.get(0).style.setProperty("--height-set", n), i.get(0).style.setProperty("--width-set", r), i.get(0).style.setProperty("--pos-y", l), i.get(0).style.setProperty("--pos-x", c), t(a).first().position().left == o.position().left ? i.addClass("start").removeClass("center").removeClass("end") : t(a).last().position().left == o.position().left ? i.addClass("end").removeClass("center").removeClass("start") : i.addClass("center").removeClass("start").removeClass("end")
            }
            r()
        }))
    }, t(".testi-card-tab").length && t(".testi-card-tab").thTab({
        sliderTab: !0,
        tabButton: ".tab-btn"
    }), t('[data-bs-toggle="tab"]').on("shown.bs.tab", (function (e) {
        t(".th-carousel").slick("setPosition")
    })), t.fn.shapeMockup = function () {
        t(this).each((function () {
            var e = t(this),
                s = e.data("top"),
                a = e.data("right"),
                i = e.data("bottom"),
                o = e.data("left");
            e.css({
                top: s,
                right: a,
                bottom: i,
                left: o
            }).removeAttr("data-top").removeAttr("data-right").removeAttr("data-bottom").removeAttr("data-left").parent().addClass("shape-mockup-wrap")
        }))
    }, t(".shape-mockup") && t(".shape-mockup").shapeMockup(), t(".progress-bar").waypoint((function () {
        t(".progress-bar").css({
            animation: "animate-positive 1.8s",
            opacity: "1"
        })
    }), {
        offset: "75%"
    }), t(".price_slider").slider({
        range: !0,
        min: 10,
        max: 100,
        values: [10, 75],
        slide: function (e, s) {
            t(".from").text("$" + s.values[0]), t(".to").text("$" + s.values[1])
        }
    }), t(".from").text("$" + t(".price_slider").slider("values", 0)), t(".to").text("$" + t(".price_slider").slider("values", 1)), t(".tilt-active").tilt({
        maxTilt: 7,
        perspective: 1e3
    }), t.fn.indicator = function () {
        var e = t(this),
            s = e.find("a"),
            a = e.find("button");
        e.append('<span class="indicator"></span>');
        var i = e.find(".indicator");
        if (s.length) var o = s;
        else if (a.length) o = a;

        function n() {
            var s = e.find(".active"),
                a = s.css("height"),
                o = s.css("width"),
                n = s.position().top + "px",
                r = s.position().left + "px";
            t(window).on("resize", (function () {
                n = s.position().top + "px", r = s.position().left + "px"
            })), i.get(0).style.setProperty("--height-set", a), i.get(0).style.setProperty("--width-set", o), i.get(0).style.setProperty("--pos-y", n), i.get(0).style.setProperty("--pos-x", r)
        }
        o.on("click", (function (e) {
            e.preventDefault(), t(this).addClass("active"), t(this).siblings(".active").removeClass("active"), n()
        })), n()
    }, t(".indicator-active").length && t(".indicator-active").indicator(), f(), t(window).scroll(f), t("#ship-to-different-address-checkbox").on("change", (function () {
        t(this).is(":checked") ? t("#ship-to-different-address").next(".shipping_address").slideDown() : t("#ship-to-different-address").next(".shipping_address").slideUp()
    })), t(".woocommerce-form-login-toggle a").on("click", (function (e) {
        e.preventDefault(), t(".woocommerce-form-login").slideToggle()
    })), t(".woocommerce-form-coupon-toggle a").on("click", (function (e) {
        e.preventDefault(), t(".woocommerce-form-coupon").slideToggle()
    })), t(".shipping-calculator-button").on("click", (function (e) {
        e.preventDefault(), t(this).next(".shipping-calculator-form").slideToggle()
    })), t('.wc_payment_methods input[type="radio"]:checked').siblings(".payment_box").show(), t('.wc_payment_methods input[type="radio"]').each((function () {
        t(this).on("change", (function () {
            t(".payment_box").slideUp(), t(this).siblings(".payment_box").slideDown()
        }))
    })), t(".rating-select .stars a").each((function () {
        t(this).on("click", (function (e) {
            e.preventDefault(), t(this).siblings().removeClass("active"), t(this).parent().parent().addClass("selected"), t(this).addClass("active")
        }))
    }));
    const m = {};

    function g() {
        const e = t(this),
            s = e.attr("src");
        if (!m[s]) {
            const e = t.Deferred();
            t.get(s, s => {
                e.resolve(t(s).find("svg"))
            }), m[s] = e.promise()
        }
        m[s].then(s => {
            const a = t(s).clone();
            e.attr("id") && a.attr("id", e.attr("id")), e.attr("class") && a.attr("class", e.attr("class")), e.attr("style") && a.attr("style", e.attr("style")), e.attr("width") && (a.attr("width", e.attr("width")), e.attr("height") || a.removeAttr("height")), e.attr("height") && (a.attr("height", e.attr("height")), e.attr("width") || a.removeAttr("width")), a.insertAfter(e), e.trigger("svgInlined", a[0]), e.remove()
        })
    }

    function v(e) {
        var s = e.touches ? e.touches[0].clientX : e.clientX,
            a = e.touches ? e.touches[0].clientY : e.clientY,
            i = window.innerWidth / 2,
            o = window.innerHeight / 2,
            n = -(s - i) / (i / 1) - 1,
            r = -(a - o) / (o / 1) - 1;
        TweenMax.to(t(".banner-anime-img"), 1, {
            top: r + "%",
            left: n + "%"
        })
    }
    t.fn.inlineSvg = function () {
        return this.each(g), this
    }, t(".svg-img").inlineSvg(), t(".quantity-plus").each((function () {
        t(this).on("click", (function (e) {
            e.preventDefault();
            var s = t(this).siblings(".qty-input"),
                a = parseInt(s.val(), 10);
            isNaN(a) || s.val(a + 1)
        }))
    })), t(".quantity-minus").each((function () {
        t(this).on("click", (function (e) {
            e.preventDefault();
            var s = t(this).siblings(".qty-input"),
                a = parseInt(s.val(), 10);
            !isNaN(a) && a > 1 && s.val(a - 1)
        }))
    })), window.addEventListener("mousemove", v), window.addEventListener("touchstart", v), window.addEventListener("touchmove", v), t(document).on("mouseover", ".hover-item", (function () {
        t(this).addClass("item-active"), t(".hover-item").removeClass("item-active"), t(this).addClass("item-active")
    })), t(".single-select").length && t(".single-select").niceSelect(), t(".team-tab-wrap li:first-child").addClass("active"), t(".team-tab-content").hide(), t(".team-tab-content:first").show(), t(".team-tab-wrap li").mouseenter((function () {
        t(".team-tab-wrap li").removeClass("active"), t(".team-tab-content").hide();
        var e = t(this).find(".team-tab-item").attr("data-bs-target");
        return t(e).fadeIn(), !1
    })), t("#projectSlide2").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: !1,
        dots: !1,
        autoplay: !0,
        fade: !0,
        speed: 1e3,
        autoplaySpeed: 6e3,
        asNavFor: ".projectSlideThumb"
    }), t(".projectSlideThumb").slick({
        slidesToShow: 2,
        slidesToScroll: 1,
        arrows: !1,
        dots: !1,
        autoplay: !0,
        speed: 1e3,
        autoplaySpeed: 6e3,
        vertical: !0,
        focusOnSelect: !0,
        asNavFor: "#projectSlide2",
        responsive: [{
            breakpoint: 992,
            settings: {
                vertical: !1,
                slidesToShow: 2
            }
        }, {
            breakpoint: 767,
            settings: {
                vertical: !1,
                slidesToShow: 2
            }
        }, {
            breakpoint: 440,
            settings: {
                vertical: !1,
                slidesToShow: 2
            }
        }]
    })
}(jQuery);


