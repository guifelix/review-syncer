var mr_firstSectionHeight, mr_nav, mr_navOuterHeight, mr_floatingProjectSections, mr_navScrolled = !1,
    mr_navFixed = !1,
    mr_outOfSight = !1,
    mr_scrollTop = 0;

function resizeVid() {
    $(".fs-vid-background video").each(function() {
        var e = $(this),
            t = e.width() / e.height(),
            a = e.closest("section");
        a.width() > a.outerHeight() ? (e.css("width", a.width() * t), e.css("margin-left", -a.width() * t / 4), e.css("height", "auto")) : (e.css("width", "auto"), e.css("height", a.outerHeight() * t), e.css("margin-left", 0))
    })
}

function updateNav() {
    var e = mr_scrollTop;
    if (e <= 0) return mr_navFixed && (mr_navFixed = !1, mr_nav.removeClass("fixed")), mr_outOfSight && (mr_outOfSight = !1, mr_nav.removeClass("outOfSight")), void(mr_navScrolled && (mr_navScrolled = !1, mr_nav.removeClass("scrolled")));
    if (mr_firstSectionHeight < e) {
        if (!mr_navScrolled) return mr_nav.addClass("scrolled"), void(mr_navScrolled = !0)
    } else mr_navOuterHeight < e ? (mr_navFixed || (mr_nav.addClass("fixed"), mr_navFixed = !0), 2 * mr_navOuterHeight < e ? mr_outOfSight || (mr_nav.addClass("outOfSight"), mr_outOfSight = !0) : mr_outOfSight && (mr_outOfSight = !1, mr_nav.removeClass("outOfSight"))) : (mr_navFixed && (mr_navFixed = !1, mr_nav.removeClass("fixed")), mr_outOfSight && (mr_outOfSight = !1, mr_nav.removeClass("outOfSight"))), mr_navScrolled && (mr_navScrolled = !1, mr_nav.removeClass("scrolled"))
}

function capitaliseFirstLetter(e) {
    return e.charAt(0).toUpperCase() + e.slice(1)
}

function masonryFlyIn() {
    var e = $(".masonryFlyIn .masonry-item"),
        t = 0;
    e.each(function() {
        var e = $(this);
        setTimeout(function() {
            e.addClass("fadeIn")
        }, t), t += 170
    })
}

function setupFloatingProjectFilters() {
    mr_floatingProjectSections = [], $(".filters.floating").closest("section").each(function() {
        var e = $(this);
        mr_floatingProjectSections.push({
            section: e.get(0),
            outerHeight: e.outerHeight(),
            elemTop: e.offset().top,
            elemBottom: e.offset().top + e.outerHeight(),
            filters: e.find(".filters.floating"),
            filersHeight: e.find(".filters.floating").outerHeight(!0)
        })
    })
}

function updateFloatingFilters() {
    for (var e = mr_floatingProjectSections.length; e--;) {
        var t = mr_floatingProjectSections[e];
        t.elemTop < mr_scrollTop && void 0 === window.mr_variant ? (t.filters.css({
            position: "fixed",
            top: "16px",
            bottom: "auto"
        }), mr_navScrolled && t.filters.css({
            transform: "translate3d(-50%,48px,0)"
        }), mr_scrollTop > t.elemBottom - 70 && (t.filters.css({
            position: "absolute",
            bottom: "16px",
            top: "auto"
        }), t.filters.css({
            transform: "translate3d(-50%,0,0)"
        }))) : t.filters.css({
            position: "absolute",
            transform: "translate3d(-50%,0,0)"
        })
    }
}
$(document).ready(function() {
    "use strict";
    var e, t = function(e) {
        var t, a, i = decodeURIComponent(window.location.search.substring(1)).split("&");
        for (a = 0; a < i.length; a++)
            if ((t = i[a].split("="))[0] === e) return void 0 === t[1] || t[1]
    };
    if (t("plan") && $("#select-plan").val(t("plan")), $("a.inner-link").each(function() {
            "#" !== $(this).attr("href").charAt(0) && $(this).removeClass("inner-link")
        }), $("a.inner-link").length && $("a.inner-link").smoothScroll({
            offset: -55,
            speed: 800
        }), addEventListener("scroll", function() {
            mr_scrollTop = window.pageYOffset
        }, !1), $(".background-image-holder").each(function() {
            var e = $(this).children("img").attr("src");
            $(this).css("background", 'url("' + e + '")'), $(this).children("img").hide(), $(this).css("background-position", "initial")
        }), setTimeout(function() {
            $(".background-image-holder").each(function() {
                $(this).addClass("fadeIn")
            })
        }, 200), $('[data-toggle="tooltip"]').tooltip(), $(".checkbox-option").click(function() {
            $(this).toggleClass("checked");
            var e = $(this).find("input");
            !1 === e.prop("checked") ? e.prop("checked", !0) : e.prop("checked", !1)
        }), $(".radio-option").click(function() {
            $(this).closest("form").find(".radio-option").removeClass("checked"), $(this).addClass("checked"), $(this).find("input").prop("checked", !0)
        }), $(".accordion li").click(function() {
            $(this).closest(".accordion").hasClass("one-open") ? ($(this).closest(".accordion").find("li").removeClass("active"), $(this).addClass("active")) : $(this).toggleClass("active")
        }), $(".tabbed-content").each(function() {
            $(this).append('<ul class="content"></ul>')
        }), $(".tabs li").each(function() {
            var e = $(this),
                t = "";
            e.is(".tabs>li:first-child") && (t = ' class="active"');
            var a = e.find(".tab-content").detach().wrap("<li" + t + "></li>").parent();
            e.closest(".tabbed-content").find(".content").append(a)
        }), $(".tabs li").click(function() {
            $(this).closest(".tabs").find("li").removeClass("active"), $(this).addClass("active");
            var e = $(this).index() + 1;
            $(this).closest(".tabbed-content").find(".content>li").removeClass("active"), $(this).closest(".tabbed-content").find(".content>li:nth-of-type(" + e + ")").addClass("active")
        }), $(".progress-bar").each(function() {
            $(this).css("width", $(this).attr("data-progress") + "%")
        }), $("nav").hasClass("fixed") || $("nav").hasClass("absolute") ? $("body").addClass("nav-is-overlay") : ($(".nav-container").css("min-height", $("nav").outerHeight(!0)), $(window).resize(function() {
            $(".nav-container").css("min-height", $("nav").outerHeight(!0))
        }), 768 < $(window).width() && $(".parallax:nth-of-type(1) .background-image-holder").css("top", -$("nav").outerHeight(!0)), 768 < $(window).width() && $("section.fullscreen:nth-of-type(1)").css("height", $(window).height() - $("nav").outerHeight(!0))), $("nav").hasClass("bg-dark") && $(".nav-container").addClass("bg-dark"), mr_nav = $("body .nav-container nav:first"), mr_navOuterHeight = $("body .nav-container nav:first").outerHeight(), window.addEventListener("scroll", updateNav, !1), $(".menu > li > ul").each(function() {
            var e = $(this).offset(),
                t = e.left + $(this).outerWidth(!0);
            if (t > $(window).width() && !$(this).hasClass("mega-menu")) $(this).addClass("make-right");
            else if (t > $(window).width() && $(this).hasClass("mega-menu")) {
                var a = $(window).width() - e.left,
                    i = $(this).outerWidth(!0) - a;
                $(this).css("margin-left", -i)
            }
        }), $(".mobile-toggle").click(function() {
            $(this).parent(".nav-bar").toggleClass("nav-open"), $(this).toggleClass("active")
        }), $(".menu li").click(function(e) {
            e || (e = window.event), e.stopPropagation(), $(this).find("ul").length ? $(this).toggleClass("toggle-sub") : $(this).parents(".toggle-sub").removeClass("toggle-sub")
        }), $(".module.widget-handle").click(function() {
            $(this).toggleClass("toggle-widget-handle")
        }), $(".offscreen-toggle").length ? $("body").addClass("has-offscreen-nav") : $("body").removeClass("has-offscreen-nav"), $(".offscreen-toggle").click(function() {
            $(".main-container").toggleClass("reveal-nav"), $("nav").toggleClass("reveal-nav"), $(".offscreen-container").toggleClass("reveal-nav")
        }), $(".main-container").click(function() {
            $(this).hasClass("reveal-nav") && ($(this).removeClass("reveal-nav"), $(".offscreen-container").removeClass("reveal-nav"), $("nav").removeClass("reveal-nav"))
        }), $(".offscreen-container a").click(function() {
            $(".offscreen-container").removeClass("reveal-nav"), $(".main-container").removeClass("reveal-nav"), $("nav").removeClass("reveal-nav")
        }), $(".projects").each(function() {
            var t = "";
            $(this).find(".project").each(function() {
                $(this).attr("data-filter").split(",").forEach(function(e) {
                    -1 == t.indexOf(e) && (t += '<li data-filter="' + e + '">' + capitaliseFirstLetter(e) + "</li>")
                }), $(this).closest(".projects").find("ul.filters").empty().append('<li data-filter="all" class="active">All</li>').append(t)
            })
        }), $(".filters li").click(function() {
            var e = $(this).attr("data-filter");
            $(this).closest(".filters").find("li").removeClass("active"), $(this).addClass("active"), $(this).closest(".projects").find(".project").each(function() {
                -1 == $(this).data("filter").indexOf(e) ? $(this).addClass("inactive") : $(this).removeClass("inactive")
            }), "all" == e && $(this).closest(".projects").find(".project").removeClass("inactive")
        }), $(".tweets-feed").each(function(e) {
            $(this).attr("id", "tweets-" + e)
        }).each(function(s) {
            twitterFetcher.fetch($("#tweets-" + s).attr("data-widget-id"), "", 5, !0, !0, !0, "", !1, function(e) {
                for (var t = e.length, a = 0, i = document.getElementById("tweets-" + s), o = '<ul class="slides">'; a < t;) o += "<li>" + e[a] + "</li>", a++;
                return o += "</ul>", i.innerHTML = o
            })
        }), $(".instafeed").length && (jQuery.fn.spectragram.accessData = {
            accessToken: "1406933036.fedaafa.feec3d50f5194ce5b705a1f11a107e0b",
            clientID: "fedaafacf224447e8aef74872d3820a1"
        }), $(".instafeed").each(function() {
            var e = $(this).attr("data-user-name") + "-";
            $(this).children("ul").spectragram("getUserFeed", {
                query: e,
                max: 12
            })
        }), $(".slider-all-controls").flexslider({}), $(".slider-paging-controls").flexslider({
            animation: "slide",
            directionNav: !1
        }), $(".slider-arrow-controls").flexslider({
            controlNav: !1
        }), $(".slider-thumb-controls .slides li").each(function() {
            var e = $(this).find("img").attr("src");
            $(this).attr("data-thumb", e)
        }), $(".slider-thumb-controls").flexslider({
            animation: "slide",
            controlNav: "thumbnails",
            directionNav: !0
        }), $(".logo-carousel").flexslider({
            minItems: 1,
            maxItems: 4,
            move: 1,
            itemWidth: 200,
            itemMargin: 0,
            animation: "slide",
            slideshow: !0,
            slideshowSpeed: 3e3,
            directionNav: !1,
            controlNav: !1
        }), $(".lightbox-grid li a").each(function() {
            var e = $(this).closest(".lightbox-grid").attr("data-gallery-title");
            $(this).attr("data-lightbox", e)
        }), $(".foundry_modal").length) $('<div class="modal-screen">').appendTo("body");

    function d(e) {
        var t, a;
        return $(e).find('.validate-required[type="checkbox"]').each(function() {
            $('[name="' + $(this).attr("name") + '"]:checked').length || (a = 1, t = $(this).attr("name").replace("[]", ""), e.find(".form-error").text("Please tick at least one " + t + " box."))
        }), $(e).find(".validate-required").each(function() {
            "" === $(this).val() ? ($(this).addClass("field-error"), a = 1) : $(this).removeClass("field-error")
        }), $(e).find(".validate-email").each(function() {
            /(.+)@(.+){2,}\.(.+){2,}/.test($(this).val()) ? $(this).removeClass("field-error") : ($(this).addClass("field-error"), a = 1)
        }), e.find(".field-error").length || e.find(".form-error").fadeOut(1e3), a
    }

    function a(e) {
        return decodeURIComponent((new RegExp("[?|&]" + e + "=([^&;]+?)(&|#|;|$)").exec(location.search) || [, ""])[1].replace(/\+/g, "%20")) || null
    }
    if ($(".modal-container").each(function(e) {
            if ($(this).find("iframe[src]").length) {
                $(this).find(".foundry_modal").addClass("iframe-modal");
                var t = $(this).find("iframe"),
                    a = t.attr("src");
                t.attr("src", ""), t.data("data-src"), t.attr("data-src", a)
            }
            $(this).find(".btn-modal").attr("modal-link", e), $(this).find(".foundry_modal").clone().appendTo("body").attr("modal-link", e).prepend($('<i class="ti-close close-modal">'))
        }), $(".btn-modal").click(function() {
            var e = $("section").closest("body").find('.foundry_modal[modal-link="' + $(this).attr("modal-link") + '"]');
            return $(".modal-screen").toggleClass("reveal-modal"), e.find("iframe").length && e.find("iframe").attr("src", e.find("iframe").attr("data-src")), e.toggleClass("reveal-modal"), !1
        }), $(".foundry_modal[data-time-delay]").each(function() {
            var e = $(this),
                t = e.attr("data-time-delay");
            e.prepend($('<i class="ti-close close-modal">')), void 0 !== e.attr("data-cookie") && mr_cookies.hasItem(e.attr("data-cookie")) || setTimeout(function() {
                e.addClass("reveal-modal"), $(".modal-screen").addClass("reveal-modal")
            }, t)
        }), $(".close-modal:not(.modal-strip .close-modal)").click(function() {
            var e = $(this).closest(".foundry_modal");
            e.toggleClass("reveal-modal"), void 0 !== e.attr("data-cookie") && mr_cookies.setItem(e.attr("data-cookie"), "true", 1 / 0), $(".modal-screen").toggleClass("reveal-modal")
        }), $(".modal-screen").click(function() {
            $(".foundry_modal.reveal-modal").toggleClass("reveal-modal"), $(this).toggleClass("reveal-modal")
        }), $(document).keyup(function(e) {
            27 == e.keyCode && ($(".foundry_modal").removeClass("reveal-modal"), $(".modal-screen").removeClass("reveal-modal"))
        }), $(".modal-strip").each(function() {
            $(this).find(".close-modal").length || $(this).append($('<i class="ti-close close-modal">'));
            var e = $(this);
            void 0 !== e.attr("data-cookie") && mr_cookies.hasItem(e.attr("data-cookie")) || setTimeout(function() {
                e.addClass("reveal-modal")
            }, 1e3)
        }), $(".modal-strip .close-modal").click(function() {
            var e = $(this).closest(".modal-strip");
            return void 0 !== e.attr("data-cookie") && mr_cookies.setItem(e.attr("data-cookie"), "true", 1 / 0), $(this).closest(".modal-strip").removeClass("reveal-modal"), !1
        }), $("section").closest("body").find(".modal-video[video-link]").remove(), $(".modal-video-container").each(function(e) {
            $(this).find(".play-button").attr("video-link", e), $(this).find(".modal-video").clone().appendTo("body").attr("video-link", e)
        }), $(".modal-video-container .play-button").click(function() {
            var e = $("section").closest("body").find('.modal-video[video-link="' + $(this).attr("video-link") + '"]');
            if (e.toggleClass("reveal-modal"), e.find("video").length && e.find("video").get(0).play(), e.find("iframe").length) {
                var t, a = e.find("iframe"),
                    i = a.attr("data-src");
                t = -1 < i.indexOf("vimeo") ? "&autoplay=1" : "?autoplay-1", i = a.attr("data-src") + t, a.attr("src", i)
            }
        }), $("section").closest("body").find(".close-iframe").click(function() {
            $(this).closest(".modal-video").toggleClass("reveal-modal"), $(this).siblings("iframe").attr("src", ""), $(this).siblings("video").get(0).pause()
        }), $("section").closest("body").find(".local-video-container .play-button").click(function() {
            $(this).siblings(".background-image-holder").removeClass("fadeIn"), $(this).siblings(".background-image-holder").css("z-index", -1), $(this).css("opacity", 0), $(this).siblings("video").get(0).play()
        }), $("section").closest("body").find(".player").each(function() {
            var e = $(this).attr("data-video-id"),
                t = $(this).attr("data-start-at");
            $(this).attr("data-property", "{videoURL:'http://youtu.be/" + e + "',containment:'self',autoPlay:true, mute:true, startAt:" + t + ", opacity:1, showControls:false}")
        }), $(".player").length && $("section").closest("body").find(".player").YTPlayer(), $(window).resize(function() {
            resizeVid()
        }), $(".map-holder").click(function() {
            $(this).addClass("interact")
        }), $(".map-holder").length && $(window).scroll(function() {
            $(".map-holder.interact").length && $(".map-holder.interact").removeClass("interact")
        }), $(".countdown").length && $(".countdown").each(function() {
            var e = $(this).attr("data-date");
            $(this).countdown(e, function(e) {
                $(this).text(e.strftime("%D days %H:%M:%S"))
            })
        }), $("form.form-email, form.form-newsletter").submit(function(e) {
            e.preventDefault ? e.preventDefault() : e.returnValue = !1;
            var t, a, i, o, s, n, r = $(this).closest("form.form-email, form.form-newsletter"),
                l = r.attr("original-error");
            return t = $(r).find("iframe.mail-list-form"), r.find(".form-error, .form-success").remove(), r.append('<div class="form-error" style="display: none;">' + r.attr("data-error") + "</div>"), r.append('<div class="form-success" style="display: none;">' + r.attr("data-success") + "</div>"), t.length && void 0 !== t.attr("srcdoc") && "" !== t.attr("srcdoc") ? (a = $(r).find(".signup-email-field").val(), i = $(r).find(".signup-name-field").val(), o = $(r).find("input.signup-first-name-field").length ? $(r).find("input.signup-first-name-field").val() : $(r).find(".signup-name-field").val(), s = $(r).find(".signup-last-name-field").val(), 1 !== d(r) ? (t.contents().find("#mce-EMAIL, #fieldEmail").val(a), t.contents().find("#mce-LNAME, #fieldLastName").val(s), t.contents().find("#mce-FNAME, #fieldFirstName").val(o), t.contents().find("#mce-NAME, #fieldName").val(i), t.contents().find("form").attr("target", "_blank").submit(), void 0 !== (n = r.attr("success-redirect")) && !1 !== n && "" !== n && (window.location = n)) : (r.find(".form-error").fadeIn(1e3), setTimeout(function() {
                r.find(".form-error").fadeOut(500)
            }, 5e3))) : (void 0 !== l && !1 !== l && r.find(".form-error").text(l), 1 === d(r) ? ($(this).closest("form").find(".form-error").fadeIn(200), setTimeout(function() {
                $(r).find(".form-error").fadeOut(500)
            }, 3e3)) : ($(this).closest("form").find(".form-error").fadeOut(200), jQuery("<div />").addClass("form-loading").insertAfter($(r).find('input[type="submit"]')), $(r).find('input[type="submit"]').hide(), jQuery.ajax({
                type: "POST",
                url: "mail/mail.php",
                data: r.serialize(),
                success: function(e) {
                    $(r).find(".form-loading").remove(), $(r).find('input[type="submit"]').show(), $.isNumeric(e) ? 0 < parseInt(e) && (void 0 !== (n = r.attr("success-redirect")) && !1 !== n && "" !== n && (window.location = n), r.find('input[type="text"]').val(""), r.find("textarea").val(""), r.find(".form-success").fadeIn(1e3), r.find(".form-error").fadeOut(1e3), setTimeout(function() {
                        r.find(".form-success").fadeOut(500)
                    }, 5e3)) : (r.find(".form-error").attr("original-error", r.find(".form-error").text()), r.find(".form-error").text(e).fadeIn(1e3), r.find(".form-success").fadeOut(1e3))
                },
                error: function(e, t, a) {
                    r.find(".form-error").attr("original-error", r.find(".form-error").text()), r.find(".form-error").text(a).fadeIn(1e3), r.find(".form-success").fadeOut(1e3), $(r).find(".form-loading").remove(), $(r).find('input[type="submit"]').show()
                }
            }))), !1
        }), $(".validate-required, .validate-email").on("blur change", function() {
            d($(this).closest("form"))
        }), $("form").each(function() {
            $(this).find(".form-error").length && $(this).attr("original-error", $(this).find(".form-error").text())
        }), a("ref") && $("form.form-email").append('<input type="text" name="referrer" class="hidden" value="' + a("ref") + '"/>'), /Android|iPhone|iPad|iPod|BlackBerry|Windows Phone/i.test(navigator.userAgent || navigator.vendor || window.opera) && $("section").removeClass("parallax"), $(".disqus-comments").length) {
        var i = $(".disqus-comments").attr("data-shortname");
        (e = document.createElement("script")).type = "text/javascript", e.async = !0, e.src = "//" + i + ".disqus.com/embed.js", (document.getElementsByTagName("head")[0] || document.getElementsByTagName("body")[0]).appendChild(e)
    }
    if (document.querySelector("[data-maps-api-key]") && !document.querySelector(".gMapsAPI") && $("[data-maps-api-key]").length) {
        var o = document.createElement("script"),
            s = $("[data-maps-api-key]:first").attr("data-maps-api-key");
        o.type = "text/javascript", o.src = "https://maps.googleapis.com/maps/api/js?key=" + s + "&callback=initializeMaps", o.className = "gMapsAPI", document.body.appendChild(o)
    }
}), $(window).load(function() {
    "use strict";
    if ($(".masonry").length) {
        var e = document.querySelector(".masonry"),
            t = new Masonry(e, {
                itemSelector: ".masonry-item"
            });
        t.on("layoutComplete", function() {
            mr_firstSectionHeight = $(".main-container section:nth-of-type(1)").outerHeight(!0), $(".filters.floating").length && (setupFloatingProjectFilters(), updateFloatingFilters(), window.addEventListener("scroll", updateFloatingFilters, !1)), $(".masonry").addClass("fadeIn"), $(".masonry-loader").addClass("fadeOut"), $(".masonryFlyIn").length && masonryFlyIn()
        }), t.layout()
    }
    resizeVid();
    var a = setInterval(function() {
        $(".tweets-slider").find("li.flex-active-slide").length ? clearInterval(a) : $(".tweets-slider").length && $(".tweets-slider").flexslider({
            directionNav: !1,
            controlNav: !1
        })
    }, 500);
    mr_firstSectionHeight = $(".main-container section:nth-of-type(1)").outerHeight(!0)
}), window.initializeMaps = function() {
    "undefined" != typeof google && void 0 !== google.maps && $(".map-canvas[data-maps-api-key]").each(function() {
        var e, i, o = this,
            t = void 0 !== $(this).attr("data-map-style") && $(this).attr("data-map-style"),
            a = JSON.parse(t) || [{
                featureType: "landscape",
                stylers: [{
                    saturation: -100
                }, {
                    lightness: 65
                }, {
                    visibility: "on"
                }]
            }, {
                featureType: "poi",
                stylers: [{
                    saturation: -100
                }, {
                    lightness: 51
                }, {
                    visibility: "simplified"
                }]
            }, {
                featureType: "road.highway",
                stylers: [{
                    saturation: -100
                }, {
                    visibility: "simplified"
                }]
            }, {
                featureType: "road.arterial",
                stylers: [{
                    saturation: -100
                }, {
                    lightness: 30
                }, {
                    visibility: "on"
                }]
            }, {
                featureType: "road.local",
                stylers: [{
                    saturation: -100
                }, {
                    lightness: 40
                }, {
                    visibility: "on"
                }]
            }, {
                featureType: "transit",
                stylers: [{
                    saturation: -100
                }, {
                    visibility: "simplified"
                }]
            }, {
                featureType: "administrative.province",
                stylers: [{
                    visibility: "off"
                }]
            }, {
                featureType: "water",
                elementType: "labels",
                stylers: [{
                    visibility: "on"
                }, {
                    lightness: -25
                }, {
                    saturation: -100
                }]
            }, {
                featureType: "water",
                elementType: "geometry",
                stylers: [{
                    hue: "#ffff00"
                }, {
                    lightness: -25
                }, {
                    saturation: -97
                }]
            }],
            s = void 0 !== $(this).attr("data-map-zoom") && "" !== $(this).attr("data-map-zoom") ? 1 * $(this).attr("data-map-zoom") : 17,
            n = void 0 !== $(this).attr("data-latlong") && $(this).attr("data-latlong"),
            r = !!n && 1 * n.substr(0, n.indexOf(",")),
            l = !!n && 1 * n.substr(n.indexOf(",") + 1),
            d = new google.maps.Geocoder,
            c = void 0 !== $(this).attr("data-address") && $(this).attr("data-address").split(";"),
            f = "We Are Here",
            m = {
                draggable: 766 < $(document).width(),
                scrollwheel: !1,
                zoom: s,
                disableDefaultUI: !0,
                styles: a
            };
        null != $(this).attr("data-marker-title") && "" != $(this).attr("data-marker-title") && (f = $(this).attr("data-marker-title")), null != c && "" != c[0] ? d.geocode({
            address: c[0].replace("[nomarker]", "")
        }, function(e, t) {
            if (t == google.maps.GeocoderStatus.OK) {
                var a = new google.maps.Map(o, m);
                a.setCenter(e[0].geometry.location), c.forEach(function(e) {
                    var t = new google.maps.Geocoder;
                    e.indexOf("[nomarker]") < 0 && t.geocode({
                        address: e.replace("[nomarker]", "")
                    }, function(e, t) {
                        t == google.maps.GeocoderStatus.OK && (i = {
                            url: null == window.mr_variant ? "img/mapmarker.png" : "../img/mapmarker.png",
                            size: new google.maps.Size(50, 50),
                            scaledSize: new google.maps.Size(50, 50)
                        }, new google.maps.Marker({
                            map: a,
                            icon: i,
                            title: f,
                            position: e[0].geometry.location,
                            optimised: !1
                        }))
                    })
                })
            }
        }) : null != r && "" != r && 0 != r && null != l && "" != l && 0 != l && (m.center = {
            lat: r,
            lng: l
        }, e = new google.maps.Map(o, m), new google.maps.Marker({
            position: {
                lat: r,
                lng: l
            },
            map: e,
            icon: i,
            title: f
        }))
    })
}, initializeMaps();
var mr_cookies = {
    getItem: function(e) {
        return e && decodeURIComponent(document.cookie.replace(new RegExp("(?:(?:^|.*;)\\s*" + encodeURIComponent(e).replace(/[\-\.\+\*]/g, "\\$&") + "\\s*\\=\\s*([^;]*).*$)|^.*$"), "$1")) || null
    },
    setItem: function(e, t, a, i, o, s) {
        if (!e || /^(?:expires|max\-age|path|domain|secure)$/i.test(e)) return !1;
        var n = "";
        if (a) switch (a.constructor) {
            case Number:
                n = a === 1 / 0 ? "; expires=Fri, 31 Dec 9999 23:59:59 GMT" : "; max-age=" + a;
                break;
            case String:
                n = "; expires=" + a;
                break;
            case Date:
                n = "; expires=" + a.toUTCString()
        }
        return document.cookie = encodeURIComponent(e) + "=" + encodeURIComponent(t) + n + (o ? "; domain=" + o : "") + (i ? "; path=" + i : "") + (s ? "; secure" : ""), !0
    },
    removeItem: function(e, t, a) {
        return !!this.hasItem(e) && (document.cookie = encodeURIComponent(e) + "=; expires=Thu, 01 Jan 1970 00:00:00 GMT" + (a ? "; domain=" + a : "") + (t ? "; path=" + t : ""), !0)
    },
    hasItem: function(e) {
        return !!e && new RegExp("(?:^|;\\s*)" + encodeURIComponent(e).replace(/[\-\.\+\*]/g, "\\$&") + "\\s*\\=").test(document.cookie)
    },
    keys: function() {
        for (var e = document.cookie.replace(/((?:^|\s*;)[^\=]+)(?=;|$)|^\s*|\s*(?:\=[^;]*)?(?:\1|$)/g, "").split(/\s*(?:\=[^;]*)?;\s*/), t = e.length, a = 0; a < t; a++) e[a] = decodeURIComponent(e[a]);
        return e
    }
};