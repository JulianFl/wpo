<!doctype html>

<html lang="<?= site()->language() ? site()->language()->code() : 'de' ?>">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $site->title()->html() ?> | <?php if ($page == "home"): echo 'Home'; else: echo $page->title()->html(); endif; ?></title>


    <?php if($page->description() != ''): ?>
        <meta name="description" content="<?= $page->description()->html() ?>" />
    <?php else: ?>
        <meta name="description" content="<?= $site->description()->html() ?>" />
    <?php endif ?>

    <?php if($page->keywords() != ''): ?>
        <meta name="keywords" content="<?= $page->keywords()->html() ?>" />
    <?php else: ?>
        <meta name="keywords" content="<?= $site->keywords()->html() ?>" />
    <?php endif ?>
    <meta name="author" content="Julian Fleig">
    <meta name="robots" content="index, follow" />

    <!-- Analytics-->
    <!-- Analytics-->
    <!-- Analytics-->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-118128282-2"></script>
    <script type="text/javascript">
        var gaProperty = 'UA-115388787-3';
        var disableStr = 'ga-disable-' + gaProperty;
        if (document.cookie.indexOf(disableStr + '=true') > -1) {
            window[disableStr] = true;
        }
        function gaOptout() {
            document.cookie = disableStr + '=true; expires=Thu, 31 Dec 2099 23:59:59 UTC; path=/';
            window[disableStr] = true;
            alert('Das Tracking durch Google Analytics wurde in Ihrem Browser für diese Website deaktiviert.');
        }
    </script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-115388787-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-115388787-3');
    </script>


    <!-- Analytics-->
    <!-- Analytics-->
    <!-- Analytics-->

    <?= css('assets/css/swipebox.min.css') ?>

    <?= css('assets/css/focus.css') ?>

    <?= css('assets/css/bootstrap.min.css') ?>
    <?= css('assets/css/style.css') ?>



    <script>
        /*! hey, [be]Lazy.js - v1.6.0 - 2016.04.30 - patched for fucking iOS and async loading by g.kathan@teufels.com - A fast, small and dependency free lazy load script (https://github.com/dinbror/blazy) - (c) Bjoern Klinggaard - @bklinggaard - http://dinbror.dk/blazy */
        var hive_cfg_typoscript_sStage="development";
        ;(function(root, blazy) {
            if (typeof define === 'function' && define.amd) {
                // AMD. Register bLazy as an anonymous module
                define(blazy);
            } else if (typeof exports === 'object') {
                // Node. Does not work with strict CommonJS, but
                // only CommonJS-like environments that support module.exports,
                // like Node.
                module.exports = blazy();
            } else {
                // Browser globals. Register bLazy on window
                root.Blazy = blazy();
            }
        })(this, function() {
            'use strict';

            //private vars
            var source, viewport, isRetina, attrSrc = 'src',
                attrSrcset = 'srcset';

            // constructor
            return function Blazy(options) {

                if (hive_cfg_typoscript_sStage == "prototype" || hive_cfg_typoscript_sStage == "development") {
                    console.info('blazy :: constructor');
                }

                //IE7- fallback for missing querySelectorAll support
                if (!document.querySelectorAll) {
                    var s = document.createStyleSheet();
                    document.querySelectorAll = function(r, c, i, j, a) {
                        a = document.all, c = [], r = r.replace(/\[for\b/gi, '[htmlFor').split(',');
                        for (i = r.length; i--;) {
                            s.addRule(r[i], 'k:v');
                            for (j = a.length; j--;) a[j].currentStyle.k && c.push(a[j]);
                            s.removeRule(0);
                        }
                        return c;
                    };
                }

                //options and helper vars
                var scope = this;
                var util = scope._util = {};
                util.elements = [];
                util.destroyed = true;
                scope.options = options || {};
                scope.options.error = scope.options.error || false;
                scope.options.offset = scope.options.offset || 100;
                scope.options.success = scope.options.success || false;
                scope.options.selector = scope.options.selector || '.b-lazy';
                scope.options.separator = scope.options.separator || '|';
                scope.options.container = scope.options.container ? document.querySelectorAll(scope.options.container) : false;
                scope.options.errorClass = scope.options.errorClass || 'b-error';
                scope.options.breakpoints = scope.options.breakpoints || false; // obsolete
                scope.options.loadInvisible = scope.options.loadInvisible || false;
                scope.options.successClass = scope.options.successClass || 'b-loaded';
                scope.options.validateDelay = scope.options.validateDelay || 25;
                scope.options.saveViewportOffsetDelay = scope.options.saveViewportOffsetDelay || 50;
                scope.options.srcset = scope.options.srcset || 'data-srcset';
                scope.options.src = source = scope.options.src || 'data-src';
                isRetina = window.devicePixelRatio > 1;
                viewport = {};
                viewport.top = 0 - scope.options.offset;
                viewport.left = 0 - scope.options.offset;


                /* public functions
                 ************************************/
                scope.revalidate = function() {
                    initialize(this);
                };
                scope.load = function(elements, force) {
                    var opt = this.options;
                    if (elements.length === undefined) {
                        loadElement(elements, force, opt);
                    } else {
                        each(elements, function(element) {
                            loadElement(element, force, opt);
                        });
                    }
                };
                scope.destroy = function() {
                    var self = this;
                    var util = self._util;
                    if (self.options.container) {
                        each(self.options.container, function(object) {
                            unbindEvent(object, 'scroll', util.validateT);
                        });
                    }
                    unbindEvent(window, 'scroll', util.validateT);
                    unbindEvent(window, 'resize', util.validateT);
                    unbindEvent(window, 'resize', util.saveViewportOffsetT);
                    util.count = 0;
                    util.elements.length = 0;
                    util.destroyed = true;
                };

                //throttle, ensures that we don't call the functions too often
                util.validateT = throttle(function() {
                    validate(scope);
                }, scope.options.validateDelay, scope);
                util.saveViewportOffsetT = throttle(function() {
                    saveViewportOffset(scope.options.offset);
                }, scope.options.saveViewportOffsetDelay, scope);
                saveViewportOffset(scope.options.offset);

                //handle multi-served image src (obsolete)
                each(scope.options.breakpoints, function(object) {
                    if (object.width >= window.screen.width) {
                        source = object.src;
                        return false;
                    }
                });

                // start lazy load
                setTimeout(function() {
                    initialize(scope);
                }); // "dom ready" fix

            };


            /* Private helper functions
             ************************************/
            function initialize(self) {

                if (hive_cfg_typoscript_sStage == "prototype" || hive_cfg_typoscript_sStage == "development") {
                    console.info('blazy :: function initialize(self)');
                }

                var util = self._util;
                // First we create an array of elements to lazy load
                util.elements = toArray(self.options.selector);
                util.count = util.elements.length;

                if (hive_cfg_typoscript_sStage == "prototype" || hive_cfg_typoscript_sStage == "development") {
                    console.info('blazy :: ');
                    console.info(util.elements);
                    console.info('blazy :: ');
                }

                // Then we bind resize and scroll events if not already binded
                if (util.destroyed) {
                    util.destroyed = false;
                    if (self.options.container) {
                        each(self.options.container, function(object) {
                            bindEvent(object, 'scroll', util.validateT);
                        });
                    }
                    bindEvent(window, 'resize', util.saveViewportOffsetT);
                    bindEvent(window, 'resize', util.validateT);
                    bindEvent(window, 'scroll', util.validateT);
                }

                // And finally, we start to lazy load.
                validate(self);
            }

            function validate(self) {
                var util = self._util;
                for (var i = 0; i < util.count; i++) {
                    var element = util.elements[i];
                    if (elementInView(element) || hasClass(element, self.options.successClass)) {
                        self.load(element);
                        if (hasClass(element, self.options.successClass)) {
                            util.elements.splice(i, 1);
                            util.count--;
                            i--;
                        }
                    }
                }
                if (util.count === 0) {
                    self.destroy();
                }
            }

            function elementInView(ele) {
                var rect = ele.getBoundingClientRect();

                var body = document.getElementsByTagName("body")[0];
                if (hasClass(body, "bIOS-1")) {
                    var parentNode = ele.parentNode;
                    if (hasClass(parentNode, "focuspoint") || hasClass(parentNode, "focuhila") || hasClass(parentNode, "image")) {
                        rect = parentNode.getBoundingClientRect()
                    }
                }

                return (
                    // Intersection
                    rect.right >= viewport.left && rect.bottom >= viewport.top && rect.left <= viewport.right && rect.top <= viewport.bottom
                );
            }

            function loadElement(ele, force, options) {

                /*
                 * iOS fix
                 */
                var body = document.getElementsByTagName("body")[0];
                var parentElement = ele;
                if (hasClass(body, "bIOS-1")) {
                    var parentNode = ele.parentNode;
                    if (hasClass(parentNode, "focuspoint") || hasClass(parentNode, "focuhila") || hasClass(parentNode, "image")) {
                        parentElement = parentNode;
                    }
                }

                // if element is visible, not loaded or forced
                if (!hasClass(ele, options.successClass) && (force || options.loadInvisible || (parentElement.offsetWidth > 0 && parentElement.offsetHeight > 0))) {
                    var dataSrc = ele.getAttribute(source) || ele.getAttribute(options.src); // fallback to default 'data-src'
                    if (dataSrc) {
                        var dataSrcSplitted = dataSrc.split(options.separator);
                        var src = dataSrcSplitted[isRetina && dataSrcSplitted.length > 1 ? 1 : 0];
                        var isImage = equal(ele, 'img');
                        // Image or background image
                        if (isImage || ele.src === undefined) {
                            var img_blazy = new Image();
                            img_blazy.onerror = function() {
                                if (options.error) options.error(ele, "invalid");
                                addClass(ele, options.errorClass);
                            };
                            img_blazy.onload = function() {
                                // Is element an image
                                if (isImage) {
                                    if (hive_cfg_typoscript_sStage == "prototype" || hive_cfg_typoscript_sStage == "development") {
                                        console.info('blazy :: [begin]');
                                        console.info(ele);
                                    }
                                    handleSource(ele, attrSrc, options.src); //src
                                    handleSource(ele, attrSrcset, options.srcset); //srcset
                                    //picture element
                                    var parent = ele.parentNode;
                                    if (parent && equal(parent, 'picture')) {
                                        each(parent.getElementsByTagName('source'), function(source) {
                                            handleSource(source, attrSrcset, options.srcset);
                                        });
                                    }

                                    /**
                                     * Add initial height from parent
                                     */
                                    if (hasClass(parent, 'focuhila')) {
                                        if (hive_cfg_typoscript_sStage == "prototype" || hive_cfg_typoscript_sStage == "development") {
                                            console.info("Parent height: " + parent.clientHeight);
                                        }
                                        ele.style.height = parent.clientHeight + "px";
                                    }

                                    // or background-image
                                } else {
                                    ele.style.backgroundImage = 'url("' + src + '")';
                                }
                                itemLoaded(ele, options);
                                if (hive_cfg_typoscript_sStage == "prototype" || hive_cfg_typoscript_sStage == "development") {
                                    console.info('[end] :: blazy');
                                }

                            };
                            img_blazy.src = src; //preload
                        } else { // An item with src like iframe, unity, simpelvideo etc
                            handleSource(ele, attrSrc, options.src);
                            itemLoaded(ele, options);
                        }
                    } else {
                        // video with child source
                        if (equal(ele, 'video')) {
                            each(ele.getElementsByTagName('source'), function(source) {
                                handleSource(source, attrSrc, options.src);
                            });
                            ele.load();
                            itemLoaded(ele, options);
                        } else {
                            if (options.error) options.error(ele, "missing");
                            addClass(ele, options.errorClass);
                        }
                    }
                }
            }

            function itemLoaded(ele, options) {
                addClass(ele, options.successClass);
                if (options.success) options.success(ele);
                // cleanup markup, remove data source attributes
                each(options.breakpoints, function(object) {
                    ele.removeAttribute(object.src);
                });
            }

            function handleSource(ele, attr, dataAttr) {
                var dataSrc = ele.getAttribute(dataAttr);
                if (hive_cfg_typoscript_sStage == "prototype" || hive_cfg_typoscript_sStage == "development") {
                    console.info('blazy :: handleSource(ele, ' + attr +', ' + dataAttr +')');
                }
                if (dataSrc) {
                    ele[attr] = dataSrc;
                    ele.removeAttribute(dataAttr);
                }
            }

            function equal(ele, str) {
                return ele.nodeName.toLowerCase() === str;
            }

            function hasClass(ele, className) {
                return (' ' + ele.className + ' ').indexOf(' ' + className + ' ') !== -1;
            }

            function addClass(ele, className) {
                if (!hasClass(ele, className)) {
                    ele.className += ' ' + className;
                }
            }

            function toArray(selector) {
                var array = [];
                var nodelist = document.querySelectorAll(selector);
                for (var i = nodelist.length; i--; array.unshift(nodelist[i])) {}
                return array;
            }

            function saveViewportOffset(offset) {
                viewport.bottom = (window.innerHeight || document.documentElement.clientHeight) + offset;
                viewport.right = (window.innerWidth || document.documentElement.clientWidth) + offset;
            }

            function bindEvent(ele, type, fn) {
                if (ele.attachEvent) {
                    ele.attachEvent && ele.attachEvent('on' + type, fn);
                } else {
                    ele.addEventListener(type, fn, false);
                }
            }

            function unbindEvent(ele, type, fn) {
                if (ele.detachEvent) {
                    ele.detachEvent && ele.detachEvent('on' + type, fn);
                } else {
                    ele.removeEventListener(type, fn, false);
                }
            }

            function each(object, fn) {
                if (object && fn) {
                    var l = object.length;
                    for (var i = 0; i < l && fn(object[i], i) !== false; i++) {}
                }
            }

            function throttle(fn, minDelay, scope) {
                var lastCall = 0;
                return function() {
                    var now = +new Date();
                    if (now - lastCall < minDelay) {
                        return;
                    }
                    lastCall = now;
                    fn.apply(scope, arguments);
                };
            }

        });

        var bLazy;
        var hive_thm_blazy__interval = setInterval(function () {
            if (typeof hive_cfg_typoscript__windowLoad == 'undefined') {
            } else {
                clearInterval(hive_thm_blazy__interval);
                if (hive_cfg_typoscript_sStage == "prototype" || hive_cfg_typoscript_sStage == "development") {
                    console.info('blazy initialize');
                }
                bLazy = new Blazy({src: 'data-echo', offset: 0, successClass: 'fadeIn'});
            }
        }, 250);
    </script>


    <!-- ios hover fix-->
        <script>document.addEventListener("touchstart", function(){}, true);</script>


    <link rel="icon" type="image/png" href="<?=$site->image('logo.png')->url();?>">

    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js"></script>
    <script>
        window.addEventListener("load", function(){
            window.cookieconsent.initialise({
                "palette": {
                    "popup": {
                        "background": "#000"
                    },
                    "button": {
                        "background": "#0A246A"
                    }
                },
                "theme": "classic",
                "position": "bottom-right",
                "content": {
                    "message": "Diese Website verwendet Cookies, um sicherzustellen, dass Sie die beste Erfahrung auf unserer Website erhalten",
                    "dismiss": "Okay!",
                    "link": "mehr"
                }
            })});
    </script>
    <script type="text/javascript" src="//www.fussball.de/static/layout/fbde2/egm//js/widget2.js">
    </script>
    <link href="//fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <?php
    require_once 'Mobile_Detect.php';?>
</head>
<body class="page-<?= $page->uid() ?>">

<?php snippet('menu') ?>
