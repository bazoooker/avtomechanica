



$(document).ready(function(){



    // гамбургер-меню анимация кнопки
    $('.js-toggle-hamburger').click(function() {
        $(this).toggleClass('is-active');
    });




    // список категорий на главной
    $('.js-catalog-unit-hover').mouseenter(function() {
        if($(window).width() > 992) {
        // $('.js-catalog-unit-hover').addClass('disabled');
            $(this).addClass('active');
            console.log('more than 992');
        }
    });
    $('.js-catalog-unit-hover').mouseleave(function() {
        if($(window).width() > 992) {
            // $('.js-catalog-unit-hover').removeClass('disabled');
            $(this).removeClass('active');
            console.log('more than 992');
        }
    });



    // открытия и закрытия элементов =============================

    $('.js-open').click(function(){
        var targetName = $(this).data('open-target');                        
        var elementToOpen = $('#' + targetName);
        var isClosed = $(elementToOpen).hasClass('hidden');

        if(isClosed) {
            $(elementToOpen).removeClass('hidden');
        }else {
            $(elementToOpen).addClass('hidden');
        }        
    });

    $('.js-close').click(function(){
        var targetName = $(this).data('close-target');                        
        var elementToClose = $('#' + targetName); //id элемента, который нужно скрыть
        $(elementToClose).addClass('hidden');


        // иногда при закрытии модалки или аккордеона где-то на странице нужно поменять состояние другой кнопки
        // Нужно в html кнопки указать два параметра: 
        // 1. класс кнопки, у которой нужно убрать класс
        // 2. Класс, который нужно убрать
        // Например, при закрытии меню каталога, в html указываем, что нужно еще найти кнопку гамбургер-меню и деактивировать ее
        var elemToChange = $(this).data('change-elem'); //любой другой элемент, который нужно изменить при закрытии                        
        var elemToChangeClass = $(this).data('change-class'); // получаем класс, который нужно убрать у другого элемента/набора                        
        $('.' + elemToChange).removeClass(elemToChangeClass);
    });





    // слайдеры ==============================

    var swiperHero = new Swiper('.js-hero-slider', {
        spaceBetween: 20,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
    });

    var swiperPartners = new Swiper('.js-partners-slider', {
        slidesPerView: 1,
        spaceBetween: 100,
        loop: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        breakpoints: {
            375: {
              slidesPerView: 2,
            },
            568: {
              slidesPerView: 3,
            },
            992: {
              slidesPerView: 4,
            },
          }
    });

     var swiperAbout = new Swiper('.js-swiper-about', {
        // spaceBetween: 20,
        effect: 'fade',
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });

     var swiperSpecs = new Swiper('.js-specs-slider', {
        spaceBetween: 20,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
    });





    // кнопка наверх ================= 
    function showToTopButton() {
        if ( window.pageYOffset > 500 ) {
           $('.to-top').addClass('visible')
        }
        else {
            $('.to-top').removeClass('visible')
        }
    }; 

    function scrollToTop() {
      $("html, body").animate({ scrollTop: 0 }, "slow");
      return false;
    }; 
    
    $('.js-to-top').click(scrollToTop);
    $(window).scroll(showToTopButton); 

     


    $('.btn-hover-basket').click(function() {
        anime({
          targets: '.hover-handler-right',
          translateX: 250
        });
    });




        // range slider in filters
        // ionden.com/a/plugins/ion.rangeSlider/api.html

        $(".js-range-slider").ionRangeSlider({
            skin: "round",
            type: "double",
            min: 1000,
            max: 50000,
            from: 10000,
            to: 40000,
            hide_min_max: true,
            onChange: function(data) {
                $('#price-range-min').val(data.from);
                $('#price-range-max').val(data.to);
            }
        });

        // аккордеоны в фильтре
        $('.js-filter-accordeon').click(function() {
            var isOpened = $(this).parent().hasClass('active');
            console.log(isOpened);
            if(!isOpened) {
                $(this).parent().addClass('active').find('.filter-accordeon-content').slideDown(200);
            } else {
                $(this).parent().removeClass('active').find('.filter-accordeon-content').slideUp(200);

            }
        });

        // анимция чекбокса
        $('.js-anim-checkbox').click(function() {
            var decoElem = $(this).find('.state-deco');
            $(decoElem).addClass('active');
            setTimeout(function() {
                $(decoElem).removeClass('active');
            }, 300);
        });


        //sorting-icons-animations
        $('.js-sorting-icons-animations').click(function() {
            var az = $(this).hasClass('a-z');
            var za = $(this).hasClass('z-a');

            if(az) {
                $(this).removeClass('a-z').addClass('z-a');
            }
            if(za) {
                $(this).removeClass('z-a').addClass('a-z');
            }
        });

        $('.js-letters-in-name-sorting').click(function() {
            var az = $(this).hasClass('a-z');
            var za = $(this).hasClass('z-a');

            if(az) {
                $('#sorting-name-letters').html('А-Я');
            }
            if(za) {
                $('#sorting-name-letters').html('Я-А');
            }
        });


        $('.js-view-item-animaiton').click(function() {
            var self = $(this);
            $('.view-item').removeClass('active');
            $(self).addClass('active');

            $(self).addClass('theme-anim');
            setTimeout(function() {
                $(self).removeClass('theme-anim');
            }, 300);
        });





        $('.js-view-cards').click(function() {
           $('.catalog-list').removeClass('view-list').addClass('view-cards');
        });

        $('.js-view-list').click(function() {
           $('.catalog-list').removeClass('view-cards').addClass('view-list');

        });












        // $('select').niceSelect();





        // àíèìàöèÿ ñòðåëîê â êàðòî÷êå òîâàðà
        $('.product-controls__arrow-up, .product-controls__arrow-down').on('mousedown', function() {
            $(this).addClass('pressed');
        });
        $('.product-controls__arrow-up, .product-controls__arrow-down').on('mouseup', function() {
            $(this).removeClass('pressed');
        });







        // âñå òîâàðû - ñêðîëë äî ñåêöèè
        $("#scrollToFeatures").click(function() {
            $([document.documentElement, document.body]).animate({
                scrollTop: $("#scrollToFeatures").offset().top
            }, 600);
        });






        // ôóíêöèîíàë âíóòðè ìåíþ êàòàëîãà

        $('.js-show-product-category-list').on('click', function() {

            if ($( window ).width() > 768) { // Åñëè äåñêòîï, ïîêàçûâàåì ñîîòâåòñòâóþùóþ ïîäêàòåãîðèþ ñïðàâà
                var categoryID = $(this).attr('id');
                var categoryProdList = $('.product-category-list[data-id="'+categoryID+'"]');

                $('.product-category-list').removeClass('active');
                $(categoryProdList).addClass('active');

                $('.catalog-link__label').removeClass('active');
                $(this).addClass('active');
            } else { // Åñëè ìîáèëêà, ðàñêðûâàåì àêêîðäåîí

                if( !$(this).hasClass('active') ) {
                    $('.catalog-link__label').removeClass('active');
                    $(this).addClass('active');

                    $('.catalog-link .catalog-link__accordeon').slideUp(300);
                    $(this).parent().find('.catalog-link__accordeon').slideDown(300);
                }
            }

        });






        // îòêðûòèå êàòàëîãà - ðàçíûå âàðèàíòû

        $('.js-catalog-menu').on('click', function() {
            
            // if ($( window ).width() > 768) {
                var catalogBtnType = $(this).attr('id');


                if(catalogBtnType == 'catalog-menu-in-promo') { // ìåíþ ïîâåðõ ïðîìî-áëîêà
                    if( $('#catalog-menu').hasClass('active') ) {
                        $('#catalog-menu').removeClass('menu_catalog menu_sticky active');
                        $('.overlay_catalog-menu').hide();
                    }else {
                        $('#catalog-menu').addClass('menu_catalog active');
                        $('.overlay_catalog-menu').show();
                    }
                }

                if(catalogBtnType == 'catalog-menu-in-sticky-header') { // ìåíþ â ïðèëèïàþùåé øàïêå
                    if( $('#catalog-menu').hasClass('active') ) {
                        $('#catalog-menu').removeClass('menu_catalog menu_sticky active');
                        $('.page-wrapper').removeClass('no-scroll');
                    }else {
                        $('#catalog-menu').addClass('menu_sticky active');
                        $('.page-wrapper').addClass('no-scroll');
                    }
                }
            // } else { 
            //     if( $('.menu_full-screen').hasClass('active') ) {
            //         $('.menu_full-screen').removeClass('menu_catalog menu_sticky menu_mobile active');
            //         $('.page-wrapper').removeClass('no-scroll');
            //     }else {
            //         $('.menu_full-screen').addClass('menu_mobile active');
            //         $('.page-wrapper').addClass('no-scroll');
            //     }
            // }


            $('.overlay_catalog-menu').on('click', function() {
                $('.menu_full-screen').removeClass('menu_catalog menu_sticky active');
                $('.overlay_catalog-menu').hide();
            });
        });







        // îòêðûòèå è çàêðûòèå êîðçèíû

        $('.js-basket-controls').on('click', function() {
            if( !$('.basket').hasClass('active') ) {
                $('.basket').addClass('active');
                $('.overlay_basket').fadeIn(300);
                $('.page-wrapper').addClass('no-scroll');
            } else {
                $('.basket').removeClass('active');
                $('.overlay_basket').fadeOut(300);
                $('.page-wrapper').removeClass('no-scroll');
            }
        });





        // ìîáèëüíîå ìåíþ
        $('.js-open-mobile-menu').on('click', function() {

            if( !$('#mobile-menu').hasClass('active') ) {
                $('#mobile-menu').addClass('active');
                $('.page-wrapper').addClass('no-scroll');
            } else {
                $('#mobile-menu').removeClass('active');
                $('.page-wrapper').removeClass('no-scroll');
            }
        });






        // êðàñèâîå íàâåäåíèå íà ïàðòíåðîâ

        $('.partners').on('mouseenter', function() {
            $('.partners .partner-thumb').addClass('blurred');
        });
        $('.partners').on('mouseleave', function() {
            $('.partners .partner-thumb ').removeClass('blurred');
        });

        $('.partners .partner-thumb').on('mouseenter', function() {
            $(this).addClass('active');
        });
        $('.partners .partner-thumb').on('mouseleave', function() {
            $(this).removeClass('active');
        });






        // ñîðòèðîâêà òîâàðîâ
        $('.js-prod-sort').on('click', function() {
            $('.js-prod-sort').removeClass('active');
            $(this).addClass('active');
        });


        // âèä âûâîäà òîâàðîâ
        $('.js-prod-view').on('click', function() {
            $('.js-prod-view').removeClass('active');
            $(this).addClass('active');
        });

        $('.js-show-filters').on('click', function() {
            if(!$('.filters').hasClass('active')) {
                $('.filters').addClass('active');
                $('.overlay_filters').fadeIn(300);
            } else {
                $('.filters').removeClass('active');
                $('.overlay_filters').fadeOut(300);
            }
        });















// 2. ïîÿâëåíèÿ
// ==============

    // ôóíêöèÿ, êîòîðàÿ "ñîáèðàåò" ïåðâûé ñëàéä. Çàïóñêàåòñÿ ïîñëå ïðåëîàäåðà. Ñì. ïðåëîàäåð



    // function lookMa() {
    //     $('.hero').removeClass('up');
    //     $('.swiper-slide').find('.hero__slide-number, .hero__info h1, .hero__info p, .hero__info a, .hero__img').removeClass('up');
    // }

    // // øòîðêè
    // $(window).scroll(function() {
    //     $('.trigger').each(function() {
    //         if( $(this).visible(true) ) {  
    //             $(this).find('.hideme').addClass('hideme_visible');
    //             $(this).find('.zero').removeClass('zero_hidden');
    //             $(this).find('.bg-square').removeClass('bg-square_anim');
    //         }        
    //     });
    // });












        // function openMenu() {
        //     if ( !$('.menu').hasClass('menu_active') ) {
        //         $('.menu').addClass('menu_active');
        //         $('.menu .col-4').addClass('visible'); //àíèìàöèè ïîÿâëåíèÿ êîëîíîê
        //         $('body').addClass('no-scroll');
        //     } else {
        //         $('.menu').removeClass('menu_active');
        //         $('.menu .col-4').removeClass('visible');
        //         $('body').removeClass('no-scroll');
        //     }
        // }

        // $('.js-menu-controls').click(openMenu);


        // $(document).on( 'keydown', function ( e ) {
        //     if ( e.keyCode === 27 ) {
        //         if ( $('.menu').hasClass('menu_active') ) {
        //          openMenu();
        //         }
        //     }
        // });










// form labels----------------------------

    // remove floating if user
    $('.js-floating-label').each(function() {
        if($(this).val()!=""){
            $(this).parent().find('.signup-form-floating-placeholder').addClass('float');
        }
    });

    // floating on focus
    $('.js-floating-label').blur();
    $('.js-floating-label').on('focus', function() {
        $(this).parent().find('.signup-form-floating-placeholder').addClass('float');
    });
    $('.js-floating-label').on('blur', function() {
        if($(this).val()!=""){} else {
            $(this).parent().find('.signup-form-floating-placeholder').removeClass('float');
        };
    });







    function showStickyHeader() {
        if ( window.pageYOffset > 293 ) {
           $('.sticky-header').addClass('visible');
        }
        else {
            $('.sticky-header').removeClass('visible');
        }
    };

    $(window).scroll(showStickyHeader); 




    $(document).ready(function(){   


        $(".js-open-modal").on('click', function(){

            $('.modal').removeClass('modal_active');
            $('.overlay_modal').fadeOut(400);                          

            var modalName = $(this).data('target');                        
            var modal = $('#' + modalName);

            if( !$(modal).hasClass('modal_active') ) {
                $(modal).addClass('modal_active');
                $('.overlay_modal').fadeIn(400);                          
            } else {
                $(modal).removeClass('modal_active');                          
                $('.overlay_modal').fadeOut(400);                          
            }
        });

        $(".js-close-modal").on('click', function(){
            $('.modal').removeClass('modal_active');
            $('.overlay_modal').fadeOut(400);                          
        });

    });


    // îòïðàâêà êîëáåêà
    $(".modal form").on('submit', function(e){
            e.preventDefault();
            var modal = $(this).parents('.modal');
            var form = $(this);         
            $(this).ajaxSubmit({  
                url: "/ajax.php?file="+$(form).data('file'),
                data: $(form).serialize(),
                dataType: "JSON",
                type: "POST",
                success: function(data){
                    if(data.done) {
          $(modal).find('.modal-result').html(data.message);
          $(modal).find('.modal-result').show('fast')
          setTimeout("$('.modal-result').hide('fast')",1500);

          setTimeout("$('.modal').hide()",2000);
                      setTimeout("$('#overlay').hide()",2000);
          var f=$(modal).find('.modal-content-copy');
          var t=$(modal).find('.modal-content');
                      setTimeout("$('.modal').find('input, textarea').val('')",3000);
          
                    } else {
                        $(modal).find('.modal-errors').html(data.message);
        $(modal).find('.modal-errors').show('fast')
        setTimeout("$('.modal-errors').hide('fast')",1000);
                        $(modal).children(".spinner").hide();
                    }
                },
                complete: function(){
                    $(modal).children(".spinner").hide();                     
                }
            });
            return false;
        });





});

