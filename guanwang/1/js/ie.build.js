!
function(a) {
    a.slide = function(b) {
        var c, d = a.extend({},
        a.slide.setting, b),
        e = a({}),
        f = a.noop,
        g = 0,
        h = "__slide" + a.guid + a.now(),
        i = ["before", "change", "after"],
        j = {
            before: [],
            change: [],
            after: []
        },
        k = {
            sp: !1,
            sip: !1
        },
        l = function() {
            k.sip = k.sp = !0
        },
        m = function() {
            k.sp = !0
        };
        return a.each(i,
        function(b, c) {
            var d = j[c];
            e.on(h,
            function(b) {
                var f = arguments;
                b.type = c;
                var g = b.stopImmediatePropagation;
                b.stopPropagation = m,
                b.stopImmediatePropagation = l,
                a.each(d,
                function(a, b) {
                    return b.apply(e, f),
                    k.sip === !0 ? (k.sip = !1, !1) : void 0
                }),
                k.sp === !0 && (g.call(b), k.sp = !1)
            })
        }),
        e.on = function(a, b) {
            var c = j[a];
            return c && c.push(b),
            this
        },
        e.off = function(b, c) {
            var d = j[b],
            e = [];
            return a.each(d,
            function(a, b) {
                c === b && e.push(a)
            }),
            a.each(e.reverse(),
            function(a, b) {
                d.splice(b, 1)
            }),
            this
        },
        e.go = function(a, b) {
            c && (clearTimeout(c), c = null),
            a = ~~a,
            b = "undefined" == typeof b ? d.index: ~~b;
            var f = a === b ? 0 : a > b ? 1 : -1,
            i = d.rotate,
            j = i ? d.length - 1 : Math.max(0, d.length - d.per),
            k = a;
            a = i ? a > j ? a - j - 1 : 0 > a ? a + j + 1 : a: a > j ? j: 0 > a ? 0 : a;
            var l = d.index = a;
            return e.trigger(h, {
                o: k,
                to: a,
                from: b,
                direction: f
            }),
            l !== j || i ? !g && d.auto && e.play() : c && clearTimeout(c),
            this
        },
        e.next = function() {
            var a = d.index,
            b = a + d.step;
            return e.go(b, a),
            this
        },
        e.prev = function() {
            var a = d.index,
            b = a - d.step;
            return e.go(b, a),
            this
        },
        e.pause = function() {
            return c && clearTimeout(c),
            g = 1,
            this
        },
        e.resume = function() {
            return g = 0,
            e.play(),
            this
        },
        e.play = function() {
            return c = setTimeout(function() {
                e.next()
            },
            1e3 * d.timeout),
            this
        },
        e.getConfig = function() {
            return d
        },
        a.each(i,
        function(a, b) {
            e.on(b, d["on" + b] || f)
        }),
        d.auto && e.play(),
        e.go(d.index),
        e
    },
    a.slide.setting = {
        index: 0,
        rotate: 0,
        timeout: 5,
        auto: 0,
        step: 1,
        per: 1
    },
    a.slide.version = "0.2.0"
} (jQuery);
var r = $({}),
queue = function(a, b, c, d, e) {
    "use strict";
    d = d || 0,
    e = e || [];
    var f = function(f, g, h) {
        return e[e.length] = f,
        g ? c.apply(null, h ? [f] : e) : void queue(a, b, c, ++d, e)
    };
    if (d < a.length) {
        var g = [a[d], d, e];
        b.length && (g = g.slice(0, b.length - 1)),
        g.push(f),
        b.apply(null, g)
    } else c && c.apply(null, e)
};
jQuery.extend(jQuery.easing, {
    easeOutQuart: function(a, b, c, d, e) {
        return - d * ((b = b / e - 1) * b * b * b - 1) + c
    }
}),
function() {
    var a = $(document),
    b = a.find("#version");
    a.on("mouseenter", ".version-mb",
    function() {
        b.toggleClass("pc-active mb-active")
    }),
    a.on("mouseleave", ".version-mb",
    function() {
        b.toggleClass("pc-active mb-active")
    })
} (),
function() {
    var a = $("#speed"),
    b = a.find(".slidebox li"),
    c = a.find(".slidenavi li"),
    d = $.slide({
        length: b.length,
        auto: 1,
        timeout: 1.5,
        rotate: 1
    });
    d.pause(),
    d.on("before",
    function(d, e) {
        a.find(":animated").stop(!0, !0),
        c.eq(e.from).removeClass("active"),
        c.eq(e.to).addClass("active"),
        b.eq(e.to).css("z-index", 1)
    }),
    d.on("change",
    function(a, c) {
        var d = c.to,
        e = c.from,
        f = 400;
        b.eq(e).animate({
            opacity: 0
        },
        f,
        function() {
            $(this).css("z-index", 0)
        }),
        b.eq(d).animate({
            opacity: 1
        },
        f)
    }),
    a.find(".slidenavi li").on("mouseenter",
    function(a) {
        var b = $(a.target).index();
        d.go(b)
    }),
    r.on("speed-start",
    function() {
        d.resume()
    }),
    r.on("speed-end",
    function() {
        d.pause()
    })
} (),
function() {
    var a, b = $(".body"),
    c = $(window),
    d = b.find(">.inner"),
    e = d.find(">.slide"),
    f = 0,
    g = $("#foot"),
    h = 500,
    i = $("#head").outerHeight(),
    j = $.slide({
        length: e.length
    });
    j.on("before",
    function(a, b) {
        b.to === b.from && a.stopPropagation(),
        $(":animated").stop(!0, !0)
    }),
    j.on("change",
    function(b, c) {
        if (c.to !== c.from) {
            var h = function(a) {
                return d.animate({
                    "margin-top": a.to * f * -1
                },
                800, "easeOutQuart")
            },
            i = function(a, b) {
                var c = a.to === e.length - 1;
                k.toggleClass(m, c).toggleClass(l, !c),
                $(".slide-bottom").toggleClass("slide-bottom-last", c),
                b()
            },
            j = function(a, b) {
                a.to === e.length - 1 && g.css({
                    height: "80px",
                    marginTop: "-80px",
                    display: "block",
                    opacity: 0
                }).animate({
                    opacity: 1,
                    height: "100px",
                    "margin-top": "-100px"
                },
                400).promise().done(b),
                a.from === e.length - 1 && g.animate({
                    opacity: 0,
                    height: 0,
                    "margin-top": 0
                },
                100).promise().done(b)
            };
            c.from === e.length - 1 ? (j(c, $.noop), i(c, $.noop), h(c)) : (h(c), a = setTimeout(function() {
                i(c, $.noop),
                j(c, $.noop)
            },
            200))
        }
    }),
    j.on("after",
    function(a, b) {
        var c = e[b.to].id,
        d = e[b.from].id;
        r.trigger(c + "-start"),
        r.trigger(d + "-end")
    });
    var k = $("#slide-main-navi"),
    l = "helper-next",
    m = "helper-prev slide-bottom-last",
    n = function(a) {
        f = Math.max(a.height - i, h);
        var c = j.getConfig();
        e.css("height", f),
        b.css("height", f),
        d.css({
            height: f * e.length,
            "margin-top": -1 * c.index * f
        });
        var k = navigator.userAgent;
        k.replace(/MSIE\s+([^; ]*)/i,
        function(a, b) {
            b = parseFloat(b),
            !isNaN(b) && 6 >= b && g.css("width", $(document).width())
        })
    };
    n({
        height: c.innerHeight()
    }),
    $(document).on("keydown",
    function(a) {
        var b = a.which;
        return 37 === b || 38 === b ? (j.prev(), !1) : 39 === b || 40 === b ? (j.next(), !1) : void 0
    }),
    $(document).on("click", "#slide-main-navi-btn",
    function(a) {
        var b = j.getConfig();
        j[b.index === b.length - 1 ? "prev": "next"](),
        a.preventDefault()
    });
    var o = function(a, b) {
        var c = 1,
        d = function() {
            setTimeout(function() {
                c = 1
            },
            b)
        };
        return function() {
            c && (a.apply(this, arguments), c = 0, d())
        }
    },
    p = function(a) {
        var b = 1,
        c = a.originalEvent,
        d = 0;
        try {
            c.wheelDelta ? d = c.wheelDelta / 120 : c.deltaY ? d = -1 * c.deltaY: b = 0
        } catch(a) {
            b = 0
        }
        b && (d > 0 ? j.prev() : j.next(), a.preventDefault())
    },
    q = o(function(a) {
        p(a)
    },
    800);
    $(document).on("wheel", q),
    $(document).on("mousewheel", q),
    c.resize(function() {
        n({
            height: c.innerHeight()
        })
    })
} ();
var PingbackApp = function(a, b) {
    function c(a) {
        var b = document.cookie.indexOf(";", a);
        return - 1 == b && (b = document.cookie.length),
        unescape(document.cookie.substring(a, b))
    }
    function d(a) {
        for (var b = a + "=",
        d = b.length,
        e = document.cookie.length,
        f = 0; e > f;) {
            var g = f + d;
            if (document.cookie.substring(f, g) == b) return c(g);
            if (f = document.cookie.indexOf(" ", f) + 1, 0 == f) break
        }
        return null
    }
    function e(a, b, c, d) {
        var d = d ? d: "ie.sogou.com",
        e = new Date;
        e.setTime(e.getTime() + c),
        document.cookie = a + "=" + b + ";path=/;expires=" + e.toGMTString() + ";domain=" + d + ";"
    }
    var f = function() {
        var c = "http://ping.ie.sogou.com/",
        f = (new Date).getTime(),
        g = escape(1e3 * f + Math.round(1e3 * Math.random()));
        this.getUid = function() {
            var a = "";
            return null != d("SMYUV") ? a = d("SMYUV") : (a = g, e("SMYUV", a, 2592e6, "sogou.com")),
            a
        },
        this.getYYID = function() {
            var a = "";
            return a = null != d("YYID") ? d("YYID") : ""
        },
        this.refurl = "" == document.referrer ? "": encodeURIComponent(document.referrer),
        this.pl = encodeURIComponent("http://ie.sogou.com/index.html");
        var h = this.getUid();
        this.getPv = function() {
            var d = (new Date).getTime(),
            e = d - a,
            f = b - a,
            i = document.createElement("img");
            i.src = c + "pv.GIF?t=" + g + "&u=" + h + "&r=" + this.refurl + "&pl=" + this.pl + "&load=" + f + "&onloadtime=" + e + "&oSiteVer=standard5.0"
        },
        this.getDlBtnClick = function(a, b) {
            var d = (new Date).getTime(),
            e = escape(1e3 * d + Math.round(1e3 * Math.random())),
            f = b.attr("id"),
            g = b.index(),
            i = document.createElement("img");
            i.src = c + "ct.GIF?t=" + e + "&u=" + h + "&pl=" + this.pl + "&id=" + f + "&type=" + a + "&oSiteVer=standard5.0&part=main&idx=" + g
        },
        this.getClick = function(a) {
            a = a ? a: window.event;
            var b = a.target ? a.target: a.srcElement;
            try {
                for (;
                "A" == b.tagName.toUpperCase() || "INPUT" == b.tagName.toUpperCase() || "IMG" == b.tagName.toUpperCase();) {
                    is_link = !1,
                    ("A" == b.tagName.toUpperCase() || "INPUT" == b.tagName.toUpperCase()) && (is_link = !0);
                    var d = b.innerHTML ? b.innerHTML: b.value;
                    d = escape(d);
                    var e = b.href ? b.href: b.value;
                    if (e = encodeURIComponent(e), clickFrom = window.location.href, "" == d || "" == address) break;
                    for (var f = (new Date).getTime(), g = escape(1e3 * f + Math.round(1e3 * Math.random())), i = b.parentNode; ! i.id;) i = i.parentNode;
                    mod = i.id;
                    var j = document.createElement("img");
                    is_link && (j.src = c + "ct.GIF?t=" + g + "&u=" + h + "&r=" + this.refurl + "&pl=" + this.pl + "&on=" + d + "&ol=" + e + "&mod=" + mod + "&clickfrom=" + clickFrom),
                    b = b.parentNode
                }
            } catch(k) {}
            return ! 0
        }
    };
    return f
} (t1, (new Date).getTime());
window.pingApp = new PingbackApp,
$(".slide").on("click", ".download a",
function(a) {
    pingApp.getDlBtnClick("dlbtnclick", $(a.delegateTarget))
});