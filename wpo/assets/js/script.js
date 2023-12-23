

$( '.swipebox' ).swipebox();

/*E-Mail*/
    /*lightbox*/
var UD_ACTIVE_IMG;
var UD_IMG_URL;

// Create Lightbox

$(".mannschaft").append(
    '<div id="ud_lightbox_overlay"><div id="ud_lightbox_inhalt"><div id="ud_nav"><span class="icon-cancel">X</span></div><img /></div></div>'
);
$(".headerlight").append(
    '<div id="ud_lightbox_overlay"><div id="ud_lightbox_inhalt"><div id="ud_nav"><span class="icon-cancel">X</span></div><img /></div></div>'
);
// OPEN & CLOSE LIGHTBOX

$(".ud_gallery img")
    .stop()
    .click(function() {
        UD_IMG_URL = $(this).attr("src");

        $("#ud_lightbox_overlay #ud_lightbox_inhalt img").attr(
            "src",
            UD_IMG_URL
        );
        $("#ud_lightbox_overlay").css("display","flex");

        UD_ACTIVE_IMG = $(this);
    });

$(".icon-cancel")
    .stop()
    .click(function() {
        $("#ud_lightbox_overlay").fadeOut(500);
    });



/*burgermenu*/
    var UD_MENU_OPEN = false;

    $('.ud_menu_icon').stop().click(function menu() {

        if (UD_MENU_OPEN === false) {
            UD_MENU_OPEN = true;
            $('.ud_menu_icon').addClass('is-active');

            if (window.matchMedia('(max-width: 769px)').matches) {
                $('.mobile-nav').css('display', 'block');

            } else {
                $('.burgermenu').addClass('is-active');


            }


            $('.burgermenu a' && '.mobile-nav a').click(function () {
                UD_MENU_OPEN = false;

                $('.ud_menu_icon').removeClass('is-active');
                if (window.matchMedia('(max-width: 769px)').matches) {
                    $('.mobile-nav').css('display', 'none');
                    $('.mobile-nav').css('transition', '500 ms all');
                    $('.burgermenu').removeClass('is-active');


                } else {
                    $('.burgermenu').removeClass('is-active');
                    $('.mobile-nav').css('display', 'none');

                }


            })

        } else {
            UD_MENU_OPEN = false;
            $('.ud_menu_icon').removeClass('is-active');


            if (window.matchMedia('(max-width: 769px)').matches) {
                $('.mobile-nav').css('display', 'none');
                $('.mobile-nav').css('transition', '500 ms all');
                $('.burgermenu').removeClass('is-active');

            } else {
                $('.burgermenu').removeClass('is-active');
                $('.burgermenu').css('transition', '500 ms all');
                $('.mobile-nav').css('display', 'none');

            }
        }

    });

/*smooth scroll*/
$(function(){
    $('.smooth').stop().click(function(){
        if (location.pathname.replace(/^\//,'')=== this.pathname.replace(/^\//,'') && location.hostname===this.hostname){
            var UD_HASH= this.hash;
            var UD_ZIEL=$(this.hash);
            if(UD_ZIEL.length){
                var UD_ABSTAND_TOP = UD_ZIEL.offset().top;
                UD_ABSTAND_TOP= UD_ABSTAND_TOP;
                $('html,body').animate({scrollTop:UD_ABSTAND_TOP},1000,function () {
                    window.location.hash=UD_HASH;
                });
                return false;
            }
        }
    });
});



$(document).ready(function() {




    var UD_MENU_ELEMENTS = $(' .anker-nav .smooth');

    var UD_AKTUELL = 0;
    var UD_OBJEKT_TOP;

    var UD_OBJEKT = $(UD_MENU_ELEMENTS[0]);
    UD_OBJEKT.addClass('ud_menu_aktive');

    $(window).scroll(function(){

        for(var i = 0; i < UD_MENU_ELEMENTS.length;i++) {

            var UD_LINK = $(UD_MENU_ELEMENTS[i]).attr('href');

            if($(UD_LINK).length){
                UD_OBJEKT_TOP = $(UD_LINK).offset().top;
            }

            var UD_SCROLL_TOP = $(window).scrollTop();
            var UD_DIF = Math.abs(UD_SCROLL_TOP - UD_OBJEKT_TOP);

            if(i === 0) {
                UD_AKTUELL = UD_DIF;
                UD_OBJEKT = $(UD_MENU_ELEMENTS[i]);
                $('.anker-nav .smooth').removeClass('ud_menu_aktive');
                UD_OBJEKT.addClass('ud_menu_aktive');
            } else {
                if(UD_DIF < UD_AKTUELL || UD_DIF === UD_AKTUELL) {
                    UD_AKTUELL = UD_DIF;
                    UD_OBJEKT = $(UD_MENU_ELEMENTS[i]);
                    $(' .anker-nav .smooth').removeClass('ud_menu_aktive');
                    UD_OBJEKT.addClass('ud_menu_aktive');
                }
            }
        }
    });

});



var a = 0;
$(window).scroll(function() {

    var oTop = $('#counter').offset().top - window.innerHeight;
    if (a == 0 && $(window).scrollTop() > oTop) {
        $('.counter-value').each(function() {
            var $this = $(this),
              countTo = $this.attr('data-count');
            $({
                countNum: $this.text(),
            }).animate({
                  countNum: countTo,
              },

              {

                  duration: 2000,
                  easing: 'swing',
                  step: function() {
                      $this.text(Math.floor(this.countNum));
                  },
                  complete: function() {
                      $this.text(this.countNum);
                      //alert('finished');
                  },

              });
        });
        a = 1;
    }

});