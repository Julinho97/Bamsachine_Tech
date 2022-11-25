if (typeof gtm_razer_get == 'undefined') {
    var gtm_razer_get = {
        "razer-cart-coupon-code": ""
    };
    var gtm_razer_mutation_timer = null;
    var gtm_interval_timer = {};
    var gtm_razer_mutation_observerConfig = {
        characterData: true,
        subtree: true
    };
    var gtm_razer_debug = false || parseInt(localStorage.getItem('gtm_razer_debug'));
    var gtm_hash_salt = "R@2er";
    var gtm_function_x = function () {
        console.info("GTM Framework Loaded")
    };

    var ga360_detect_locale = location.pathname;
    var ga360_locale_to_restrict = ['ca-en', 'de-de', 'tw-zh', 'au-en', 'hk-en', 'hk-zh', 'sg-en', 'ap-en', 'it-it', 'fr-fr', 'gb-en', 'eu-en', 'es-es', 'jp-jp', 'kr-kr'];
    var ga360_locale_is_currency_lookup = {
        'us-en': 'USD',
        'ca-en': 'CAD',
        'de-de': 'EUR',
        'tw-zh': 'NTD',
        'au-en': 'AUD',
        'hk-en': 'HKD',
        'hk-zh': 'HKD',
        'sg-en': 'SGD',
        'ap-en': 'MYR',
        'it-it': 'EUR',
        'fr-fr': 'EUR',
        'gb-en': 'GBP',
        'eu-en': 'EUR',
        'es-es': 'EUR',
        'jp-jp': 'JPY',
        'kr-kr': 'KRW'
    };
    var ga360_locale_is = 'us-en';
    for (var i = 0; i < ga360_locale_to_restrict.length; i++) {
        if (location.pathname.indexOf('/' + ga360_locale_to_restrict[i]) != -1) {
            ga360_locale_is = ga360_locale_to_restrict[i];
            break;
        }
    }
    var ga360_product_category_is = "";
    var ga360_locale_is_currency = ga360_locale_is_currency_lookup[ga360_locale_is];
    if (typeof ga360_categories == 'undefined') {
        var ga360_categories = {}; //loaded from GTM
    }

    function priceParseFloat(str) {
        if (document.querySelector("html[lang=de-DE]") || document.querySelector("html[lang=fr-FR]")) {
            str = str.replace(".", "").replace(",", ".");
        }
        str = Number(str.replace(/[^0-9.-]+/g, ""));
        return str;
    }

    function locationPathname_sansLocale(url) {
        var localepath = (ga360_locale_is != "us-en") ? ga360_locale_is : "";
        var path = location.pathname;
        url = url || false;
        if (url) {
            if (url.indexOf("https://") == -1 && url.indexOf("http://") == -1 && url.indexOf("//") != 0) {
                url = url.split("/" + localepath);
                if (typeof url[1] != "undefined")
                    return url[1].replace(/^\//, '').replace(/^\//, '').replace(/\/$/, '');
                else
                    return "/";
            } else {
                url = url.replace(/^\/\/|^.*?:(\/\/)?/, '');
                url = url.replace(/^www2./, '');
                url = url.replace(/^www./, '');
                url = url.replace(/^razer.com/, '');
                if (localepath)
                    url = url.replace("/" + localepath, '');
                return url.replace(/^\//, '').replace(/^\//, '').replace(/\/$/, '');
            }
        } else {
            if (localepath) {
                path = path.split("/" + localepath);
                if (typeof path[1] != "undefined")
                    return path[1].replace(/^\//, '').replace(/^\//, '').replace(/\/$/, '');
                else
                    return "/";
            } else {
                return path;
            }
        }
    }

    function categoryFromPathname(url) {
        var cat = (locationPathname_sansLocale(url) || "").toLowerCase();
        cat = cat.split("/");
        var cat1 = cat[0];
        var cat2 = "";
        var cat3 = "";
        if (cat.length > 1) {
            cat2 = cat[1];
            if (cat.length > 2) {
                cat3 = cat[2];
            }
        }
        return ga360_categories[cat1 + "/" + cat2 + "/" + cat3] || ga360_categories[cat1 + "/" + cat2] || ga360_categories[cat1] || "";
    }
    ga360_product_category_is = categoryFromPathname(location.href);

    function gtm_cryptHash(s) {
        return gtm_sha1(s + gtm_hash_salt);
    }

    function gtm_sha1(str) {
        var rotate_left = function (n, s) {
            var t4 = (n << s) | (n >>> (32 - s));
            return t4;
        };
        var cvt_hex = function (val) {
            var str = '';
            var i;
            var v;
            for (i = 7; i >= 0; i--) {
                v = (val >>> (i * 4)) & 0x0f;
                str += v.toString(16);
            }
            return str;
        };
        var blockstart;
        var i,
        j;
        var W = new Array(80);
        var H0 = 0x67452301;
        var H1 = 0xEFCDAB89;
        var H2 = 0x98BADCFE;
        var H3 = 0x10325476;
        var H4 = 0xC3D2E1F0;
        var A,
        B,
        C,
        D,
        E;
        var temp;
        var str_len = str.length;
        var word_array = [];
        for (i = 0; i < str_len - 3; i += 4) {
            j = str.charCodeAt(i) << 24 | str.charCodeAt(i + 1) << 16 | str.charCodeAt(i + 2) << 8 | str.charCodeAt(i + 3);
            word_array.push(j);
        }
        switch (str_len % 4) {
        case 0:
            i = 0x080000000;
            break;
        case 1:
            i = str.charCodeAt(str_len - 1) << 24 | 0x0800000;
            break;
        case 2:
            i = str.charCodeAt(str_len - 2) << 24 | str.charCodeAt(str_len - 1) << 16 | 0x08000;
            break;
        case 3:
            i = str.charCodeAt(str_len - 3) << 24 | str.charCodeAt(str_len - 2) << 16 | str.charCodeAt(str_len - 1) << 8 | 0x80;
            break;
        }
        word_array.push(i);
        while ((word_array.length % 16) != 14) {
            word_array.push(0);
        }
        word_array.push(str_len >>> 29);
        word_array.push((str_len << 3) & 0x0ffffffff);
        for (blockstart = 0; blockstart < word_array.length; blockstart += 16) {
            for (i = 0; i < 16; i++) {
                W[i] = word_array[blockstart + i];
            }
            for (i = 16; i <= 79; i++) {
                W[i] = rotate_left(W[i - 3] ^ W[i - 8] ^ W[i - 14] ^ W[i - 16], 1);
            }
            A = H0;
            B = H1;
            C = H2;
            D = H3;
            E = H4;
            for (i = 0; i <= 19; i++) {
                temp = (rotate_left(A, 5) + ((B & C) | (~B & D)) + E + W[i] + 0x5A827999) & 0x0ffffffff;
                E = D;
                D = C;
                C = rotate_left(B, 30);
                B = A;
                A = temp;
            }
            for (i = 20; i <= 39; i++) {
                temp = (rotate_left(A, 5) + (B ^ C ^ D) + E + W[i] + 0x6ED9EBA1) & 0x0ffffffff;
                E = D;
                D = C;
                C = rotate_left(B, 30);
                B = A;
                A = temp;
            }
            for (i = 40; i <= 59; i++) {
                temp = (rotate_left(A, 5) + ((B & C) | (B & D) | (C & D)) + E + W[i] + 0x8F1BBCDC) & 0x0ffffffff;
                E = D;
                D = C;
                C = rotate_left(B, 30);
                B = A;
                A = temp;
            }
            for (i = 60; i <= 79; i++) {
                temp = (rotate_left(A, 5) + (B ^ C ^ D) + E + W[i] + 0xCA62C1D6) & 0x0ffffffff;
                E = D;
                D = C;
                C = rotate_left(B, 30);
                B = A;
                A = temp;
            }
            H0 = (H0 + A) & 0x0ffffffff;
            H1 = (H1 + B) & 0x0ffffffff;
            H2 = (H2 + C) & 0x0ffffffff;
            H3 = (H3 + D) & 0x0ffffffff;
            H4 = (H4 + E) & 0x0ffffffff;
        }
        temp = cvt_hex(H0) + cvt_hex(H1) + cvt_hex(H2) + cvt_hex(H3) + cvt_hex(H4);
        return temp.toLowerCase();
    };

    function gtm_SHA256(s) {
        var chrsz = 8;
        var hexcase = 0;
        function safe_add(x, y) {
            var lsw = (x & 0xFFFF) + (y & 0xFFFF);
            var msw = (x >> 16) + (y >> 16) + (lsw >> 16);
            return (msw << 16) | (lsw & 0xFFFF);
        }
        function S(X, n) {
            return (X >>> n) | (X << (32 - n));
        }
        function R(X, n) {
            return (X >>> n);
        }
        function Ch(x, y, z) {
            return ((x & y) ^ ((~x) & z));
        }
        function Maj(x, y, z) {
            return ((x & y) ^ (x & z) ^ (y & z));
        }
        function Sigma0256(x) {
            return (S(x, 2) ^ S(x, 13) ^ S(x, 22));
        }
        function Sigma1256(x) {
            return (S(x, 6) ^ S(x, 11) ^ S(x, 25));
        }
        function Gamma0256(x) {
            return (S(x, 7) ^ S(x, 18) ^ R(x, 3));
        }
        function Gamma1256(x) {
            return (S(x, 17) ^ S(x, 19) ^ R(x, 10));
        }
        function core_sha256(m, l) {
            var K = new Array(0x428A2F98, 0x71374491, 0xB5C0FBCF, 0xE9B5DBA5, 0x3956C25B, 0x59F111F1, 0x923F82A4, 0xAB1C5ED5, 0xD807AA98, 0x12835B01, 0x243185BE, 0x550C7DC3, 0x72BE5D74, 0x80DEB1FE, 0x9BDC06A7, 0xC19BF174, 0xE49B69C1, 0xEFBE4786, 0xFC19DC6, 0x240CA1CC, 0x2DE92C6F, 0x4A7484AA, 0x5CB0A9DC, 0x76F988DA, 0x983E5152, 0xA831C66D, 0xB00327C8, 0xBF597FC7, 0xC6E00BF3, 0xD5A79147, 0x6CA6351, 0x14292967, 0x27B70A85, 0x2E1B2138, 0x4D2C6DFC, 0x53380D13, 0x650A7354, 0x766A0ABB, 0x81C2C92E, 0x92722C85, 0xA2BFE8A1, 0xA81A664B, 0xC24B8B70, 0xC76C51A3, 0xD192E819, 0xD6990624, 0xF40E3585, 0x106AA070, 0x19A4C116, 0x1E376C08, 0x2748774C, 0x34B0BCB5, 0x391C0CB3, 0x4ED8AA4A, 0x5B9CCA4F, 0x682E6FF3, 0x748F82EE, 0x78A5636F, 0x84C87814, 0x8CC70208, 0x90BEFFFA, 0xA4506CEB, 0xBEF9A3F7, 0xC67178F2);
            var HASH = new Array(0x6A09E667, 0xBB67AE85, 0x3C6EF372, 0xA54FF53A, 0x510E527F, 0x9B05688C, 0x1F83D9AB, 0x5BE0CD19);
            var W = new Array(64);
            var a,
            b,
            c,
            d,
            e,
            f,
            g,
            h,
            i,
            j;
            var T1,
            T2;
            m[l >> 5] |= 0x80 << (24 - l % 32);
            m[((l + 64 >> 9) << 4) + 15] = l;
            for (var i = 0; i < m.length; i += 16) {
                a = HASH[0];
                b = HASH[1];
                c = HASH[2];
                d = HASH[3];
                e = HASH[4];
                f = HASH[5];
                g = HASH[6];
                h = HASH[7];
                for (var j = 0; j < 64; j++) {
                    if (j < 16)
                        W[j] = m[j + i];
                    else
                        W[j] = safe_add(safe_add(safe_add(Gamma1256(W[j - 2]), W[j - 7]), Gamma0256(W[j - 15])), W[j - 16]);
                    T1 = safe_add(safe_add(safe_add(safe_add(h, Sigma1256(e)), Ch(e, f, g)), K[j]), W[j]);
                    T2 = safe_add(Sigma0256(a), Maj(a, b, c));
                    h = g;
                    g = f;
                    f = e;
                    e = safe_add(d, T1);
                    d = c;
                    c = b;
                    b = a;
                    a = safe_add(T1, T2);
                }
                HASH[0] = safe_add(a, HASH[0]);
                HASH[1] = safe_add(b, HASH[1]);
                HASH[2] = safe_add(c, HASH[2]);
                HASH[3] = safe_add(d, HASH[3]);
                HASH[4] = safe_add(e, HASH[4]);
                HASH[5] = safe_add(f, HASH[5]);
                HASH[6] = safe_add(g, HASH[6]);
                HASH[7] = safe_add(h, HASH[7]);
            }
            return HASH;
        }
        function str2binb(str) {
            var bin = Array();
            var mask = (1 << chrsz) - 1;
            for (var i = 0; i < str.length * chrsz; i += chrsz) {
                bin[i >> 5] |= (str.charCodeAt(i / chrsz) & mask) << (24 - i % 32);
            }
            return bin;
        }
        function Utf8Encode(string) {
            string = string.replace(/\r\n/g, "\n");
            var utftext = "";
            for (var n = 0; n < string.length; n++) {
                var c = string.charCodeAt(n);
                if (c < 128) {
                    utftext += String.fromCharCode(c);
                } else if ((c > 127) && (c < 2048)) {
                    utftext += String.fromCharCode((c >> 6) | 192);
                    utftext += String.fromCharCode((c & 63) | 128);
                } else {
                    utftext += String.fromCharCode((c >> 12) | 224);
                    utftext += String.fromCharCode(((c >> 6) & 63) | 128);
                    utftext += String.fromCharCode((c & 63) | 128);
                }
            }
            return utftext;
        }
        function binb2hex(binarray) {
            var hex_tab = hexcase ? "0123456789ABCDEF" : "0123456789abcdef";
            var str = "";
            for (var i = 0; i < binarray.length * 4; i++) {
                str += hex_tab.charAt((binarray[i >> 2] >> ((3 - i % 4) * 8 + 4)) & 0xF) +
                hex_tab.charAt((binarray[i >> 2] >> ((3 - i % 4) * 8)) & 0xF);
            }
            return str;
        }
        s = Utf8Encode(s);
        return binb2hex(core_sha256(str2binb(s), s.length * chrsz));
    }

    function gtm_getCookie(name) {
        function escape(s) {
            return s.replace(/([.*+?\^${}()|\[\]\/\\])/g, '\\$1');
        };
        var match = document.cookie.match(RegExp('(?:^|;\\s*)' + escape(name) + '=([^;]*)'));
        return match ? match[1] : null;
    };

    function gtm_datalayer_lookup(eventname, elementId, func) {

        if (typeof dataLayer != 'undefined' && dataLayer.length && eventname && elementId && typeof func == 'function') {
            for (var i = (dataLayer.length - 1); i >= 0; i--) {
                if (dataLayer[i]["event"] == eventname && dataLayer[i]["gtm.elementId"] == elementId) {
                    return func(dataLayer[i], i);
                    break;
                }
            }
        } else if (typeof dataLayer != 'undefined' && dataLayer.length && (typeof elementId == 'undefined' || elementId == false || elementId.trim() == "") && typeof func == 'function') {
            for (var i = (dataLayer.length - 1); i >= 0; i--) {
                if (dataLayer[i]["event"] == eventname) {
                    return func(dataLayer[i], i);
                    break;
                }
            }
        } else {
            return null;
        }
    };

    function gtm_datalayer_lookup_each(eventname, elementId, lastpointerdatalayer, func) {
        var dobreak = false;
        if (typeof lastpointerdatalayer == 'undefined') {
            lastpointerdatalayer = 0;
        }
        if (typeof dataLayer != 'undefined' && dataLayer.length && eventname && elementId && typeof func == 'function') {
            for (var i = lastpointerdatalayer; i < (dataLayer.length); i++) {
                if (dataLayer[i]["event"] == eventname && dataLayer[i]["gtm.elementId"] == elementId) {
                    func(dataLayer[i], i);
                    if (dobreak) {
                        break;
                    }
                }
            }
        } else if (typeof dataLayer != 'undefined' && dataLayer.length && (typeof elementId == 'undefined' || elementId == false || elementId.trim() == "") && typeof func == 'function') {
            for (var i = lastpointerdatalayer; i < (dataLayer.length); i++) {
                if (dataLayer[i]["event"] == eventname) {
                    func(dataLayer[i], i);
                    if (dobreak) {
                        break;
                    }
                }
            }
        } else {
            return null;
        }
    };

    function gtm_interval(func, lookForFunctionNameBeforeStarting, showlog, gtm_interval_timeout, gtm_interval_set_time) {

        if (typeof showlog == 'undefined') {
            showlog = false;
        }

        lookForFunctionNameBeforeStarting = lookForFunctionNameBeforeStarting || "gtm_function_x";
        gtm_interval_timeout = gtm_interval_timeout || 15000;
        gtm_interval_set_time = gtm_interval_set_time || 500;

        if (typeof func == 'function' && typeof gtm_interval_timer != 'undefined') {
            var timestamp = new Date().getTime();
            timestamp = timestamp + "_" + (Math.floor(Math.random() * 1000000) + 1);

            if (showlog)
                console.info("Created gtm_interval_timer[" + timestamp + "]");

            var fnStart = null;
            var fnStartArr = null;
            if (lookForFunctionNameBeforeStarting.indexOf(":") != -1) {
                fnStartArr = lookForFunctionNameBeforeStarting.split(":");
            }

            gtm_interval_timer[timestamp] = setInterval(function () {

                if (fnStartArr != null && typeof window[fnStartArr[0]] != 'undefined' && typeof window[fnStartArr[0]][fnStartArr[1]] != 'undefined') {
                    fnStart = window[fnStartArr[0]][fnStartArr[1]];
                } else {
                    fnStart = window[lookForFunctionNameBeforeStarting];
                }

                if (typeof fnStart == 'string' && (fnStart != "" && fnStart != null) && typeof gtm_razer_get != 'undefined') {
                    func();
                    clearInterval(gtm_interval_timer[timestamp]);
                    delete gtm_interval_timer[timestamp];
                } else if (typeof fnStart != 'undefined' && typeof gtm_razer_get != 'undefined') {
                    func();
                    clearInterval(gtm_interval_timer[timestamp]);
                    delete gtm_interval_timer[timestamp];
                }
            }, gtm_interval_set_time);

            setTimeout(function () {
                clearInterval(gtm_interval_timer[timestamp]);
                delete gtm_interval_timer[timestamp];
            }, gtm_interval_timeout);

        } else {
            return null;
        }

    };

    function gtm_dom_interval(func, domElement, lookForFunctionNameBeforeStarting, showlog, gtm_interval_timeout, gtm_interval_set_time) {

        if (typeof showlog == 'undefined') {
            showlog = false;
        }

        lookForFunctionNameBeforeStarting = lookForFunctionNameBeforeStarting || "gtm_function_x";
        gtm_interval_timeout = gtm_interval_timeout || 15000;
        gtm_interval_set_time = gtm_interval_set_time || 500;

        try {
            if (typeof domElement != 'undefined') {
                document.querySelector(domElement);
            } else {
                return null;
            }
        } catch (e) {
            return null;
        }

        if (typeof func == 'function' && typeof gtm_interval_timer != 'undefined' && typeof domElement == 'string') {
            var timestamp = new Date().getTime();
            timestamp = timestamp + "_" + (Math.floor(Math.random() * 1000000) + 1);

            if (showlog)
                console.info("Created gtm_interval_timer[" + timestamp + "]");

            var fnStart = null;
            var fnStartArr = null;
            if (lookForFunctionNameBeforeStarting.indexOf(":") != -1) {
                fnStartArr = lookForFunctionNameBeforeStarting.split(":");
            }

            gtm_interval_timer[timestamp] = setInterval(function () {

                if (fnStartArr != null && typeof window[fnStartArr[0]] != 'undefined' && typeof window[fnStartArr[0]][fnStartArr[1]] != 'undefined') {
                    fnStart = window[fnStartArr[0]][fnStartArr[1]];
                } else {
                    fnStart = window[lookForFunctionNameBeforeStarting];
                }

                if (typeof fnStart == 'string' && (fnStart != "" && fnStart != null) && typeof gtm_razer_get != 'undefined' && document.querySelector(domElement) != null) {
                    func();
                    clearInterval(gtm_interval_timer[timestamp]);
                    delete gtm_interval_timer[timestamp];
                } else if (typeof fnStart != 'undefined' && typeof gtm_razer_get != 'undefined' && document.querySelector(domElement) != null) {
                    func();
                    clearInterval(gtm_interval_timer[timestamp]);
                    delete gtm_interval_timer[timestamp];
                }
            }, gtm_interval_set_time);

            setTimeout(function () {
                clearInterval(gtm_interval_timer[timestamp]);
                delete gtm_interval_timer[timestamp];
            }, gtm_interval_timeout);

        } else {
            return null;
        }

    };

    function isInViewPort(element) {
        var bounding = element.getBoundingClientRect();
        if (
            bounding.top >= 0 &&
            bounding.left >= 0 &&
            bounding.right <= (window.innerWidth || document.documentElement.clientWidth) &&
            bounding.bottom <= (window.innerHeight || document.documentElement.clientHeight)) {
            return true;
        } else {
            return false;
        }
    };

    try {
        //Mutation Observer

        var gtm_razer_observer = new MutationObserver(function (mutation) {
            clearTimeout(gtm_razer_mutation_timer);
            gtm_razer_mutation_timer = setTimeout(function () {
                if (window.CustomEvent) {
                    var gtm_domChanged_event = new CustomEvent(
                            "domChanged", {
                        detail: {
                            time: new Date()
                        },
                        bubbles: true,
                        cancelable: true
                    });
                    if (gtm_razer_debug) {
                        console.info("domChanged");
                    }
                    document.dispatchEvent(gtm_domChanged_event);
                }
            }, 100);
        });

        gtm_razer_observer.observe(document.querySelector('body'), gtm_razer_mutation_observerConfig);

        //To Use
        // var gtm_give_me_a_proper_name = function(){ ... };
        //document.addEventListener("domChanged", gtm_give_me_a_proper_name , false);
        //document.removeEventListener("domChanged", gtm_give_me_a_proper_name);


        var create_gtm_position = function () {
            document.querySelectorAll("app-razer-dream").forEach(function (elm, idx) {
                elm.removeAttribute('data-gtm-promotion-index');
                elm.setAttribute('data-gtm-promotion-index', idx + 1)
            });

            //Add missing alt text in Image
            document.querySelectorAll("img:not([alt])").forEach(function (elm) {
                //var text = elm.getAttribute("src") || "";
                //text = text.substring(text.lastIndexOf('/') + 1, text.lastIndexOf('.') == -1 ? text.length : text.lastIndexOf('.')).replace(/[ \-_]+/g, ' ').trim();
                //elm.setAttribute("alt", text);
				elm.setAttribute("alt", "");
            });

            //Add missing label for button
            document.querySelectorAll("button:empty, button.glide__arrow").forEach(function (elm) {
                var text = elm.getAttribute("aria-label") || "";
                if (text == "") {
                    if (elm.classList.contains("glide__arrow--left")) {
                        elm.setAttribute("aria-label", "previous");
                    }
                    if (elm.classList.contains("glide__arrow--right")) {
                        elm.setAttribute("aria-label", "next");
                    }
                    if (elm.classList.contains("glide__bullet")) {
                        var glide_index = elm.getAttribute("data-glide-dir") || "=0";
                        glide_index = parseInt(glide_index.substr(1)) + 1;
                        elm.setAttribute("aria-label", "Go to slide " + glide_index);
                    }
                }
            });

            //Add missing label for input
/*             document.querySelectorAll("input[placeholder]").forEach(function (elm) {
                var text = elm.getAttribute("aria-label") || "";
                if (text == "") {
                    var placeholder = elm.getAttribute("placeholder") || "";
                    var eid = elm.getAttribute("id");
                    if (eid && document.querySelector("[for='" + eid + "']")) {
                        //do nothing
                    } else {
                        elm.setAttribute("aria-label", placeholder.trim());
                    }
                }
            }); */
            //Add missing label for select
/*             document.querySelectorAll("select:not([aria-label])").forEach(function (elm) {
                var text = elm.querySelector("option[disabled]");
                text = text?.innerText || elm.getAttribute("name") || elm.getAttribute("id");

                if (text != "") {
                    var eid = elm.getAttribute("id");
                    if (eid && document.querySelector("[for='" + eid + "']")) {
                        //do nothing
                    } else {
                        elm.setAttribute("aria-label", text.trim());
                    }
                }
            }); */
        }
        document.addEventListener("domChanged", create_gtm_position, false);
        create_gtm_position();

        var gtm_pageurlchanged = function () {
            if (typeof window.gtm_nowpage_url != 'undefined' && window.gtm_nowpage_url != location.pathname) {
                dataLayer.push({
                    'event' : 'PageURLChanged'
                });
                window.gtm_nowpage_url = location.pathname;
                ga360_product_category_is = categoryFromPathname(location.href);
            } else if (typeof window.gtm_nowpage_url != 'undefined' && window.gtm_nowpage_url == location.pathname) {
                window.gtm_nowpage_url = location.pathname;
            } else {
                window.gtm_nowpage_url = location.pathname;
            }
        }
        document.addEventListener("domChanged", gtm_pageurlchanged, false);
        gtm_pageurlchanged();

    } catch (e) {
        console.info("Error: 0._Common Functions = " + e);
    }
}
