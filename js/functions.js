(function ($) {
    Drupal.behaviors.fonctions = {
        attach: function (context, settings) {

            $(context).find('body').once('load').each(function (index, element) {
                           tarteaucitron.init({
                    "privacyUrl": "", /* Privacy policy url */

                    "hashtag": "#tarteaucitron", /* Open the panel with this hashtag */
                    "cookieName": "tarteaucitron", /* Cookie name */

                    "orientation": "middle", /* Banner position (top - bottom) */ 

                    "showAlertSmall": false, /* Show the small banner on bottom right */
                    "cookieslist": false, /* Show the cookie list */

                    "showIcon": false, /* Show cookie icon to manage cookies */
                    "iconPosition": "BottomRight", /* BottomRight, BottomLeft, TopRight and TopLeft */

                    "adblocker": false, /* Show a Warning if an adblocker is detected */

                    "DenyAllCta": false, /* Show the deny all button */ 
                    "AcceptAllCta": true, /* Show the accept all button when highPrivacy on */
                    "highPrivacy": true, /* HIGHLY RECOMMANDED Disable auto consent */

                    "handleBrowserDNTRequest": false, /* If Do Not Track == 1, disallow all */

                    "removeCredit": true, /* Remove credit link */ 
                    "moreInfoLink": true, /* Show more info link */

                    "useExternalCss": false, /* If false, the tarteaucitron.css file will be loaded */
                    "useExternalJs": false, /* If false, the tarteaucitron.js file will be loaded */

                    //"cookieDomain": ".my-multisite-domaine.fr", /* Shared cookie for multisite */

                    "readmoreLink": "", /* Change the default readmore link */

                    "mandatory": true /* Show a message about mandatory cookies */
                });

                if (settings.cgl_analytics_ga) {
                    tarteaucitron.user.gajsUa = settings.cgl_analytics_ga;
                    tarteaucitron.user.gajsMore = function () { /* add here your optionnal _ga.push() */
                    };
                    (tarteaucitron.job = tarteaucitron.job || []).push('gajs');
                }

                if (settings.cgl_analytics_gtag) {
                    tarteaucitron.user.gtagUa = settings.cgl_analytics_gtag;
                    tarteaucitron.user.gtagMore = function () { /* add here your optionnal gtag() */
                    };
                    (tarteaucitron.job = tarteaucitron.job || []).push('gtag');
                }

                if (settings.cgl_pixel_fb) {
                    tarteaucitron.user.facebookpixelId = settings.cgl_pixel_fb;
                    tarteaucitron.user.facebookpixelMore = function () { /* add here your optionnal facebook pixel function */
                    };
                    (tarteaucitron.job = tarteaucitron.job || []).push('facebookpixel');
                } 
            });
        }
    };
})(jQuery);