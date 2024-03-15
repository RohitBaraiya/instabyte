<?php session_start(); session_gc();?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="apple-touch-icon" sizes="180x180" href="./img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./img/favicon/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&display=swap" rel="stylesheet">
</head>

<body>

    <!-- <canvas width="600" height="600"></canvas> -->

    <style>
        html {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column
        }

        body {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: row;
            margin: 0
        }

        canvas {
            width: 100%;
            height: 100%;
            /* display: block; */
            box-shadow: 0 2px 12px -2px rgba(0, 0, 0, .15)
        }
    </style>
    <script>
        ! function () {
            return function t(e, n, r) {
                function i(s, a) {
                    if (!n[s]) {
                        if (!e[s]) {
                            var u = "function" == typeof require && require;
                            if (!a && u) return u(s, !0);
                            if (o) return o(s, !0);
                            var c = new Error("Cannot find module '" + s + "'");
                            throw c.code = "MODULE_NOT_FOUND", c
                        }
                        var p = n[s] = {
                            exports: {}
                        };
                        e[s][0].call(p.exports, function (t) {
                            return i(e[s][1][t] || t)
                        }, p, p.exports, t, e, n, r)
                    }
                    return n[s].exports
                }
                for (var o = "function" == typeof require && require, s = 0; s < r.length; s++) i(r[s]);
                return i
            }
        }()({
            1: [function (t, e, n) {
                e.exports = function (t, e, n) {
                    if ("number" != typeof e || "number" != typeof n) throw new TypeError(
                        'Must specify "to" and "from" arguments as numbers');
                    if (e > n) {
                        var r = e;
                        e = n, n = r
                    }
                    var i = n - e;
                    if (0 === i) return n;
                    return t - i * Math.floor((t - e) / i)
                }
            }, {}],
            2: [function (t, e, n) {
                var r = t("defined"),
                    i = t("./lib/wrap"),
                    o = Number.EPSILON;

                function s(t, e, n) {
                    return e < n ? t < e ? e : t > n ? n : t : t < n ? n : t > e ? e : t
                }

                function a(t, e, n) {
                    return t * (1 - n) + e * n
                }

                function u(t, e, n) {
                    return Math.abs(t - e) < o ? 0 : (n - t) / (e - t)
                }

                function c(t, e) {
                    return e = r(e, 0), "number" == typeof t && isFinite(t) ? t : e
                }

                function p(t) {
                    if ("number" != typeof t) throw new TypeError("Expected dims argument");
                    return function (e, n) {
                        var i;
                        n = r(n, 0), null == e ? i = n : "number" == typeof e && isFinite(e) && (i =
                            e);
                        var o, s = [];
                        if (null == i)
                            for (o = 0; o < t; o++) s[o] = c(e[o], n);
                        else
                            for (o = 0; o < t; o++) s[o] = i;
                        return s
                    }
                }

                function f(t, e, n, r) {
                    if (r = r || [], t.length !== e.length) throw new TypeError(
                        "min and max array are expected to have the same length");
                    for (var i = 0; i < t.length; i++) r[i] = a(t[i], e[i], n);
                    return r
                }

                function h(t, e) {
                    if ("number" != typeof (t = r(t, 0))) throw new TypeError(
                        "Expected n argument to be a number");
                    for (var n = [], i = 0; i < t; i++) n.push(e);
                    return n
                }

                function l(t, e) {
                    return (t % e + e) % e
                }

                function d(t, e, n, r) {
                    return a(t, e, 1 - Math.exp(-n * r))
                }
                e.exports = {
                    mod: l,
                    fract: function (t) {
                        return t - Math.floor(t)
                    },
                    sign: function (t) {
                        return t > 0 ? 1 : t < 0 ? -1 : 0
                    },
                    degToRad: function (t) {
                        return t * Math.PI / 180
                    },
                    radToDeg: function (t) {
                        return 180 * t / Math.PI
                    },
                    wrap: i,
                    pingPong: function (t, e) {
                        return t = l(t, 2 * e), e - Math.abs(t - e)
                    },
                    linspace: function (t, e) {
                        if ("number" != typeof (t = r(t, 0))) throw new TypeError(
                            "Expected n argument to be a number");
                        "boolean" == typeof (e = e || {}) && (e = {
                            endpoint: !0
                        });
                        var n = r(e.offset, 0);
                        return e.endpoint ? h(t).map(function (e, r) {
                            return t <= 1 ? 0 : (r + n) / (t - 1)
                        }) : h(t).map(function (e, r) {
                            return (r + n) / t
                        })
                    },
                    lerp: a,
                    lerpArray: f,
                    inverseLerp: u,
                    lerpFrames: function (t, e, n) {
                        e = s(e, 0, 1);
                        var r = t.length - 1,
                            i = e * r,
                            o = Math.floor(i),
                            u = i - o,
                            c = Math.min(o + 1, r),
                            p = t[o % t.length],
                            h = t[c % t.length];
                        if ("number" == typeof p && "number" == typeof h) return a(p, h, u);
                        if (Array.isArray(p) && Array.isArray(h)) return f(p, h, u, n);
                        throw new TypeError("Mismatch in value type of two array elements: " +
                            o +
                            " and " + c)
                    },
                    clamp: s,
                    clamp01: function (t) {
                        return s(t, 0, 1)
                    },
                    smoothstep: function (t, e, n) {
                        var r = s(u(t, e, n), 0, 1);
                        return r * r * (3 - 2 * r)
                    },
                    damp: d,
                    dampArray: function (t, e, n, r, i) {
                        i = i || [];
                        for (var o = 0; o < t.length; o++) i[o] = d(t[o], e[o], n, r);
                        return i
                    },
                    mapRange: function (t, e, n, r, i, s) {
                        if (Math.abs(e - n) < o) return r;
                        var a = (t - e) / (n - e) * (i - r) + r;
                        return s && (i < r ? a < i ? a = i : a > r && (a = r) : a > i ? a = i :
                            a <
                            r && (a = r)), a
                    },
                    expand2D: p(2),
                    expand3D: p(3),
                    expand4D: p(4)
                }
            }, {
                "./lib/wrap": 1,
                defined: 5
            }],
            3: [function (t, e, n) {
                var r = t("seed-random"),
                    i = t("simplex-noise"),
                    o = t("defined");
                e.exports = function t(e) {
                    e = o(e, null);
                    var n, s, a, u = Math.random,
                        c = null,
                        p = !1;
                    return f(e), {
                        value: h,
                        createRandom: function (e) {
                            return t(e)
                        },
                        setSeed: f,
                        getSeed: function () {
                            return n
                        },
                        getRandomSeed: function () {
                            return String(Math.floor(1e6 * Math.random()))
                        },
                        valueNonZero: function () {
                            for (var t = 0; 0 === t;) t = h();
                            return t
                        },
                        permuteNoise: function () {
                            a = l()
                        },
                        noise1D: function (t, e, n) {
                            if (!isFinite(t)) throw new TypeError(
                                "x component for noise() must be finite");
                            return e = o(e, 1), (n = o(n, 1)) * a.noise2D(t * e, 0)
                        },
                        noise2D: function (t, e, n, r) {
                            if (!isFinite(t)) throw new TypeError(
                                "x component for noise() must be finite");
                            if (!isFinite(e)) throw new TypeError(
                                "y component for noise() must be finite");
                            return n = o(n, 1), (r = o(r, 1)) * a.noise2D(t * n, e * n)
                        },
                        noise3D: function (t, e, n, r, i) {
                            if (!isFinite(t)) throw new TypeError(
                                "x component for noise() must be finite");
                            if (!isFinite(e)) throw new TypeError(
                                "y component for noise() must be finite");
                            if (!isFinite(n)) throw new TypeError(
                                "z component for noise() must be finite");
                            return r = o(r, 1), (i = o(i, 1)) * a.noise3D(t * r, e * r, n *
                                r)
                        },
                        noise4D: function (t, e, n, r, i, s) {
                            if (!isFinite(t)) throw new TypeError(
                                "x component for noise() must be finite");
                            if (!isFinite(e)) throw new TypeError(
                                "y component for noise() must be finite");
                            if (!isFinite(n)) throw new TypeError(
                                "z component for noise() must be finite");
                            if (!isFinite(r)) throw new TypeError(
                                "w component for noise() must be finite");
                            return i = o(i, 1), (s = o(s, 1)) * a.noise4D(t * i, e * i, n *
                                i,
                                r * i)
                        },
                        sign: function () {
                            return d() ? 1 : -1
                        },
                        boolean: d,
                        chance: function (t) {
                            if ("number" != typeof (t = o(t, .5))) throw new TypeError(
                                "expected n to be a number");
                            return h() < t
                        },
                        range: m,
                        rangeFloor: y,
                        pick: function (t) {
                            return 0 === t.length ? void 0 : t[y(0, t.length)]
                        },
                        shuffle: function (t) {
                            if (!Array.isArray(t)) throw new TypeError(
                                "Expected Array, got " +
                                typeof t);
                            for (var e, n, r = t.length, i = t.slice(); r;) e = Math.floor(
                                h() *
                                r--), n = i[r], i[r] = i[e], i[e] = n;
                            return i
                        },
                        onCircle: g,
                        insideCircle: function (t, e) {
                            t = o(t, 1), g(1, e = e || []);
                            var n = t * Math.sqrt(h());
                            return e[0] *= n, e[1] *= n, e
                        },
                        onSphere: function (t, e) {
                            t = o(t, 1), e = e || [];
                            var n = h() * Math.PI * 2,
                                r = 2 * h() - 1,
                                i = n,
                                s = Math.acos(r);
                            return e[0] = t * Math.sin(s) * Math.cos(i), e[1] = t * Math
                                .sin(
                                    s) * Math.sin(i), e[2] = t * Math.cos(s), e
                        },
                        insideSphere: function (t, e) {
                            t = o(t, 1), e = e || [];
                            var n = h() * Math.PI * 2,
                                r = 2 * h() - 1,
                                i = h(),
                                s = n,
                                a = Math.acos(r),
                                u = t * Math.cbrt(i);
                            return e[0] = u * Math.sin(a) * Math.cos(s), e[1] = u * Math
                                .sin(
                                    a) * Math.sin(s), e[2] = u * Math.cos(a), e
                        },
                        quaternion: function (t) {
                            t = t || [];
                            var e = h(),
                                n = h(),
                                r = h(),
                                i = Math.sqrt(1 - e),
                                o = Math.sqrt(e),
                                s = 2 * Math.PI * n,
                                a = 2 * Math.PI * r,
                                u = Math.sin(s) * i,
                                c = Math.cos(s) * i,
                                p = Math.sin(a) * o,
                                f = Math.cos(a) * o;
                            return t[0] = u, t[1] = c, t[2] = p, t[3] = f, t
                        },
                        weighted: w,
                        weightedSet: function (t) {
                            return 0 === (t = t || []).length ? null : t[v(t)].value
                        },
                        weightedSetIndex: v,
                        gaussian: function (t, e) {
                            if (t = o(t, 0), e = o(e, 1), p) {
                                p = !1;
                                var n = c;
                                return c = null, t + e * n
                            }
                            var r = 0,
                                i = 0,
                                s = 0;
                            do {
                                r = 2 * h() - 1, i = 2 * h() - 1, s = r * r + i * i
                            } while (s >= 1 || 0 === s);
                            var a = Math.sqrt(-2 * Math.log(s) / s);
                            return c = i * a, p = !0, t + e * (r * a)
                        }
                    };

                    function f(t, e) {
                        "number" == typeof t || "string" == typeof t ? s = r(n = t, e) : (n =
                            void 0,
                            s = u), a = l(), c = null, p = !1
                    }

                    function h() {
                        return s()
                    }

                    function l() {
                        return new i(s)
                    }

                    function d() {
                        return h() > .5
                    }

                    function m(t, e) {
                        if (void 0 === e && (e = t, t = 0), "number" != typeof t || "number" !=
                            typeof e) throw new TypeError("Expected all arguments to be numbers");
                        return h() * (e - t) + t
                    }

                    function y(t, e) {
                        if (void 0 === e && (e = t, t = 0), "number" != typeof t || "number" !=
                            typeof e) throw new TypeError("Expected all arguments to be numbers");
                        return Math.floor(m(t, e))
                    }

                    function g(t, e) {
                        t = o(t, 1), e = e || [];
                        var n = 2 * h() * Math.PI;
                        return e[0] = t * Math.cos(n), e[1] = t * Math.sin(n), e
                    }

                    function v(t) {
                        return 0 === (t = t || []).length ? -1 : w(t.map(function (t) {
                            return t.weight
                        }))
                    }

                    function w(t) {
                        if (0 === (t = t || []).length) return -1;
                        var e, n = 0;
                        for (e = 0; e < t.length; e++) n += t[e];
                        if (n <= 0) throw new Error("Weights must sum to > 0");
                        var r = h() * n;
                        for (e = 0; e < t.length; e++) {
                            if (r < t[e]) return e;
                            r -= t[e]
                        }
                        return 0
                    }
                }()
            }, {
                defined: 5,
                "seed-random": 6,
                "simplex-noise": 7
            }],
            4: [function (t, e, n) {
                (function (t) {
                    (function () {
                        ! function (t, r) {
                            "object" == typeof n && void 0 !== e ? e.exports = r() :
                                "function" ==
                                typeof define && define.amd ? define(r) : t.canvasSketch = r()
                        }(this, function () {
                            var e = Object.getOwnPropertySymbols,
                                n = Object.prototype.hasOwnProperty,
                                r = Object.prototype.propertyIsEnumerable;
                            var i = function () {
                                    try {
                                        if (!Object.assign) return !1;
                                        var t = new String("abc");
                                        if (t[5] = "de", "5" === Object.getOwnPropertyNames(
                                                t)[
                                                0]) return !1;
                                        for (var e = {}, n = 0; n < 10; n++) e["_" + String
                                            .fromCharCode(n)] = n;
                                        if ("0123456789" !== Object.getOwnPropertyNames(e)
                                            .map(
                                                function (t) {
                                                    return e[t]
                                                }).join("")) return !1;
                                        var r = {};
                                        return "abcdefghijklmnopqrst".split("").forEach(
                                            function (t) {
                                                r[t] = t
                                            }), "abcdefghijklmnopqrst" === Object.keys(
                                            Object.assign({}, r)).join("")
                                    } catch (t) {
                                        return !1
                                    }
                                }() ? Object.assign : function (t, i) {
                                    for (var o, s, a = function (t) {
                                            if (null == t) throw new TypeError(
                                                "Object.assign cannot be called with null or undefined"
                                            );
                                            return Object(t)
                                        }(t), u = 1; u < arguments.length; u++) {
                                        for (var c in o = Object(arguments[u])) n.call(o,
                                                c) &&
                                            (a[c] = o[c]);
                                        if (e) {
                                            s = e(o);
                                            for (var p = 0; p < s.length; p++) r.call(o, s[
                                                p]) && (a[s[p]] = o[s[p]])
                                        }
                                    }
                                    return a
                                },
                                o = "undefined" != typeof window ? window : void 0 !== t ?
                                t :
                                "undefined" != typeof self ? self : {};

                            function s(t, e) {
                                return t(e = {
                                    exports: {}
                                }, e.exports), e.exports
                            }
                            var a = o.performance && o.performance.now ? function () {
                                    return performance.now()
                                } : Date.now || function () {
                                    return +new Date
                                },
                                u = function (t) {
                                    return !!t && ("object" == typeof t || "function" ==
                                        typeof t) && "function" == typeof t.then
                                };
                            var c = function (t) {
                                return !(!t || "object" != typeof t) && ("object" ==
                                    typeof window && "object" == typeof window
                                    .Node ?
                                    t instanceof window.Node : "number" == typeof t
                                    .nodeType && "string" == typeof t.nodeName)
                            };

                            function p() {
                                return "undefined" != typeof window && window[
                                    "canvas-sketch-cli"]
                            }

                            function f() {
                                for (var t = arguments, e = 0; e < arguments.length; e++)
                                    if (null != t[e]) return t[e]
                            }

                            function h() {
                                return "undefined" != typeof document
                            }
                            var l, d = s(function (t, e) {
                                    function n(t) {
                                        var e = [];
                                        for (var n in t) e.push(n);
                                        return e
                                    }(t.exports = "function" == typeof Object.keys ?
                                        Object
                                        .keys : n).shim = n
                                }),
                                m = s(function (t, e) {
                                    var n = "[object Arguments]" == function () {
                                        return Object.prototype.toString.call(
                                            arguments)
                                    }();

                                    function r(t) {
                                        return "[object Arguments]" == Object.prototype
                                            .toString.call(t)
                                    }

                                    function i(t) {
                                        return t && "object" == typeof t && "number" ==
                                            typeof t.length && Object.prototype
                                            .hasOwnProperty.call(t, "callee") && !Object
                                            .prototype.propertyIsEnumerable.call(t,
                                                "callee") || !1
                                    }(e = t.exports = n ? r : i).supported = r, e
                                        .unsupported = i
                                }),
                                y = s(function (t) {
                                    var e = Array.prototype.slice,
                                        n = t.exports = function (t, o, s) {
                                            return s || (s = {}), t === o || (
                                                t instanceof Date &&
                                                o instanceof Date ?
                                                t.getTime() === o.getTime() : !t ||
                                                !
                                                o || "object" != typeof t &&
                                                "object" !=
                                                typeof o ? s.strict ? t === o : t ==
                                                o :
                                                function (t, o, s) {
                                                    var a, u;
                                                    if (r(t) || r(o)) return !1;
                                                    if (t.prototype !== o.prototype)
                                                        return !1;
                                                    if (m(t)) return !!m(o) && (t =
                                                        e
                                                        .call(t), o = e
                                                        .call(o),
                                                        n(t, o, s));
                                                    if (i(t)) {
                                                        if (!i(o)) return !1;
                                                        if (t.length !== o.length)
                                                            return !1;
                                                        for (a = 0; a < t
                                                            .length; a++)
                                                            if (t[a] !== o[a])
                                                                return !
                                                                    1;
                                                        return !0
                                                    }
                                                    try {
                                                        var c = d(t),
                                                            p = d(o)
                                                    } catch (t) {
                                                        return !1
                                                    }
                                                    if (c.length != p.length)
                                                        return !1;
                                                    for (c.sort(), p.sort(), a = c
                                                        .length - 1; a >= 0; a--)
                                                        if (c[a] != p[a]) return !1;
                                                    for (a = c.length - 1; a >=
                                                        0; a--)
                                                        if (!n(t[u = c[a]], o[u],
                                                                s))
                                                            return !1;
                                                    return typeof t == typeof o
                                                }(t, o, s))
                                        };

                                    function r(t) {
                                        return null == t
                                    }

                                    function i(t) {
                                        return !(!t || "object" != typeof t ||
                                            "number" !=
                                            typeof t.length) && ("function" ==
                                            typeof t
                                            .copy && "function" == typeof t.slice &&
                                            !(t
                                                .length > 0 && "number" != typeof t[
                                                    0]))
                                    }
                                }),
                                g = s(function (t, e) {
                                    ! function (e) {
                                        var n, r, i, o = (n =
                                            /d{1,4}|m{1,4}|yy(?:yy)?|([HhMsTt])\1?|[LloSZWN]|"[^"]*"|'[^']*'/g,
                                            r =
                                            /\b(?:[PMCEA][SDP]T|(?:Pacific|Mountain|Central|Eastern|Atlantic) (?:Standard|Daylight|Prevailing) Time|(?:GMT|UTC)(?:[-+]\d{4})?)\b/g,
                                            i = /[^-+\dA-Z]/g,
                                            function (t, e, a, u) {
                                                if (1 !== arguments.length ||
                                                    "string" !== (null === (c = t) ?
                                                        "null" : void 0 === c ?
                                                        "undefined" : "object" !=
                                                        typeof c ? typeof c : Array
                                                        .isArray(c) ? "array" : {}
                                                        .toString.call(c).slice(8, -
                                                            1)
                                                        .toLowerCase()) || /\d/
                                                    .test(
                                                        t) || (e = t, t = void 0), (
                                                        t = t ||
                                                        new Date) instanceof Date ||
                                                    (
                                                        t = new Date(t)), isNaN(t))
                                                    throw TypeError("Invalid date");
                                                var c, p = (e = String(o.masks[e] ||
                                                        e || o.masks.default))
                                                    .slice(0,
                                                        4);
                                                "UTC:" !== p && "GMT:" !== p || (e =
                                                    e
                                                    .slice(4), a = !0,
                                                    "GMT:" ===
                                                    p && (u = !0));
                                                var f = a ? "getUTC" : "get",
                                                    h = t[f + "Date"](),
                                                    l = t[f + "Day"](),
                                                    d = t[f + "Month"](),
                                                    m = t[f + "FullYear"](),
                                                    y = t[f + "Hours"](),
                                                    g = t[f + "Minutes"](),
                                                    v = t[f + "Seconds"](),
                                                    w = t[f + "Milliseconds"](),
                                                    b = a ? 0 : t
                                                    .getTimezoneOffset(),
                                                    x = function (t) {
                                                        var e = new Date(t
                                                            .getFullYear(), t
                                                            .getMonth(), t
                                                            .getDate());
                                                        e.setDate(e.getDate() - (e
                                                                .getDay() + 6) %
                                                            7 +
                                                            3);
                                                        var n = new Date(e
                                                            .getFullYear(), 0, 4
                                                        );
                                                        n.setDate(n.getDate() - (n
                                                                .getDay() + 6) %
                                                            7 +
                                                            3);
                                                        var r = e
                                                            .getTimezoneOffset() -
                                                            n.getTimezoneOffset();
                                                        return e.setHours(e
                                                            .getHours() -
                                                            r), 1 + Math.floor((
                                                            e -
                                                            n) / 6048e5)
                                                    }(t),
                                                    M = function (t) {
                                                        var e = t.getDay();
                                                        return 0 === e && (e = 7), e
                                                    }(t),
                                                    _ = {
                                                        d: h,
                                                        dd: s(h),
                                                        ddd: o.i18n.dayNames[l],
                                                        dddd: o.i18n.dayNames[l +
                                                            7],
                                                        m: d + 1,
                                                        mm: s(d + 1),
                                                        mmm: o.i18n.monthNames[d],
                                                        mmmm: o.i18n.monthNames[d +
                                                            12],
                                                        yy: String(m).slice(2),
                                                        yyyy: m,
                                                        h: y % 12 || 12,
                                                        hh: s(y % 12 || 12),
                                                        H: y,
                                                        HH: s(y),
                                                        M: g,
                                                        MM: s(g),
                                                        s: v,
                                                        ss: s(v),
                                                        l: s(w, 3),
                                                        L: s(Math.round(w / 10)),
                                                        t: y < 12 ? o.i18n
                                                            .timeNames[
                                                                0] : o.i18n
                                                            .timeNames[1],
                                                        tt: y < 12 ? o.i18n
                                                            .timeNames[
                                                                2] : o.i18n
                                                            .timeNames[3],
                                                        T: y < 12 ? o.i18n
                                                            .timeNames[
                                                                4] : o.i18n
                                                            .timeNames[5],
                                                        TT: y < 12 ? o.i18n
                                                            .timeNames[
                                                                6] : o.i18n
                                                            .timeNames[7],
                                                        Z: u ? "GMT" : a ? "UTC" : (
                                                            String(t).match(
                                                                r) || [
                                                                ""
                                                            ]).pop().replace(i,
                                                            ""),
                                                        o: (b > 0 ? "-" : "+") + s(
                                                            100 *
                                                            Math.floor(Math.abs(
                                                                    b) /
                                                                60) + Math.abs(
                                                                b) %
                                                            60, 4),
                                                        S: ["th", "st", "nd", "rd"][
                                                            h %
                                                            10 > 3 ? 0 : (h %
                                                                100 -
                                                                h % 10 != 10) *
                                                            h %
                                                            10
                                                        ],
                                                        W: x,
                                                        N: M
                                                    };
                                                return e.replace(n, function (t) {
                                                    return t in _ ? _[t] : t
                                                        .slice(1, t.length -
                                                            1)
                                                })
                                            });

                                        function s(t, e) {
                                            for (t = String(t), e = e || 2; t.length <
                                                e;)
                                                t = "0" + t;
                                            return t
                                        }
                                        o.masks = {
                                            default: "ddd mmm dd yyyy HH:MM:ss",
                                            shortDate: "m/d/yy",
                                            mediumDate: "mmm d, yyyy",
                                            longDate: "mmmm d, yyyy",
                                            fullDate: "dddd, mmmm d, yyyy",
                                            shortTime: "h:MM TT",
                                            mediumTime: "h:MM:ss TT",
                                            longTime: "h:MM:ss TT Z",
                                            isoDate: "yyyy-mm-dd",
                                            isoTime: "HH:MM:ss",
                                            isoDateTime: "yyyy-mm-dd'T'HH:MM:sso",
                                            isoUtcDateTime: "UTC:yyyy-mm-dd'T'HH:MM:ss'Z'",
                                            expiresHeaderFormat: "ddd, dd mmm yyyy HH:MM:ss Z"
                                        }, o.i18n = {
                                            dayNames: ["Sun", "Mon", "Tue", "Wed",
                                                "Thu", "Fri", "Sat", "Sunday",
                                                "Monday", "Tuesday",
                                                "Wednesday",
                                                "Thursday", "Friday", "Saturday"
                                            ],
                                            monthNames: ["Jan", "Feb", "Mar", "Apr",
                                                "May", "Jun", "Jul", "Aug",
                                                "Sep",
                                                "Oct", "Nov", "Dec", "January",
                                                "February", "March", "April",
                                                "May",
                                                "June", "July", "August",
                                                "September", "October",
                                                "November",
                                                "December"
                                            ],
                                            timeNames: ["a", "p", "am", "pm", "A",
                                                "P",
                                                "AM", "PM"
                                            ]
                                        }, t.exports = o
                                    }()
                                }),
                                v = "",
                                w = function (t, e) {
                                    if ("string" != typeof t) throw new TypeError(
                                        "expected a string");
                                    if (1 === e) return t;
                                    if (2 === e) return t + t;
                                    var n = t.length * e;
                                    if (l !== t || void 0 === l) l = t, v = "";
                                    else if (v.length >= n) return v.substr(0, n);
                                    for (; n > v.length && e > 1;) 1 & e && (v += t), e >>=
                                        1,
                                        t += t;
                                    return v = (v += t).substr(0, n)
                                };
                            var b, x = function (t, e, n) {
                                    return t = t.toString(), void 0 === e ? t : (n = 0 ===
                                        n ?
                                        "0" : n ? n.toString() : " ", w(n, e - t
                                            .length) + t
                                    )
                                },
                                M = function () {},
                                _ = {
                                    extension: "",
                                    prefix: "",
                                    suffix: ""
                                },
                                T = ["image/png", "image/jpeg", "image/webp"];

                            function k(t, e) {
                                return void 0 === e && (e = {}), new Promise(function (n,
                                    r) {
                                    e = i({}, _, e);
                                    var o = P(Object.assign({}, e, {
                                            extension: "",
                                            frame: void 0
                                        })),
                                        s = t ? "streamStart" : "streamEnd",
                                        a = p();
                                    return a && a.output && "function" == typeof a[
                                            s] ?
                                        a[s](i({}, e, {
                                            filename: o
                                        })).then(function (t) {
                                            return n(t)
                                        }) : n({
                                            filename: o,
                                            client: !1
                                        })
                                })
                            }

                            function E(t, e) {
                                return void 0 === e && (e = {}),
                                    function (t) {
                                        return new Promise(function (e) {
                                            var n = t.indexOf(",");
                                            if (-1 !== n) {
                                                for (var r = t.slice(n + 1), i =
                                                        window
                                                        .atob(r), o = t.slice(0, n),
                                                        s =
                                                        /data:([^;]+)/.exec(o), a =
                                                        (s ?
                                                            s[1] : "") || void 0,
                                                        u =
                                                        new ArrayBuffer(i.length),
                                                        c =
                                                        new Uint8Array(u), p =
                                                        0; p < i
                                                    .length; p++) c[p] = i
                                                    .charCodeAt(
                                                        p);
                                                e(new window.Blob([u], {
                                                    type: a
                                                }))
                                            } else e(new window.Blob)
                                        })
                                    }(t).then(function (t) {
                                        return F(t, e)
                                    })
                            }

                            function F(t, e) {
                                return void 0 === e && (e = {}), new Promise(function (n) {
                                    var r = (e = i({}, _, e)).filename,
                                        o = p();
                                    if (o && "function" == typeof o.saveBlob && o
                                        .output) return o.saveBlob(t, i({}, e, {
                                        filename: r
                                    })).then(function (t) {
                                        return n(t)
                                    });
                                    b || ((b = document.createElement("a")).style
                                            .visibility = "hidden", b.target =
                                            "_blank"
                                        ), b.download = r, b.href = window.URL
                                        .createObjectURL(t), document.body
                                        .appendChild(
                                            b), b.onclick = function () {
                                            b.onclick = M, setTimeout(function () {
                                                window.URL.revokeObjectURL(
                                                        t), b
                                                    .parentElement && b
                                                    .parentElement
                                                    .removeChild(
                                                        b), b
                                                    .removeAttribute(
                                                        "href"), n({
                                                        filename: r,
                                                        client: !1
                                                    })
                                            })
                                        }, b.click()
                                })
                            }

                            function P(t) {
                                if (void 0 === t && (t = {}), "function" == typeof (t =
                                        i({},
                                            t)).file) return t.file(t);
                                if (t.file) return t.file;
                                var e, n = null,
                                    r = "";
                                ("string" == typeof t.extension && (r = t.extension),
                                    "number" == typeof t.frame) && (e = "number" == typeof t
                                    .totalFrames ? t.totalFrames : Math.max(1e4, t.frame),
                                    n =
                                    x(String(t.frame), String(e).length, "0"));
                                var o = isFinite(t.totalLayers) && isFinite(t.layer) && t
                                    .totalLayers > 1 ? "" + t.layer : "";
                                return null != n ? [o, n].filter(Boolean).join("-") + r : [t
                                    .prefix, t.name || t.timeStamp, o, t.hash, t.suffix
                                ].filter(Boolean).join("-") + r
                            }
                            var S = {
                                    dimension: "dimensions",
                                    animated: "animate",
                                    animating: "animate",
                                    unit: "units",
                                    P5: "p5",
                                    pixellated: "pixelated",
                                    looping: "loop",
                                    pixelPerInch: "pixels"
                                },
                                R = ["dimensions", "units", "pixelsPerInch", "orientation",
                                    "scaleToFit", "scaleToView", "bleed", "pixelRatio",
                                    "exportPixelRatio", "maxPixelRatio", "scaleContext",
                                    "resizeCanvas", "styleCanvas", "canvas", "context",
                                    "attributes", "parent", "file", "name", "prefix",
                                    "suffix",
                                    "animate", "playing", "loop", "duration", "totalFrames",
                                    "fps", "playbackRate", "timeScale", "frame", "time",
                                    "flush", "pixelated", "hotkeys", "p5", "id",
                                    "scaleToFitPadding", "data", "params", "encoding",
                                    "encodingQuality"
                                ],
                                C = function (t) {
                                    Object.keys(t).forEach(function (t) {
                                        t in S ? console.warn(
                                                '[canvas-sketch] Could not recognize the setting "' +
                                                t + '", did you mean "' + S[t] +
                                                '"?') :
                                            R.includes(t) || console.warn(
                                                '[canvas-sketch] Could not recognize the setting "' +
                                                t + '"')
                                    })
                                };
                            var j = [
                                    ["postcard", 101.6, 152.4],
                                    ["poster-small", 280, 430],
                                    ["poster", 460, 610],
                                    ["poster-large", 610, 910],
                                    ["business-card", 50.8, 88.9],
                                    ["2r", 64, 89],
                                    ["3r", 89, 127],
                                    ["4r", 102, 152],
                                    ["5r", 127, 178],
                                    ["6r", 152, 203],
                                    ["8r", 203, 254],
                                    ["10r", 254, 305],
                                    ["11r", 279, 356],
                                    ["12r", 305, 381],
                                    ["a0", 841, 1189],
                                    ["a1", 594, 841],
                                    ["a2", 420, 594],
                                    ["a3", 297, 420],
                                    ["a4", 210, 297],
                                    ["a5", 148, 210],
                                    ["a6", 105, 148],
                                    ["a7", 74, 105],
                                    ["a8", 52, 74],
                                    ["a9", 37, 52],
                                    ["a10", 26, 37],
                                    ["2a0", 1189, 1682],
                                    ["4a0", 1682, 2378],
                                    ["b0", 1e3, 1414],
                                    ["b1", 707, 1e3],
                                    ["b1+", 720, 1020],
                                    ["b2", 500, 707],
                                    ["b2+", 520, 720],
                                    ["b3", 353, 500],
                                    ["b4", 250, 353],
                                    ["b5", 176, 250],
                                    ["b6", 125, 176],
                                    ["b7", 88, 125],
                                    ["b8", 62, 88],
                                    ["b9", 44, 62],
                                    ["b10", 31, 44],
                                    ["b11", 22, 32],
                                    ["b12", 16, 22],
                                    ["c0", 917, 1297],
                                    ["c1", 648, 917],
                                    ["c2", 458, 648],
                                    ["c3", 324, 458],
                                    ["c4", 229, 324],
                                    ["c5", 162, 229],
                                    ["c6", 114, 162],
                                    ["c7", 81, 114],
                                    ["c8", 57, 81],
                                    ["c9", 40, 57],
                                    ["c10", 28, 40],
                                    ["c11", 22, 32],
                                    ["c12", 16, 22],
                                    ["half-letter", 5.5, 8.5, "in"],
                                    ["letter", 8.5, 11, "in"],
                                    ["legal", 8.5, 14, "in"],
                                    ["junior-legal", 5, 8, "in"],
                                    ["ledger", 11, 17, "in"],
                                    ["tabloid", 11, 17, "in"],
                                    ["ansi-a", 8.5, 11, "in"],
                                    ["ansi-b", 11, 17, "in"],
                                    ["ansi-c", 17, 22, "in"],
                                    ["ansi-d", 22, 34, "in"],
                                    ["ansi-e", 34, 44, "in"],
                                    ["arch-a", 9, 12, "in"],
                                    ["arch-b", 12, 18, "in"],
                                    ["arch-c", 18, 24, "in"],
                                    ["arch-d", 24, 36, "in"],
                                    ["arch-e", 36, 48, "in"],
                                    ["arch-e1", 30, 42, "in"],
                                    ["arch-e2", 26, 38, "in"],
                                    ["arch-e3", 27, 39, "in"]
                                ].reduce(function (t, e) {
                                    var n = {
                                        units: e[3] || "mm",
                                        dimensions: [e[1], e[2]]
                                    };
                                    return t[e[0]] = n, t[e[0].replace(/-/g, " ")] = n,
                                        t
                                }, {}),
                                D = function () {
                                    for (var t = 0; t < arguments.length; t++)
                                        if (void 0 !== arguments[t]) return arguments[t]
                                },
                                A = ["mm", "cm", "m", "pc", "pt", "in", "ft", "px"],
                                O = {
                                    m: {
                                        system: "metric",
                                        factor: 1
                                    },
                                    cm: {
                                        system: "metric",
                                        factor: .01
                                    },
                                    mm: {
                                        system: "metric",
                                        factor: .001
                                    },
                                    pt: {
                                        system: "imperial",
                                        factor: 1 / 72
                                    },
                                    pc: {
                                        system: "imperial",
                                        factor: 1 / 6
                                    },
                                    in: {
                                        system: "imperial",
                                        factor: 1
                                    },
                                    ft: {
                                        system: "imperial",
                                        factor: 12
                                    }
                                };
                            const N = {
                                metric: {
                                    unit: "m",
                                    ratio: 1 / .0254
                                },
                                imperial: {
                                    unit: "in",
                                    ratio: .0254
                                }
                            };
                            var H = function (t, e, n, r) {
                                if ("number" != typeof t || !isFinite(t))
                                    throw new Error(
                                        "Value must be a finite number");
                                if (!e || !n) throw new Error(
                                    "Must specify from and to units");
                                var i = D((r = r || {}).pixelsPerInch, 96),
                                    o = r.precision,
                                    s = !1 !== r.roundPixel;
                                if (e = e.toLowerCase(), n = n.toLowerCase(), -1 === A
                                    .indexOf(e)) throw new Error('Invalid from unit "' +
                                    e +
                                    '", must be one of: ' + A.join(", "));
                                if (-1 === A.indexOf(n)) throw new Error(
                                    'Invalid from unit "' + n +
                                    '", must be one of: ' + A.join(", "));
                                if (e === n) return t;
                                var a = 1,
                                    u = 1,
                                    c = !1;
                                "px" === e && (u = 1 / i, e = "in"), "px" === n && (
                                    c = !0,
                                    a = i, n = "in");
                                var p = O[e],
                                    f = O[n],
                                    h = t * p.factor * u;
                                p.system !== f.system && (h *= N[p.system].ratio);
                                var l = h / f.factor * a;
                                return c && s ? l = Math.round(l) : "number" ==
                                    typeof o &&
                                    isFinite(o) && (l = function (t, e) {
                                        return Number(Math.round(t + "e" + e) +
                                            "e-" +
                                            e)
                                    }(l, o)), l
                            };

                            function z(t, e, n, r) {
                                return void 0 === e && (e = "px"), void 0 === n && (n =
                                        "px"),
                                    void 0 === r && (r = 72), H(t, e, n, {
                                        pixelsPerInch: r,
                                        precision: 4,
                                        roundPixel: !0
                                    })
                            }

                            function I(t, e) {
                                var n, r, i, o, s, a, u = h(),
                                    c = e.dimensions,
                                    p = function (t) {
                                        return !(!t.dimensions || "string" != typeof t
                                            .dimensions && !(Array.isArray(t
                                                    .dimensions) &&
                                                t.dimensions.length >= 2))
                                    }(e),
                                    l = t.exporting,
                                    d = !!p && !1 !== e.scaleToFit,
                                    m = !(!l && p) || e.scaleToView;
                                u || (d = m = !1);
                                var y, g, v = e.units,
                                    w = "number" == typeof e.pixelsPerInch && isFinite(e
                                        .pixelsPerInch) ? e.pixelsPerInch : 72,
                                    b = f(e.bleed, 0),
                                    x = u ? window.devicePixelRatio : 1,
                                    M = m ? x : 1;
                                "number" == typeof e.pixelRatio && isFinite(e.pixelRatio) ?
                                    g =
                                    f(e.exportPixelRatio, y = e.pixelRatio) : p ? (y = M,
                                        g = f(
                                            e.exportPixelRatio, 1)) : g = f(e
                                        .exportPixelRatio, y =
                                        x), "number" == typeof e.maxPixelRatio && isFinite(e
                                        .maxPixelRatio) && (y = Math.min(e.maxPixelRatio,
                                        y)),
                                    l && (y = g);
                                var _, T, k = function (t, e) {
                                        if (!h()) return [300, 150];
                                        var n = e.parent || window;
                                        if (n === window || n === document || n === document
                                            .body) return [window.innerWidth, window
                                            .innerHeight
                                        ];
                                        var r = n.getBoundingClientRect();
                                        return [r.width, r.height]
                                    }(0, e),
                                    E = k[0],
                                    F = k[1];
                                if (p) {
                                    var P = function (t, e, n) {
                                            if (void 0 === e && (e = "px"), void 0 === n &&
                                                (n =
                                                    72), "string" == typeof t) {
                                                var r = t.toLowerCase();
                                                if (!(r in j)) throw new Error(
                                                    'The dimension preset "' + t +
                                                    '" is not supported or could not be found; try using a4, a3, postcard, letter, etc.'
                                                );
                                                var i = j[r];
                                                return i.dimensions.map(function (t) {
                                                    return z(t, i.units, e, n)
                                                })
                                            }
                                            return t
                                        }(c, v, w),
                                        S = Math.max(P[0], P[1]),
                                        R = Math.min(P[0], P[1]);
                                    if (e.orientation) {
                                        var C = "landscape" === e.orientation;
                                        n = C ? S : R, r = C ? R : S
                                    } else n = P[0], r = P[1];
                                    _ = n, T = r, n += 2 * b, r += 2 * b
                                } else _ = n = E, T = r = F;
                                var D = n,
                                    A = r;
                                if (p && v && (D = z(n, v, "px", w), A = z(r, v, "px", w)),
                                    i =
                                    Math.round(D), o = Math.round(A), d && !l && p) {
                                    var O = n / r,
                                        N = E / F,
                                        H = f(e.scaleToFitPadding, 40),
                                        I = Math.round(E - 2 * H),
                                        L = Math.round(F - 2 * H);
                                    (i > I || o > L) && (N > O ? (o = L, i = Math.round(o *
                                        O)) : (i = I, o = Math.round(i / O)))
                                }
                                return {
                                    bleed: b,
                                    pixelRatio: y,
                                    width: n,
                                    height: r,
                                    dimensions: [n, r],
                                    units: v || "px",
                                    scaleX: (s = m ? Math.round(y * i) : Math.round(y *
                                        D)) / n,
                                    scaleY: (a = m ? Math.round(y * o) : Math.round(y *
                                        A)) / r,
                                    pixelsPerInch: w,
                                    viewportWidth: m ? Math.round(i) : Math.round(D),
                                    viewportHeight: m ? Math.round(o) : Math.round(A),
                                    canvasWidth: s,
                                    canvasHeight: a,
                                    trimWidth: _,
                                    trimHeight: T,
                                    styleWidth: i,
                                    styleHeight: o
                                }
                            }
                            H.units = A;
                            var L = function (t, e) {
                                if ("string" != typeof t) throw new TypeError(
                                    "must specify type string");
                                if (e = e || {}, "undefined" == typeof document && !e
                                    .canvas) return null;
                                var n = e.canvas || document.createElement("canvas");
                                "number" == typeof e.width && (n.width = e.width);
                                "number" == typeof e.height && (n.height = e.height);
                                var r, i = e;
                                try {
                                    var o = [t];
                                    0 === t.indexOf("webgl") && o.push("experimental-" +
                                        t);
                                    for (var s = 0; s < o.length; s++)
                                        if (r = n.getContext(o[s], i)) return r
                                } catch (t) {
                                    r = null
                                }
                                return r || null
                            };

                            function U(t) {
                                var e, n;
                                void 0 === t && (t = {});
                                var r = !1;
                                if (!1 !== t.canvas) {
                                    if (!(e = t.context) || "string" == typeof e) {
                                        var o = t.canvas;
                                        o || (o = function () {
                                            if (!h()) throw new Error(
                                                "It appears you are runing from Node.js or a non-browser environment. Try passing in an existing { canvas } interface instead."
                                            );
                                            return document.createElement("canvas")
                                        }(), r = !0);
                                        var s = e || "2d";
                                        if ("function" != typeof o.getContext)
                                            throw new Error(
                                                "The specified { canvas } element does not have a getContext() function, maybe it is not a <canvas> tag?"
                                            );
                                        if (!(e = L(s, i({}, t.attributes, {
                                                canvas: o
                                            })))) throw new Error(
                                            "Failed at canvas.getContext('" + s +
                                            "') - the browser may not support this context, or a different context may already be in use with this canvas."
                                        )
                                    }
                                    if (n = e.canvas, t.canvas && n !== t.canvas)
                                        throw new Error(
                                            "The { canvas } and { context } settings must point to the same underlying canvas element"
                                        );
                                    t.pixelated && (e.imageSmoothingEnabled = !1, e
                                        .mozImageSmoothingEnabled = !1, e
                                        .oImageSmoothingEnabled = !1, e
                                        .webkitImageSmoothingEnabled = !1, e
                                        .msImageSmoothingEnabled = !1, n.style[
                                            "image-rendering"] = "pixelated")
                                }
                                return {
                                    canvas: n,
                                    context: e,
                                    ownsCanvas: r
                                }
                            }
                            var q = function () {
                                    var t = this;
                                    this._settings = {}, this._props = {}, this._sketch =
                                        void 0, this._raf = null, this._recordTimeout =
                                        null,
                                        this._lastRedrawResult = void 0, this
                                        ._isP5Resizing = !
                                        1, this._keyboardShortcuts = function (t) {
                                            void 0 === t && (t = {});
                                            var e = function (e) {
                                                if (t.enabled()) {
                                                    var n = p();
                                                    83 !== e.keyCode || e.altKey || !e
                                                        .metaKey && !e.ctrlKey ? 32 ===
                                                        e
                                                        .keyCode ? t.togglePlay(e) :
                                                        n && !e
                                                        .altKey && 75 === e.keyCode && (
                                                            e
                                                            .metaKey || e.ctrlKey) && (e
                                                            .preventDefault(), t.commit(
                                                                e)
                                                        ) : (e.preventDefault(), t.save(
                                                            e))
                                                }
                                            };
                                            return {
                                                attach: function () {
                                                    window.addEventListener("keydown",
                                                        e)
                                                },
                                                detach: function () {
                                                    window.removeEventListener(
                                                        "keydown", e)
                                                }
                                            }
                                        }({
                                            enabled: function () {
                                                return !1 !== t.settings.hotkeys
                                            },
                                            save: function (e) {
                                                e.shiftKey ? t.props.recording ? (t
                                                        .endRecord(), t.run()) : t
                                                    .record() : t.props.recording ||
                                                    t
                                                    .exportFrame()
                                            },
                                            togglePlay: function () {
                                                t.props.playing ? t.pause() : t
                                                    .play()
                                            },
                                            commit: function (e) {
                                                t.exportFrame({
                                                    commit: !0
                                                })
                                            }
                                        }), this._animateHandler = function () {
                                            return t.animate()
                                        }, this._resizeHandler = function () {
                                            t.resize() && t.render()
                                        }
                                },
                                W = {
                                    sketch: {
                                        configurable: !0
                                    },
                                    settings: {
                                        configurable: !0
                                    },
                                    props: {
                                        configurable: !0
                                    }
                                };
                            W.sketch.get = function () {
                                return this._sketch
                            }, W.settings.get = function () {
                                return this._settings
                            }, W.props.get = function () {
                                return this._props
                            }, q.prototype._computePlayhead = function (t, e) {
                                return "number" == typeof e && isFinite(e) ? t / e : 0
                            }, q.prototype._computeFrame = function (t, e, n, r) {
                                return isFinite(n) && n > 1 ? Math.floor(t * (n - 1)) :
                                    Math
                                    .floor(r * e)
                            }, q.prototype._computeCurrentFrame = function () {
                                return this._computeFrame(this.props.playhead, this
                                    .props
                                    .time, this.props.totalFrames, this.props.fps)
                            }, q.prototype._getSizeProps = function () {
                                var t = this.props;
                                return {
                                    width: t.width,
                                    height: t.height,
                                    pixelRatio: t.pixelRatio,
                                    canvasWidth: t.canvasWidth,
                                    canvasHeight: t.canvasHeight,
                                    viewportWidth: t.viewportWidth,
                                    viewportHeight: t.viewportHeight
                                }
                            }, q.prototype.run = function () {
                                if (!this.sketch) throw new Error(
                                    "should wait until sketch is loaded before trying to play()"
                                );
                                return !1 !== this.settings.playing && this.play(),
                                    "function" == typeof this.sketch.dispose && console
                                    .warn(
                                        "In canvas-sketch@0.0.23 the dispose() event has been renamed to unload()"
                                    ), this.props.started || (this._signalBegin(), this
                                        .props.started = !0), this.tick(), this
                                    .render(),
                                    this
                            }, q.prototype._cancelTimeouts = function () {
                                null != this._raf && "undefined" != typeof window &&
                                    "function" == typeof window.cancelAnimationFrame &&
                                    (
                                        window.cancelAnimationFrame(this._raf), this
                                        ._raf =
                                        null), null != this._recordTimeout && (
                                        clearTimeout(
                                            this._recordTimeout), this._recordTimeout =
                                        null)
                            }, q.prototype.play = function () {
                                var t = this.settings.animate;
                                "animation" in this.settings && (t = !0, console.warn(
                                    "[canvas-sketch] { animation } has been renamed to { animate }"
                                )), t && (h() ? this.props.playing || (this.props
                                    .started || (this._signalBegin(), this.props
                                        .started = !0), this.props.playing = !0,
                                    this._cancelTimeouts(), this._lastTime =
                                    a(),
                                    this._raf = window.requestAnimationFrame(
                                        this
                                        ._animateHandler)) : console.error(
                                    "[canvas-sketch] WARN: Using { animate } in Node.js is not yet supported"
                                ))
                            }, q.prototype.pause = function () {
                                this.props.recording && this.endRecord(), this.props
                                    .playing = !1, this._cancelTimeouts()
                            }, q.prototype.togglePlay = function () {
                                this.props.playing ? this.pause() : this.play()
                            }, q.prototype.stop = function () {
                                this.pause(), this.props.frame = 0, this.props
                                    .playhead = 0,
                                    this.props.time = 0, this.props.deltaTime = 0, this
                                    .props.started = !1, this.render()
                            }, q.prototype.record = function () {
                                var t = this;
                                if (!this.props.recording)
                                    if (h()) {
                                        this.stop(), this.props.playing = !0, this.props
                                            .recording = !0;
                                        var e = this._createExportOptions({
                                                sequence: !0
                                            }),
                                            n = 1 / this.props.fps;
                                        this._cancelTimeouts();
                                        var r, i = function () {
                                            return t.props.recording ? (t.props
                                                .deltaTime = n, t.tick(), t
                                                .exportFrame(e).then(
                                                    function () {
                                                        t.props.recording && (t
                                                            .props
                                                            .deltaTime =
                                                            0, t.props
                                                            .frame++,
                                                            t.props.frame <
                                                            t
                                                            .props
                                                            .totalFrames ?
                                                            (t.props.time +=
                                                                n,
                                                                t.props
                                                                .playhead =
                                                                t
                                                                ._computePlayhead(
                                                                    t.props
                                                                    .time, t
                                                                    .props
                                                                    .duration
                                                                ),
                                                                t
                                                                ._recordTimeout =
                                                                setTimeout(
                                                                    i, 0)
                                                            ) : (console
                                                                .log(
                                                                    "Finished recording"
                                                                ), t
                                                                ._signalEnd(),
                                                                t
                                                                .endRecord(),
                                                                t
                                                                .stop(), t
                                                                .run()
                                                            ))
                                                    })) : Promise.resolve()
                                        };
                                        this.props.started || (this._signalBegin(), this
                                                .props.started = !0), this.sketch &&
                                            "function" == typeof this.sketch
                                            .beginRecord &&
                                            this._wrapContextScale(function (e) {
                                                return t.sketch.beginRecord(e)
                                            }), (r = e, void 0 === r && (r = {}), k(!0,
                                                r))
                                            .catch(function (t) {
                                                console.error(t)
                                            }).then(function (e) {
                                                t._raf = window
                                                    .requestAnimationFrame(i)
                                            })
                                    } else console.error(
                                        "[canvas-sketch] WARN: Recording from Node.js is not yet supported"
                                    )
                            }, q.prototype._signalBegin = function () {
                                var t = this;
                                this.sketch && "function" == typeof this.sketch.begin &&
                                    this._wrapContextScale(function (e) {
                                        return t.sketch.begin(e)
                                    })
                            }, q.prototype._signalEnd = function () {
                                var t = this;
                                this.sketch && "function" == typeof this.sketch.end &&
                                    this
                                    ._wrapContextScale(function (e) {
                                        return t.sketch.end(e)
                                    })
                            }, q.prototype.endRecord = function () {
                                var t, e = this,
                                    n = this.props.recording;
                                return this._cancelTimeouts(), this.props.recording = !
                                    1,
                                    this.props.deltaTime = 0, this.props.playing = !1, (
                                        void 0 === t && (t = {}), k(!1, t)).catch(
                                        function (
                                            t) {
                                            console.error(t)
                                        }).then(function () {
                                        n && e.sketch && "function" == typeof e
                                            .sketch
                                            .endRecord && e._wrapContextScale(
                                                function (
                                                    t) {
                                                    return e.sketch.endRecord(t)
                                                })
                                    })
                            }, q.prototype._createExportOptions = function (t) {
                                return void 0 === t && (t = {}), {
                                    sequence: t.sequence,
                                    save: t.save,
                                    fps: this.props.fps,
                                    frame: t.sequence ? this.props.frame : void 0,
                                    file: this.settings.file,
                                    name: this.settings.name,
                                    prefix: this.settings.prefix,
                                    suffix: this.settings.suffix,
                                    encoding: this.settings.encoding,
                                    encodingQuality: this.settings.encodingQuality,
                                    timeStamp: t.timeStamp || g(new Date,
                                        "yyyy.mm.dd-HH.MM.ss"),
                                    totalFrames: isFinite(this.props.totalFrames) ?
                                        Math
                                        .max(0, this.props.totalFrames) : 1e3
                                }
                            }, q.prototype.exportFrame = function (t) {
                                var e = this;
                                if (void 0 === t && (t = {}), !this.sketch)
                                    return Promise
                                        .all([]);
                                "function" == typeof this.sketch.preExport && this
                                    .sketch
                                    .preExport();
                                var n = this._createExportOptions(t),
                                    r = p(),
                                    o = Promise.resolve();
                                if (r && t.commit && "function" == typeof r.commit) {
                                    var s = i({}, n),
                                        a = r.commit(s);
                                    o = u(a) ? a : Promise.resolve(a)
                                }
                                return o.then(function (t) {
                                    return e._doExportFrame(i({}, n, {
                                        hash: t || ""
                                    }))
                                }).then(function (t) {
                                    return 1 === t.length ? t[0] : t
                                })
                            }, q.prototype._doExportFrame = function (t) {
                                var e = this;
                                void 0 === t && (t = {}), this._props.exporting = !0,
                                    this
                                    .resize();
                                var n = this.render();
                                return void 0 === n && (n = [this.props.canvas]), n = (
                                        n = [].concat(n).filter(Boolean)).map(function (
                                        e) {
                                        var n, r = "object" == typeof e && e && (
                                                "data" in e || "dataURL" in e),
                                            o = r ? e.data : e,
                                            s = r ? i({}, e, {
                                                data: o
                                            }) : {
                                                data: o
                                            };
                                        if (c(n = o) && /canvas/i.test(n
                                                .nodeName) &&
                                            "function" == typeof n.getContext) {
                                            var a = function (t, e) {
                                                void 0 === e && (e = {});
                                                var n = e.encoding ||
                                                    "image/png";
                                                if (!T.includes(n))
                                                    throw new Error(
                                                        "Invalid canvas encoding " +
                                                        n);
                                                var r = (n.split("/")[1] || "")
                                                    .replace(/jpeg/i, "jpg");
                                                return r && (r = ("." + r)
                                                    .toLowerCase()), {
                                                    extension: r,
                                                    type: n,
                                                    dataURL: t.toDataURL(n,
                                                        e
                                                        .encodingQuality
                                                    )
                                                }
                                            }(o, {
                                                encoding: s.encoding || t
                                                    .encoding,
                                                encodingQuality: f(s
                                                    .encodingQuality, t
                                                    .encodingQuality,
                                                    .95)
                                            });
                                            return Object.assign(s, {
                                                dataURL: a.dataURL,
                                                extension: a.extension,
                                                type: a.type
                                            })
                                        }
                                        return s
                                    }), this._props.exporting = !1, this.resize(), this
                                    .render(), Promise.all(n.map(function (e, n, r) {
                                        var o = i({
                                                extension: "",
                                                prefix: "",
                                                suffix: ""
                                            }, t, e, {
                                                layer: n,
                                                totalLayers: r.length
                                            }),
                                            s = !1 !== t.save && e.save;
                                        for (var a in o.save = !1 !== s, o
                                                .filename = P(o), delete o
                                                .encoding,
                                                delete o.encodingQuality, o)
                                            void 0 === o[a] && delete o[a];
                                        var u = Promise.resolve({});
                                        if (o.save) {
                                            var c = o.data;
                                            if (o.dataURL) u = E(o.dataURL, o);
                                            else u = function (t, e) {
                                                void 0 === e && (e = {});
                                                var n = Array.isArray(t) ?
                                                    t : [
                                                        t
                                                    ];
                                                return F(new window.Blob(
                                                    n, {
                                                        type: e
                                                            .type ||
                                                            ""
                                                    }), e)
                                            }(c, o)
                                        }
                                        return u.then(function (t) {
                                            return Object.assign({}, o,
                                                t)
                                        })
                                    })).then(function (n) {
                                        var r = n.filter(function (t) {
                                            return t.save
                                        });
                                        if (r.length > 0) {
                                            var i, o = r.find(function (t) {
                                                    return t.outputName
                                                }),
                                                s = r.some(function (t) {
                                                    return t.client
                                                }),
                                                a = r.some(function (t) {
                                                    return t.stream
                                                });
                                            i = r.length > 1 ? r.length : o ? o
                                                .outputName + "/" + r[0].filename :
                                                "" +
                                                r[0].filename;
                                            var u = "";
                                            if (t.sequence) u = isFinite(e.props
                                                    .totalFrames) ? " (frame " + (t
                                                    .frame + 1) + " / " + e.props
                                                .totalFrames + ")" : " (frame " + t
                                                .frame + ")";
                                            else r.length > 1 && (u = " files");
                                            console.log("%c[" + (s ?
                                                    "canvas-sketch-cli" :
                                                    "canvas-sketch") + "]%c " +
                                                (a ?
                                                    "Streaming into" :
                                                    "Exported") +
                                                " %c" + i + "%c" + u,
                                                "color: #8e8e8e;",
                                                "color: initial;",
                                                "font-weight: bold;",
                                                "font-weight: initial;")
                                        }
                                        return "function" == typeof e.sketch
                                            .postExport && e.sketch.postExport(), n
                                    })
                            }, q.prototype._wrapContextScale = function (t) {
                                this._preRender(), t(this.props), this._postRender()
                            }, q.prototype._preRender = function () {
                                var t = this.props;
                                this.props.gl || !t.context || t.p5 ? t.p5 && t.p5
                                    .scale(t
                                        .scaleX / t.pixelRatio, t.scaleY / t.pixelRatio
                                    ) : (
                                        t.context.save(), !1 !== this.settings
                                        .scaleContext && t.context.scale(t.scaleX, t
                                            .scaleY)
                                    )
                            }, q.prototype._postRender = function () {
                                var t = this.props;
                                this.props.gl || !t.context || t.p5 || t.context
                                    .restore(),
                                    t.gl && !1 !== this.settings.flush && !t.p5 && t.gl
                                    .flush()
                            }, q.prototype.tick = function () {
                                this.sketch && "function" == typeof this.sketch.tick &&
                                    (
                                        this._preRender(), this.sketch.tick(this.props),
                                        this._postRender())
                            }, q.prototype.render = function () {
                                return this.props.p5 ? (this._lastRedrawResult = void 0,
                                        this.props.p5.redraw(), this._lastRedrawResult
                                    ) :
                                    this.submitDrawCall()
                            }, q.prototype.submitDrawCall = function () {
                                if (this.sketch) {
                                    var t, e = this.props;
                                    return this._preRender(), "function" == typeof this
                                        .sketch ? t = this.sketch(e) : "function" ==
                                        typeof this.sketch.render && (t = this.sketch
                                            .render(e)), this._postRender(), t
                                }
                            }, q.prototype.update = function (t) {
                                var e = this;
                                void 0 === t && (t = {});
                                var n = ["animate"];
                                Object.keys(t).forEach(function (t) {
                                    if (n.indexOf(t) >= 0) throw new Error(
                                        "Sorry, the { " + t +
                                        " } option is not yet supported with update()."
                                    )
                                });
                                var r = this._settings.canvas,
                                    i = this._settings.context;
                                for (var o in t) {
                                    var s = t[o];
                                    void 0 !== s && (e._settings[o] = s)
                                }
                                var a = Object.assign({}, this._settings, t);
                                if ("time" in t && "frame" in t) throw new Error(
                                    "You should specify { time } or { frame } but not both"
                                );
                                if ("time" in t ? delete a.frame : "frame" in t &&
                                    delete a
                                    .time, "duration" in t && "totalFrames" in t)
                                    throw new Error(
                                        "You should specify { duration } or { totalFrames } but not both"
                                    );
                                "duration" in t ? delete a.totalFrames :
                                    "totalFrames" in
                                    t && delete a.duration, "data" in t && (this._props
                                        .data = t.data);
                                var u = this.getTimeProps(a);
                                if (Object.assign(this._props, u), r !== this._settings
                                    .canvas || i !== this._settings.context) {
                                    var c = U(this._settings),
                                        p = c.context;
                                    this.props.canvas = c.canvas, this.props.context =
                                        p,
                                        this._setupGLKey(), this._appendCanvasIfNeeded()
                                }
                                return t.p5 && "function" != typeof t.p5 && (this.props
                                        .p5 =
                                        t.p5, this.props.p5.draw = function () {
                                            e._isP5Resizing || (e._lastRedrawResult = e
                                                .submitDrawCall())
                                        }), "playing" in t && (t.playing ? this.play() :
                                        this.pause()), C(this._settings), this.resize(),
                                    this.render(), this.props
                            }, q.prototype.resize = function () {
                                var t = this._getSizeProps(),
                                    e = this.settings,
                                    n = this.props,
                                    r = I(n, e);
                                Object.assign(this._props, r);
                                var i = this.props,
                                    o = i.pixelRatio,
                                    s = i.canvasWidth,
                                    a = i.canvasHeight,
                                    u = i.styleWidth,
                                    c = i.styleHeight,
                                    p = this.props.canvas;
                                p && !1 !== e.resizeCanvas && (n.p5 ? p.width === s && p
                                    .height === a || (this._isP5Resizing = !0, n.p5
                                        .pixelDensity(o), n.p5.resizeCanvas(s / o,
                                            a /
                                            o, !1), this._isP5Resizing = !1) : (p
                                        .width !== s && (p.width = s), p.height !==
                                        a &&
                                        (p.height = a)), h() && !1 !== e
                                    .styleCanvas &&
                                    (p.style.width = u + "px", p.style.height = c +
                                        "px"));
                                var f = this._getSizeProps(),
                                    l = !y(t, f);
                                return l && this._sizeChanged(), l
                            }, q.prototype._sizeChanged = function () {
                                this.sketch && "function" == typeof this.sketch
                                    .resize &&
                                    this.sketch.resize(this.props)
                            }, q.prototype.animate = function () {
                                if (this.props.playing)
                                    if (h()) {
                                        this._raf = window.requestAnimationFrame(this
                                            ._animateHandler);
                                        var t = a(),
                                            e = 1e3 / this.props.fps,
                                            n = t - this._lastTime,
                                            r = this.props.duration,
                                            i = "number" == typeof r && isFinite(r),
                                            o = !0,
                                            s = this.settings.playbackRate;
                                        "fixed" === s ? n = e : "throttle" === s ? n >
                                            e ?
                                            this._lastTime = t -= n % e : o = !1 : this
                                            ._lastTime = t;
                                        var u = n / 1e3,
                                            c = this.props.time + u * this.props
                                            .timeScale;
                                        c < 0 && i && (c = r + c);
                                        var p = !1,
                                            f = !1;
                                        if (i && c >= r && (!1 !== this.settings.loop ?
                                                (
                                                    o = !0, c %= r, f = !0) : (o = !1,
                                                    c =
                                                    r, p = !0), this._signalEnd()), o) {
                                            this.props.deltaTime = u, this.props.time =
                                                c,
                                                this.props.playhead = this
                                                ._computePlayhead(
                                                    c, r);
                                            var l = this.props.frame;
                                            this.props.frame = this
                                                ._computeCurrentFrame(),
                                                f && this._signalBegin(), l !== this
                                                .props
                                                .frame && this.tick(), this.render(),
                                                this
                                                .props.deltaTime = 0
                                        }
                                        p && this.pause()
                                    } else console.error(
                                        "[canvas-sketch] WARN: Animation in Node.js is not yet supported"
                                    )
                            }, q.prototype.dispatch = function (t) {
                                if ("function" != typeof t) throw new Error(
                                    "must pass function into dispatch()");
                                t(this.props), this.render()
                            }, q.prototype.mount = function () {
                                this._appendCanvasIfNeeded()
                            }, q.prototype.unmount = function () {
                                h() && (window.removeEventListener("resize", this
                                            ._resizeHandler), this._keyboardShortcuts
                                        .detach()), this.props.canvas.parentElement &&
                                    this
                                    .props.canvas.parentElement.removeChild(this.props
                                        .canvas)
                            }, q.prototype._appendCanvasIfNeeded = function () {
                                h() && (!1 !== this.settings.parent && this.props
                                    .canvas &&
                                    !this.props.canvas.parentElement && (this
                                        .settings
                                        .parent || document.body).appendChild(this
                                        .props
                                        .canvas))
                            }, q.prototype._setupGLKey = function () {
                                var t;
                                this.props.context && ("function" == typeof (t = this
                                        .props
                                        .context).clear && "function" == typeof t
                                    .clearColor && "function" == typeof t
                                    .bufferData ?
                                    this._props.gl = this.props.context :
                                    delete this
                                    ._props.gl)
                            }, q.prototype.getTimeProps = function (t) {
                                void 0 === t && (t = {});
                                var e = t.duration,
                                    n = t.totalFrames,
                                    r = f(t.timeScale, 1),
                                    i = f(t.fps, 24),
                                    o = "number" == typeof e && isFinite(e),
                                    s = "number" == typeof n && isFinite(n),
                                    a = o ? Math.floor(i * e) : void 0,
                                    u = s ? n / i : void 0;
                                if (o && s && a !== n) throw new Error(
                                    "You should specify either duration or totalFrames, but not both. Or, they must match exactly."
                                );
                                void 0 === t.dimensions && void 0 !== t.units && console
                                    .warn(
                                        "You've specified a { units } setting but no { dimension }, so the units will be ignored."
                                    ), n = f(n, a, Infinity), e = f(e, u, Infinity);
                                var c = t.time,
                                    p = t.frame,
                                    h = "number" == typeof c && isFinite(c),
                                    l = "number" == typeof p && isFinite(p),
                                    d = 0,
                                    m = 0,
                                    y = 0;
                                if (h && l) throw new Error(
                                    "You should specify either start frame or time, but not both."
                                );
                                return h ? (y = this._computePlayhead(d = c, e), m =
                                    this
                                    ._computeFrame(y, d, n, i)) : l && (y = this
                                    ._computePlayhead(d = (m = p) / i, e)), {
                                    playhead: y,
                                    time: d,
                                    frame: m,
                                    duration: e,
                                    totalFrames: n,
                                    fps: i,
                                    timeScale: r
                                }
                            }, q.prototype.setup = function (t) {
                                var e = this;
                                if (void 0 === t && (t = {}), this.sketch)
                                    throw new Error(
                                        "Multiple setup() calls not yet supported.");
                                this._settings = Object.assign({}, t, this._settings),
                                    C(
                                        this._settings);
                                var n = U(this._settings),
                                    r = n.context,
                                    i = n.canvas,
                                    o = this.getTimeProps(this._settings);
                                this._props = Object.assign({}, o, {
                                    canvas: i,
                                    context: r,
                                    deltaTime: 0,
                                    started: !1,
                                    exporting: !1,
                                    playing: !1,
                                    recording: !1,
                                    settings: this.settings,
                                    data: this.settings.data,
                                    render: function () {
                                        return e.render()
                                    },
                                    togglePlay: function () {
                                        return e.togglePlay()
                                    },
                                    dispatch: function (t) {
                                        return e.dispatch(t)
                                    },
                                    tick: function () {
                                        return e.tick()
                                    },
                                    resize: function () {
                                        return e.resize()
                                    },
                                    update: function (t) {
                                        return e.update(t)
                                    },
                                    exportFrame: function (t) {
                                        return e.exportFrame(t)
                                    },
                                    record: function () {
                                        return e.record()
                                    },
                                    play: function () {
                                        return e.play()
                                    },
                                    pause: function () {
                                        return e.pause()
                                    },
                                    stop: function () {
                                        return e.stop()
                                    }
                                }), this._setupGLKey(), this.resize()
                            }, q.prototype.loadAndRun = function (t, e) {
                                var n = this;
                                return this.load(t, e).then(function () {
                                    return n.run(), n
                                })
                            }, q.prototype.unload = function () {
                                var t = this;
                                this.pause(), this.sketch && ("function" == typeof this
                                    .sketch.unload && this._wrapContextScale(
                                        function (
                                            e) {
                                            return t.sketch.unload(e)
                                        }), this._sketch = null)
                            }, q.prototype.destroy = function () {
                                this.unload(), this.unmount()
                            }, q.prototype.load = function (t, e) {
                                var n = this;
                                if ("function" != typeof t) throw new Error(
                                    "The function must take in a function as the first parameter. Example:\n  canvasSketcher(() => { ... }, settings)"
                                );
                                this.sketch && this.unload(), void 0 !== e && this
                                    .update(
                                        e), this._preRender();
                                var r = Promise.resolve();
                                if (this.settings.p5) {
                                    if (!h()) throw new Error(
                                        "[canvas-sketch] ERROR: Using p5.js in Node.js is not supported"
                                    );
                                    r = new Promise(function (t) {
                                        var e, r = n.settings.p5;
                                        r.p5 && (e = r.preload, r = r.p5);
                                        var i = function (r) {
                                            e && (r.preload = function () {
                                                return e(r)
                                            }), r.setup = function () {
                                                var e = n.props,
                                                    i = "webgl" === n
                                                    .settings.context,
                                                    o = i ? r.WEBGL : r
                                                    .P2D;
                                                r.noLoop(), r
                                                    .pixelDensity(e
                                                        .pixelRatio), r
                                                    .createCanvas(e
                                                        .viewportWidth,
                                                        e
                                                        .viewportHeight,
                                                        o),
                                                    i && n.settings
                                                    .attributes && r
                                                    .setAttributes(n
                                                        .settings
                                                        .attributes
                                                    ), n.update({
                                                        p5: r,
                                                        canvas: r
                                                            .canvas,
                                                        context: r
                                                            ._renderer
                                                            .drawingContext
                                                    }), t()
                                            }
                                        };
                                        if ("function" == typeof r) new r(i);
                                        else {
                                            if ("function" != typeof window
                                                .createCanvas) throw new Error(
                                                "{ p5 } setting is passed but can't find p5.js in global (window) scope. Maybe you did not create it globally?\nnew p5(); // <-- attaches to global scope"
                                            );
                                            i(window)
                                        }
                                    })
                                }
                                return r.then(function () {
                                    var e = t(n.props);
                                    return u(e) || (e = Promise.resolve(e)), e
                                }).then(function (t) {
                                    return t || (t = {}), n._sketch = t, h() &&
                                        (n
                                            ._keyboardShortcuts.attach(), window
                                            .addEventListener("resize", n
                                                ._resizeHandler)), n
                                        ._postRender(),
                                        n._sizeChanged(), n
                                }).catch(function (t) {
                                    throw console.warn(
                                        "Could not start sketch, the async loading function rejected with an error:\n    Error: " +
                                        t.message), t
                                })
                            }, Object.defineProperties(q.prototype, W);
                            var B = "hot-id-cache",
                                Y = [];

                            function K(t, e) {
                                if (void 0 === e && (e = {}), e.p5) {
                                    if (e.canvas || e.context && "string" != typeof e
                                        .context)
                                        throw new Error(
                                            'In { p5 } mode, you can\'t pass your own canvas or context, unless the context is a "webgl" or "2d" string'
                                        );
                                    e = Object.assign({}, e, {
                                        canvas: !1,
                                        context: "string" == typeof e.context && e
                                            .context
                                    })
                                }
                                var n, r, i = (n = p()) && n.hot;
                                i && (r = f(e.id, "$__DEFAULT_CANVAS_SKETCH_ID__$"));
                                var o = i && "string" == typeof r;
                                o && Y.includes(r) && (console.warn(
                                    "Warning: You have multiple calls to canvasSketch() in --hot mode. You must pass unique { id } strings in settings to enable hot reload across multiple sketches. ",
                                    r), o = !1);
                                var s = Promise.resolve();
                                if (o) {
                                    Y.push(r);
                                    var a = function (t) {
                                        var e = p();
                                        if (e) return e[B] = e[B] || {}, e[B][t]
                                    }(r);
                                    if (a) {
                                        var u = function () {
                                            var t, n = (t = a.manager, e.animate ? {
                                                time: t.props.time
                                            } : void 0);
                                            return a.manager.destroy(), n
                                        };
                                        s = a.load.then(u).catch(u)
                                    }
                                }
                                return s.then(function (n) {
                                    var i, s, a, u, c = new q;
                                    return t ? (e = Object.assign({}, e, n), c
                                            .setup(e),
                                            c.mount(), i = c.loadAndRun(t)) : i =
                                        Promise.resolve(c), o && (s = r, a = {
                                            load: i,
                                            manager: c
                                        }, (u = p()) && (u[B] = u[B] || {}, u[B]
                                            [
                                                s
                                            ] = a)), i
                                })
                            }
                            return K.canvasSketch = K, K.PaperSizes = j, K
                        })
                    }).call(this)
                }).call(this, "undefined" != typeof global ? global : "undefined" != typeof self ?
                    self :
                    "undefined" != typeof window ? window : {})
            }, {}],
            5: [function (t, e, n) {
                e.exports = function () {
                    for (var t = 0; t < arguments.length; t++)
                        if (void 0 !== arguments[t]) return arguments[t]
                }
            }, {}],
            6: [function (t, e, n) {
                (function (t) {
                    (function () {
                        "use strict";
                        var n = 256,
                            r = [],
                            i = void 0 === t ? window : t,
                            o = Math.pow(n, 6),
                            s = Math.pow(2, 52),
                            a = 2 * s,
                            u = n - 1,
                            c = Math.random;

                        function p(t) {
                            var e, r = t.length,
                                i = this,
                                o = 0,
                                s = i.i = i.j = 0,
                                a = i.S = [];
                            for (r || (t = [r++]); o < n;) a[o] = o++;
                            for (o = 0; o < n; o++) a[o] = a[s = u & s + t[o % r] + (e = a[o])],
                                a[
                                    s] = e;
                            (i.g = function (t) {
                                for (var e, r = 0, o = i.i, s = i.j, a = i.S; t--;) e = a[
                                    o =
                                    u & o + 1], r = r * n + a[u & (a[o] = a[s = u & s +
                                    e]) + (a[s] = e)];
                                return i.i = o, i.j = s, r
                            })(n)
                        }

                        function f(t, e) {
                            for (var n, r = t + "", i = 0; i < r.length;) e[u & i] = u & (n ^=
                                19 *
                                e[u & i]) + r.charCodeAt(i++);
                            return h(e)
                        }

                        function h(t) {
                            return String.fromCharCode.apply(0, t)
                        }
                        e.exports = function (t, u) {
                            if (u && !0 === u.global) return u.global = !1, Math.random = e
                                .exports(t, u), u.global = !0, Math.random;
                            var c = [],
                                l = (f(function t(e, n) {
                                    var r, i = [],
                                        o = (typeof e)[0];
                                    if (n && "o" == o)
                                        for (r in e) try {
                                            i.push(t(e[r], n - 1))
                                        } catch (t) {}
                                    return i.length ? i : "s" == o ? e : e + "\0"
                                }(u && u.entropy || !1 ? [t, h(r)] : 0 in
                                    arguments ?
                                    t : function (t) {
                                        try {
                                            return i.crypto.getRandomValues(t =
                                                new Uint8Array(n)), h(t)
                                        } catch (t) {
                                            return [+new Date, i, i.navigator && i
                                                .navigator.plugins, i.screen, h(
                                                    r)
                                            ]
                                        }
                                    }(), 3), c), new p(c));
                            return f(h(l.S), r),
                                function () {
                                    for (var t = l.g(6), e = o, r = 0; t < s;) t = (t + r) *
                                        n,
                                        e *= n, r = l.g(1);
                                    for (; t >= a;) t /= 2, e /= 2, r >>>= 1;
                                    return (t + r) / e
                                }
                        }, e.exports.resetGlobal = function () {
                            Math.random = c
                        }, f(Math.random(), r)
                    }).call(this)
                }).call(this, "undefined" != typeof global ? global : "undefined" != typeof self ?
                    self :
                    "undefined" != typeof window ? window : {})
            }, {}],
            7: [function (t, e, n) {
                ! function () {
                    "use strict";
                    var t = .5 * (Math.sqrt(3) - 1),
                        r = (3 - Math.sqrt(3)) / 6,
                        i = 1 / 6,
                        o = (Math.sqrt(5) - 1) / 4,
                        s = (5 - Math.sqrt(5)) / 20;

                    function a(t) {
                        var e;
                        e = "function" == typeof t ? t : t ? function () {
                                var t = 0,
                                    e = 0,
                                    n = 0,
                                    r = 1,
                                    i = (o = 4022871197, function (t) {
                                        t = t.toString();
                                        for (var e = 0; e < t.length; e++) {
                                            var n = .02519603282416938 * (o += t.charCodeAt(e));
                                            n -= o = n >>> 0, o = (n *= o) >>> 0, o += 4294967296 *
                                                (
                                                    n -= o)
                                        }
                                        return 2.3283064365386963e-10 * (o >>> 0)
                                    });
                                var o;
                                t = i(" "), e = i(" "), n = i(" ");
                                for (var s = 0; s < arguments.length; s++)(t -= i(arguments[s])) < 0 &&
                                    (
                                        t += 1), (e -= i(arguments[s])) < 0 && (e += 1), (n -= i(
                                        arguments[
                                            s])) < 0 && (n += 1);
                                return i = null,
                                    function () {
                                        var i = 2091639 * t + 2.3283064365386963e-10 * r;
                                        return t = e, e = n, n = i - (r = 0 | i)
                                    }
                            }(t) : Math.random, this.p = u(e), this.perm = new Uint8Array(512), this
                            .permMod12 = new Uint8Array(512);
                        for (var n = 0; n < 512; n++) this.perm[n] = this.p[255 & n], this.permMod12[
                                n] =
                            this.perm[n] % 12
                    }

                    function u(t) {
                        var e, n = new Uint8Array(256);
                        for (e = 0; e < 256; e++) n[e] = e;
                        for (e = 0; e < 255; e++) {
                            var r = e + ~~(t() * (256 - e)),
                                i = n[e];
                            n[e] = n[r], n[r] = i
                        }
                        return n
                    }
                    a.prototype = {
                            grad3: new Float32Array([1, 1, 0, -1, 1, 0, 1, -1, 0, -1, -1, 0, 1, 0, 1, -
                                1, 0,
                                1, 1, 0, -1, -1, 0, -1, 0, 1, 1, 0, -1, 1, 0, 1, -1, 0, -1, -1
                            ]),
                            grad4: new Float32Array([0, 1, 1, 1, 0, 1, 1, -1, 0, 1, -1, 1, 0, 1, -1, -1,
                                0,
                                -1, 1, 1, 0, -1, 1, -1, 0, -1, -1, 1, 0, -1, -1, -1, 1, 0, 1, 1,
                                1,
                                0, 1, -1, 1, 0, -1, 1, 1, 0, -1, -1, -1, 0, 1, 1, -1, 0, 1, -1,
                                -1,
                                0, -1, 1, -1, 0, -1, -1, 1, 1, 0, 1, 1, 1, 0, -1, 1, -1, 0, 1,
                                1, -
                                1, 0, -1, -1, 1, 0, 1, -1, 1, 0, -1, -1, -1, 0, 1, -1, -1, 0, -
                                1, 1,
                                1, 1, 0, 1, 1, -1, 0, 1, -1, 1, 0, 1, -1, -1, 0, -1, 1, 1, 0, -
                                1, 1,
                                -1, 0, -1, -1, 1, 0, -1, -1, -1, 0
                            ]),
                            noise2D: function (e, n) {
                                var i, o, s = this.permMod12,
                                    a = this.perm,
                                    u = this.grad3,
                                    c = 0,
                                    p = 0,
                                    f = 0,
                                    h = (e + n) * t,
                                    l = Math.floor(e + h),
                                    d = Math.floor(n + h),
                                    m = (l + d) * r,
                                    y = e - (l - m),
                                    g = n - (d - m);
                                y > g ? (i = 1, o = 0) : (i = 0, o = 1);
                                var v = y - i + r,
                                    w = g - o + r,
                                    b = y - 1 + 2 * r,
                                    x = g - 1 + 2 * r,
                                    M = 255 & l,
                                    _ = 255 & d,
                                    T = .5 - y * y - g * g;
                                if (T >= 0) {
                                    var k = 3 * s[M + a[_]];
                                    c = (T *= T) * T * (u[k] * y + u[k + 1] * g)
                                }
                                var E = .5 - v * v - w * w;
                                if (E >= 0) {
                                    var F = 3 * s[M + i + a[_ + o]];
                                    p = (E *= E) * E * (u[F] * v + u[F + 1] * w)
                                }
                                var P = .5 - b * b - x * x;
                                if (P >= 0) {
                                    var S = 3 * s[M + 1 + a[_ + 1]];
                                    f = (P *= P) * P * (u[S] * b + u[S + 1] * x)
                                }
                                return 70 * (c + p + f)
                            },
                            noise3D: function (t, e, n) {
                                var r, o, s, a, u, c, p, f, h, l, d = this.permMod12,
                                    m = this.perm,
                                    y = this.grad3,
                                    g = (t + e + n) * (1 / 3),
                                    v = Math.floor(t + g),
                                    w = Math.floor(e + g),
                                    b = Math.floor(n + g),
                                    x = (v + w + b) * i,
                                    M = t - (v - x),
                                    _ = e - (w - x),
                                    T = n - (b - x);
                                M >= _ ? _ >= T ? (u = 1, c = 0, p = 0, f = 1, h = 1, l = 0) : M >=
                                    T ?
                                    (u = 1, c = 0, p = 0, f = 1, h = 0, l = 1) : (u = 0, c = 0, p =
                                        1,
                                        f = 1, h = 0, l = 1) : _ < T ? (u = 0, c = 0, p = 1, f = 0,
                                        h =
                                        1, l = 1) : M < T ? (u = 0, c = 1, p = 0, f = 0, h = 1, l =
                                        1) :
                                    (u = 0, c = 1, p = 0, f = 1, h = 1, l = 0);
                                var k = M - u + i,
                                    E = _ - c + i,
                                    F = T - p + i,
                                    P = M - f + 2 * i,
                                    S = _ - h + 2 * i,
                                    R = T - l + 2 * i,
                                    C = M - 1 + .5,
                                    j = _ - 1 + .5,
                                    D = T - 1 + .5,
                                    A = 255 & v,
                                    O = 255 & w,
                                    N = 255 & b,
                                    H = .6 - M * M - _ * _ - T * T;
                                if (H < 0) r = 0;
                                else {
                                    var z = 3 * d[A + m[O + m[N]]];
                                    r = (H *= H) * H * (y[z] * M + y[z + 1] * _ + y[z + 2] * T)
                                }
                                var I = .6 - k * k - E * E - F * F;
                                if (I < 0) o = 0;
                                else {
                                    var L = 3 * d[A + u + m[O + c + m[N + p]]];
                                    o = (I *= I) * I * (y[L] * k + y[L + 1] * E + y[L + 2] * F)
                                }
                                var U = .6 - P * P - S * S - R * R;
                                if (U < 0) s = 0;
                                else {
                                    var q = 3 * d[A + f + m[O + h + m[N + l]]];
                                    s = (U *= U) * U * (y[q] * P + y[q + 1] * S + y[q + 2] * R)
                                }
                                var W = .6 - C * C - j * j - D * D;
                                if (W < 0) a = 0;
                                else {
                                    var B = 3 * d[A + 1 + m[O + 1 + m[N + 1]]];
                                    a = (W *= W) * W * (y[B] * C + y[B + 1] * j + y[B + 2] * D)
                                }
                                return 32 * (r + o + s + a)
                            },
                            noise4D: function (t, e, n, r) {
                                var i, a, u, c, p, f, h, l, d, m, y, g, v, w, b, x, M, _ = this
                                    .perm,
                                    T = this.grad4,
                                    k = (t + e + n + r) * o,
                                    E = Math.floor(t + k),
                                    F = Math.floor(e + k),
                                    P = Math.floor(n + k),
                                    S = Math.floor(r + k),
                                    R = (E + F + P + S) * s,
                                    C = t - (E - R),
                                    j = e - (F - R),
                                    D = n - (P - R),
                                    A = r - (S - R),
                                    O = 0,
                                    N = 0,
                                    H = 0,
                                    z = 0;
                                C > j ? O++ : N++, C > D ? O++ : H++, C > A ? O++ : z++, j > D ? N++
                                    :
                                    H++, j > A ? N++ : z++, D > A ? H++ : z++;
                                var I = C - (f = O >= 3 ? 1 : 0) + s,
                                    L = j - (h = N >= 3 ? 1 : 0) + s,
                                    U = D - (l = H >= 3 ? 1 : 0) + s,
                                    q = A - (d = z >= 3 ? 1 : 0) + s,
                                    W = C - (m = O >= 2 ? 1 : 0) + 2 * s,
                                    B = j - (y = N >= 2 ? 1 : 0) + 2 * s,
                                    Y = D - (g = H >= 2 ? 1 : 0) + 2 * s,
                                    K = A - (v = z >= 2 ? 1 : 0) + 2 * s,
                                    G = C - (w = O >= 1 ? 1 : 0) + 3 * s,
                                    Q = j - (b = N >= 1 ? 1 : 0) + 3 * s,
                                    Z = D - (x = H >= 1 ? 1 : 0) + 3 * s,
                                    J = A - (M = z >= 1 ? 1 : 0) + 3 * s,
                                    V = C - 1 + 4 * s,
                                    X = j - 1 + 4 * s,
                                    $ = D - 1 + 4 * s,
                                    tt = A - 1 + 4 * s,
                                    et = 255 & E,
                                    nt = 255 & F,
                                    rt = 255 & P,
                                    it = 255 & S,
                                    ot = .6 - C * C - j * j - D * D - A * A;
                                if (ot < 0) i = 0;
                                else {
                                    var st = _[et + _[nt + _[rt + _[it]]]] % 32 * 4;
                                    i = (ot *= ot) * ot * (T[st] * C + T[st + 1] * j + T[st + 2] *
                                        D +
                                        T[st + 3] * A)
                                }
                                var at = .6 - I * I - L * L - U * U - q * q;
                                if (at < 0) a = 0;
                                else {
                                    var ut = _[et + f + _[nt + h + _[rt + l + _[it + d]]]] % 32 * 4;
                                    a = (at *= at) * at * (T[ut] * I + T[ut + 1] * L + T[ut + 2] *
                                        U +
                                        T[ut + 3] * q)
                                }
                                var ct = .6 - W * W - B * B - Y * Y - K * K;
                                if (ct < 0) u = 0;
                                else {
                                    var pt = _[et + m + _[nt + y + _[rt + g + _[it + v]]]] % 32 * 4;
                                    u = (ct *= ct) * ct * (T[pt] * W + T[pt + 1] * B + T[pt + 2] *
                                        Y +
                                        T[pt + 3] * K)
                                }
                                var ft = .6 - G * G - Q * Q - Z * Z - J * J;
                                if (ft < 0) c = 0;
                                else {
                                    var ht = _[et + w + _[nt + b + _[rt + x + _[it + M]]]] % 32 * 4;
                                    c = (ft *= ft) * ft * (T[ht] * G + T[ht + 1] * Q + T[ht + 2] *
                                        Z +
                                        T[ht + 3] * J)
                                }
                                var lt = .6 - V * V - X * X - $ * $ - tt * tt;
                                if (lt < 0) p = 0;
                                else {
                                    var dt = _[et + 1 + _[nt + 1 + _[rt + 1 + _[it + 1]]]] % 32 * 4;
                                    p = (lt *= lt) * lt * (T[dt] * V + T[dt + 1] * X + T[dt + 2] *
                                        $ +
                                        T[dt + 3] * tt)
                                }
                                return 27 * (i + a + u + c + p)
                            }
                        }, a._buildPermutationTable = u, "undefined" != typeof define && define.amd &&
                        define(function () {
                            return a
                        }), void 0 !== n ? n.SimplexNoise = a : "undefined" != typeof window && (window
                            .SimplexNoise = a), void 0 !== e && (e.exports = a)
                }()
            }, {}],
            8: [function (t, e, n) {
                const r = t("canvas-sketch");
                document.querySelector("canvas");
                const i = t("canvas-sketch-util/math"),
                    o = t("canvas-sketch-util/random");
                r(({
                    width: t,
                    height: e
                }) => {
                    const n = [];
                    for (let r = 0; r < 40; r++) {
                        const r = o.range(0, t),
                            i = o.range(0, e);
                        n.push(new a(r, i))
                    }
                    return ({
                        context: t,
                        width: e,
                        height: r
                    }) => {
                        t.fillStyle = "black", t.fillRect(0, 0, e, r);
                        for (let e = 0; e < n.length; e++) {
                            const r = n[e];
                            for (let o = e + 1; o < n.length; o++) {
                                const e = n[o],
                                    s = r.pos.getDistance(e.pos);
                                s > 200 || (t.lineWidth = i.mapRange(s, 0, 200, 6, 1), t
                                    .strokeStyle = "white", t.beginPath(), t.moveTo(r
                                        .pos.x,
                                        r.pos.y), t.lineTo(e.pos.x, e.pos.y), t.stroke()
                                )
                            }
                        }
                        n.forEach(n => {
                            n.update(), n.draw(t), n.bounce(e, r)
                        })
                    }
                }, {
                    dimensions: [1080, 1080],
                    animate: !0
                });
                class s {
                    constructor(t, e, n) {
                        this.x = t, this.y = e, this.radius = n
                    }
                    getDistance(t) {
                        const e = this.x - t.x,
                            n = this.y - t.y;
                        return Math.sqrt(e * e + n * n)
                    }
                }
                class a {
                    constructor(t, e) {
                        this.pos = new s(t, e), this.vel = new s(o.range(-1, 1), o.range(-1, 1)),
                            this
                            .radius = o.range(4, 12)
                    }
                    wrap(t, e) {
                        pos.x > t && (pos.x = 0), pos.y > e && (pos.y = 0)
                    }
                    bounce(t, e) {
                        (this.pos.x <= 0 || this.pos.x >= t) && (this.vel.x *= -1), (this.pos.y <=
                            0 ||
                            this.pos.y >= e) && (this.vel.y *= -1)
                    }
                    update() {
                        this.pos.x += this.vel.x, this.pos.y += this.vel.y
                    }
                    draw(t) {
                        t.fillStyle = "white", t.save(), t.translate(this.pos.x, this.pos.y), t
                            .lineWidth = 4, t.beginPath(), t.arc(0, 0, this.radius, 0, 2 * Math.PI),
                            t
                            .fill(), t.restore()
                    }
                }
            }, {
                "canvas-sketch": 4,
                "canvas-sketch-util/math": 2,
                "canvas-sketch-util/random": 3
            }],
            9: [function (t, e, n) {
                (function (t) {
                    (function () {
                        t.CANVAS_SKETCH_DEFAULT_STORAGE_KEY = window.location.href
                    }).call(this)
                }).call(this, "undefined" != typeof global ? global : "undefined" != typeof self ?
                    self :
                    "undefined" != typeof window ? window : {})
            }, {}]
        }, {}, [8, 9]);
    </script>

    <div class="bottomright">
        <h1>

            <a href="" class="typewrite" data-period="2000"
                data-type='["This site is under construction...", "Working on loads of projects...", "Coming soon...", "You&#39;re still here?", "You should get a job...", "Just kidding, go on..."]'>
                <span class="wrap"></span>
            </a>
            <!-- <h1>This site is under construction...</h1> -->
        </h1>
    </div>


   
    <footer>
        <div class="">
            <div class="row">
                <ul class="iconSocial">
                    <a href="https://twitter.com/CudjoeTyra">
                        <i class="fa-brands fa-twitter fa-2xl"></i>
                    </a>
                    <a href="https://github.com/tcudjoe">
                        <i class="fa-brands fa-github fa-2xl"></i>
                    </a>
                    <a href="https://discordapp.com/users/magicalassembler#5251/">
                        <i class="fa-brands fa-discord fa-2xl"></i>
                    </a>
                    <a href="https://www.linkedin.com/in/tcudjoe2401/">
                        <i class="fa-brands fa-linkedin fa-2xl"></i>
                    </a>
                </ul>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/ec3fa6845f.js" crossorigin="anonymous"></script>
    <script src="./js/app.js"></script>
    <script src="./js/tilt.js"></script>
    <script src="./js/typewriter.js"></script>
    <script src="./js/pageAnimation.js"></script>
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>