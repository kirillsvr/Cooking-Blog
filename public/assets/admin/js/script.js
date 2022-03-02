(function ($) {
    "use strict";
    $(document).on('click', function (e) {
        var outside_space = $(".outside");
        if (!outside_space.is(e.target) &&
            outside_space.has(e.target).length === 0) {
            $(".menu-to-be-close").removeClass("d-block");
            $('.menu-to-be-close').css('display', 'none');
        }
    })

    $('.prooduct-details-box .close').on('click', function (e) {
        var tets = $(this).parent().parent().parent().parent().addClass('d-none');
        console.log(tets);
    })



    if ($('.page-wrapper').hasClass('horizontal-wrapper')){

        $(".sidebar-list").hover(
            function () {
              $(this).addClass("hoverd");
            },
            function () {
              $(this).removeClass("hoverd");
            }
        );
        $(window).on('scroll', function () {
            if ($(this).scrollTop() < 600) {
                $(".sidebar-list").removeClass("hoverd");
            }
        });
      }

    /*----------------------------------------
     passward show hide
     ----------------------------------------*/
    $('.show-hide').show();
    $('.show-hide span').addClass('show');

    $('.show-hide span').click(function () {
        if ($(this).hasClass('show')) {
            $('input[name="login[password]"]').attr('type', 'text');
            $(this).removeClass('show');
        } else {
            $('input[name="login[password]"]').attr('type', 'password');
            $(this).addClass('show');
        }
    });
    $('form button[type="submit"]').on('click', function () {
        $('.show-hide span').addClass('show');
        $('.show-hide').parent().find('input[name="login[password]"]').attr('type', 'password');
    });

    /*=====================
      02. Background Image js
      ==========================*/
    $(".bg-center").parent().addClass('b-center');
    $(".bg-img-cover").parent().addClass('bg-size');
    $('.bg-img-cover').each(function () {
        var el = $(this),
            src = el.attr('src'),
            parent = el.parent();
        parent.css({
            'background-image': 'url(' + src + ')',
            'background-size': 'cover',
            'background-position': 'center',
            'display': 'block'
        });
        el.hide();
    });

    $(".mega-menu-container").css("display", "none");
    $(".header-search").click(function () {
        $(".search-full").addClass("open");
    });
    $(".close-search").click(function () {
        $(".search-full").removeClass("open");
        $("body").removeClass("offcanvas");
    });
    $(".mobile-toggle").click(function () {
        $(".nav-menus").toggleClass("open");
    });
    $(".mobile-toggle-left").click(function () {
        $(".left-header").toggleClass("open");
    });
    $(".bookmark-search").click(function () {
        $(".form-control-search").toggleClass("open");
    })
    $(".filter-toggle").click(function () {
        $(".product-sidebar").toggleClass("open");
    });
    $(".toggle-data").click(function () {
        $(".product-wrapper").toggleClass("sidebaron");
    });
    $(".form-control-search input").keyup(function (e) {
        if (e.target.value) {
            $(".page-wrapper").addClass("offcanvas-bookmark");
        } else {
            $(".page-wrapper").removeClass("offcanvas-bookmark");
        }
    });
    $(".search-full input").keyup(function (e) {
        console.log(e.target.value);
        if (e.target.value) {
            $("body").addClass("offcanvas");
        } else {
            $("body").removeClass("offcanvas");
        }
    });

    $('body').keydown(function (e) {
        if (e.keyCode == 27) {
            $('.search-full input').val('');
            $('.form-control-search input').val('');
            $('.page-wrapper').removeClass('offcanvas-bookmark');
            $('.search-full').removeClass('open');
            $('.search-form .form-control-search').removeClass('open');
            $("body").removeClass("offcanvas");
        }
    });
    $(".mode").on("click", function () {
        $('.mode i').toggleClass("fa-moon-o").toggleClass("fa-lightbulb-o");
        $('body').toggleClass("dark-only");
        var color = $(this).attr("data-attr");
        localStorage.setItem('body', 'dark-only');
    });

})(jQuery);

$('.loader-wrapper').fadeOut('slow', function () {
    $(this).remove();
});

$(window).on('scroll', function () {
    if ($(this).scrollTop() > 600) {
        $('.tap-top').fadeIn();
    } else {
        $('.tap-top').fadeOut();
    }
});



$('.tap-top').click(function () {
    $("html, body").animate({
        scrollTop: 0
    }, 600);
    return false;
});

function toggleFullScreen() {
    if ((document.fullScreenElement && document.fullScreenElement !== null) ||
        (!document.mozFullScreen && !document.webkitIsFullScreen)) {
        if (document.documentElement.requestFullScreen) {
            document.documentElement.requestFullScreen();
        } else if (document.documentElement.mozRequestFullScreen) {
            document.documentElement.mozRequestFullScreen();
        } else if (document.documentElement.webkitRequestFullScreen) {
            document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
        }
    } else {
        if (document.cancelFullScreen) {
            document.cancelFullScreen();
        } else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
        } else if (document.webkitCancelFullScreen) {
            document.webkitCancelFullScreen();
        }
    }
}
(function ($, window, document, undefined) {
    "use strict";
    var $ripple = $(".js-ripple");
    $ripple.on("click.ui.ripple", function (e) {
        var $this = $(this);
        var $offset = $this.parent().offset();
        var $circle = $this.find(".c-ripple__circle");
        var x = e.pageX - $offset.left;
        var y = e.pageY - $offset.top;
        $circle.css({
            top: y + "px",
            left: x + "px"
        });
        $this.addClass("is-active");
    });
    $ripple.on(
        "animationend webkitAnimationEnd oanimationend MSAnimationEnd",
        function (e) {
            $(this).removeClass("is-active");
        });


})(jQuery, window, document);


// active link

$(".chat-menu-icons .toogle-bar").click(function () {
    $(".chat-menu").toggleClass("show");
});


// Language
var tnum = 'en';

$(document).ready(function () {

    if (localStorage.getItem("primary") != null) {
        var primary_val = localStorage.getItem("primary");
        $("#ColorPicker1").val(primary_val);
        var secondary_val = localStorage.getItem("secondary");
        $("#ColorPicker2").val(secondary_val);
    }


    $(document).click(function (e) {
        $('.translate_wrapper, .more_lang').removeClass('active');
    });
    $('.translate_wrapper .current_lang').click(function (e) {
        e.stopPropagation();
        $(this).parent().toggleClass('active');

        setTimeout(function () {
            $('.more_lang').toggleClass('active');
        }, 5);
    });


    /*TRANSLATE*/
    // translate(tnum);
    //
    // $('.more_lang .lang').click(function () {
    //     $(this).addClass('selected').siblings().removeClass('selected');
    //     $('.more_lang').removeClass('active');
    //
    //     var i = $(this).find('i').attr('class');
    //     var lang = $(this).attr('data-value');
    //     var tnum = lang;
    //     // translate(tnum);
    //
    //     $('.current_lang .lang-txt').text(lang);
    //     $('.current_lang i').attr('class', i);
    //

    // });


// function translate(tnum) {
//     $('.lan-1').text(trans[0][tnum]);
//     $('.lan-2').text(trans[1][tnum]);
//     $('.lan-3').text(trans[2][tnum]);
//     $('.lan-4').text(trans[3][tnum]);
//     $('.lan-5').text(trans[4][tnum]);
//     $('.lan-6').text(trans[5][tnum]);
//     $('.lan-7').text(trans[6][tnum]);
//     $('.lan-8').text(trans[7][tnum]);
//     $('.lan-9').text(trans[8][tnum]);
// }

var trans = [{
        en: 'General',
        pt: 'Geral',
        es: 'Generalo',
        fr: 'GÃ©nÃ©rale',
        de: 'Generel',
        cn: 'ä¸€èˆ¬',
        ae: 'Ø­Ø¬Ù†Ø±Ø§Ù„ Ù„ÙˆØ§Ø¡'
    }, {
        en: 'Dashboards,widgets & layout.',
        pt: 'PainÃ©is, widgets e layout.',
        es: 'Paneloj, fenestraÄµoj kaj aranÄo.',
        fr: "Tableaux de bord, widgets et mise en page.",
        de: 'Dashboards, widgets en lay-out.',
        cn: 'ä»ªè¡¨æ¿ï¼Œå°å·¥å…·å’Œå¸ƒå±€ã€‚',
        ae: 'Ù„ÙˆØ­Ø§Øª Ø§Ù„Ù…Ø¹Ù„ÙˆÙ…Ø§Øª ÙˆØ§Ù„Ø£Ø¯ÙˆØ§Øª ÙˆØ§Ù„ØªØ®Ø·ÙŠØ·.'
    }, {
        en: 'Категории',
        pt: 'PainÃ©is',
        es: 'Paneloj',
        fr: 'Tableaux',
        de: 'Dashboards',
        cn: ' ä»ªè¡¨æ¿ ',
        ae: 'ÙˆØ­Ø§Øª Ø§Ù„Ù‚ÙŠØ§Ø¯Ø© '
    }, {
        en: 'Default',
        pt: 'PadrÃ£o',
        es: 'Vaikimisi',
        fr: 'DÃ©faut',
        de: 'Standaard',
        cn: 'é›»å­å•†å‹™',
        ae: 'ÙˆØ¥ÙØªØ±Ø§Ø¶ÙŠ'
    }, {
        en: 'Ecommerce',
        pt: 'ComÃ©rcio eletrÃ´nico',
        es: 'Komerco',
        fr: 'Commerce Ã©lectronique',
        de: 'E-commerce',
        cn: 'é›»å­å•†å‹™',
        ae: 'ÙˆØ§Ù„ØªØ¬Ø§Ø±Ø© Ø§Ù„Ø¥Ù„ÙƒØªØ±ÙˆÙ†ÙŠØ©'
    }, {
        en: 'Widgets',
        pt: 'Ferramenta',
        es: 'Vidin',
        fr: 'Widgets',
        de: 'Widgets',
        cn: 'å°éƒ¨ä»¶',
        ae: 'ÙˆØ§Ù„Ø­Ø§Ø¬ÙŠØ§Øª'
    }, {
        en: 'Page layout',
        pt: 'Layout da pÃ¡gina',
        es: 'PaÄa aranÄo',
        fr: 'Tableaux',
        de: 'Mise en page',
        cn: 'é é¢ä½ˆå±€',
        ae: 'ÙˆØªØ®Ø·ÙŠØ· Ø§Ù„ØµÙØ­Ø©'
    }, {
        en: 'Applications',
        pt: 'FormulÃ¡rios',
        es: 'Aplikoj',
        fr: 'Applications',
        de: 'Toepassingen',
        cn: 'æ‡‰ç”¨é ˜åŸŸ',
        ae: 'ÙˆØ§Ù„ØªØ·Ø¨ÙŠÙ‚Ø§Øª'
    }, {
        en: 'Ready to use Apps',
        pt: 'Pronto para usar aplicativos',
        es: 'Preta uzi Apps',
        fr: ' Applications prÃªtes Ã  lemploi ',
        de: 'Klaar om apps te gebruiken',
        cn: 'ä»ªè¡¨æ¿',
        ae: 'Ø¬Ø§Ù‡Ø² Ù„Ø§Ø³ØªØ®Ø¯Ø§Ù… Ø§Ù„ØªØ·Ø¨ÙŠÙ‚Ø§Øª'
    },

];

$(".mobile-title svg").click(function () {
    $(".header-mega").toggleClass("d-block");
});

$(".onhover-dropdown").on("click", function () {
    $(this).children('.onhover-show-div').toggleClass("active");
});

// if ($(window).width() <= 991) {
//     $(".left-header .link-section").children('ul').css('display', 'none');
//     $(this).parent().children('ul').toggleClass("d-block").slideToggle();
// }


// if ($(window).width() < 991) {
//     $('<div class="bg-overlay"></div>').appendTo($('body'));
//     $(".bg-overlay").on("click", function () {
//         $(".page-header").addClass("close_icon");
//         $(".sidebar-wrapper").addClass("close_icon");
//         $(this).removeClass("active");
//     });

//     $(".toggle-sidebar").on("click", function () {
//         $(".bg-overlay").addClass("active");
//     });
//     $(".back-btn").on("click", function () {
//         $(".bg-overlay").removeClass("active");
//     });
// }

$("#flip-btn").click(function(){
    $(".flip-card-inner").addClass("flipped")
});

$("#flip-back").click(function(){
    $(".flip-card-inner").removeClass("flipped")
});

$('.add-inputs').on('click', function () {
    var i = $('.more-da').data('int') + 1;
    $('.more-da').data('int', i);
   $('.more-da').append('<div class="row g-3 mb-2">\n' +
                            '<div class="col-md-6">\n' +
                                '<label class="form-label" for="prep_time">Ингредиент</label>\n' +
                                '<input class="form-control" id="prep_time" name="ing[' + i + '][title]" type="text" placeholder="City" required="">\n' +
                                '<div class="invalid-feedback">Please provide a valid city.</div>\n' +
                            '</div>\n' +
                            '<div class="col-md-5">\n' +
                                '<label class="form-label" for="cook_time">Количество</label>\n' +
                                '<input class="form-control" id="cook_time" name="ing[' + i + '][quantity]" type="text" placeholder="Zip" required="">\n' +
                                '<div class="invalid-feedback">Please select a valid state.</div>\n' +
                            '</div>\n' +
                            '<div class="col-md-1 d-flex align-items-center">\n' +
                                '<a href="javascript:void(0)" class="mt-3 ml-2 mx-auto delete-inputs"><i class="fa fa-times"></i></a>\n' +
                            '</div>\n' +
                        '</div>');
});

$('body').on('click', '.delete-inputs', function () {
   $(this).parent().parent().remove();
});


$('.add-step').on('click', function () {
    var i = $('.steps').data('int') + 1;
    $('.steps').data('int', i);
    $('.steps').append('<div class="row g-3 mb-2">\n' +
                            '<div class="col-md-6">\n' +
                                '<label class="form-label" for="step">Номер шага</label>\n' +
                                '<input class="form-control" id="step" name="steps[' + i + '][step]" type="text" placeholder="Zip" required="">\n' +
                                '<div class="invalid-feedback">Please select a valid state.</div>\n' +
                            '</div>\n' +
                            '<div class="col-md-6">\n' +
                                '<label class="col-sm-3 col-form-label">Upload File</label>\n' +
                                '<input class="form-control" type="file" name="steps[' + i + '][image]">\n' +
                            '</div>\n' +
                            '<div class="col-md-12">\n' +
                                '<label class="form-label" for="exampleFormControlTextarea4">Описание шага</label>\n' +
                                '<textarea class="form-control" name="steps[' + i + '][description]" id="exampleFormControlTextarea4" rows="3"></textarea>\n' +
                            '</div>\n' +
                        '</div>');
});


$('.category-filter').on('click', function (e){
    var data = $(this).data('value');
    if (data !== undefined){
        var url = location.search.replace(/category(.+?)(&|$)/g, '');
        var url = url.replace(/page(.+?)(&|$)/g, '');
        var urls = location.pathname.replace(/\/[0-9]{1,3}$/g, '');
        var newURL = urls + url + (location.search ? "&" : "?") + "category=" + data;
        newURL = newURL.replace('&&', '&');
        newURL = newURL.replace('?&', '?');
        history.pushState({}, '', newURL);
        location.reload();
    }else {
        var url = location.search.replace(/size(.+?)(&|$)/g, '');
        var url = url.replace(/size(.+?)(&|$)/g, '');
        var urls = location.pathname.replace(/\/[0-9]{1,3}$/g, '');
        var newURL = urls + url;
        newURL = newURL.replace('&&', '&');
        newURL = newURL.replace('?&', '?');
        newURL = newURL.replace('&?', '?');
        var slic = newURL.slice(-1);
        if (slic == '?' || slic == '&'){
            newURL = newURL.substring (0, newURL.length - 1);
        }
        history.pushState({}, '', newURL);
        location.reload();
    }
})


    $('.del-recipe').on('click', function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        var token = $('input[name=_token]').val();
        Swal.fire({
            title: 'Вы уверены что хотите удалить рецепт?',
            text: "Вы не сможете отменить это действие!",
            icon: 'Внимание',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Удалить',
            cancelButtonText: 'Отмена',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/admin/recipe/' + id,
                    method: 'POST',
                    data: {_token: token, _method: 'DELETE'},
                    success: function(data){
                        console.log(data);
                        Swal.fire("Deleted!", "Your file has been deleted.", "success");

                        function func1() {
                            $(location).attr('href', '/admin/recipe');
                        }

                        setTimeout(func1, 2000);
                    },
                    error: function(jqXHR, exception) {
                        Swal.fire({ title: "Waring", text: jqXHR['responseText'], icon: "error" });
                    }
                })
            }
        })
    });

    $('.delete-img-step').on('click', function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        var token = $('input[name=_token]').val();
        var url = location.href;
        Swal.fire({
            title: 'Вы уверены что хотите удалить изображение?',
            text: "Вы не сможете отменить это действие!",
            icon: 'Внимание',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Удалить',
            cancelButtonText: 'Отмена',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/admin/steps/' + id,
                    method: 'POST',
                    data: {_token: token, _method: 'DELETE'},
                    success: function(data){
                        console.log(data);
                        Swal.fire("Deleted!", "Your file has been deleted.", "success");

                        function func1() {
                            $(location).attr('href', url);
                        }

                        setTimeout(func1, 2000);
                    },
                    error: function(jqXHR, exception) {
                        Swal.fire({ title: "Waring", text: jqXHR['responseText'], icon: "error" });
                    }
                })
            }
        })
    });

    $('.delete-comments').on('click', function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        var token = $('input[name=_token]').val();
        var url = location.href;
        Swal.fire({
            title: 'Вы уверены что хотите удалить комментарий?',
            text: "Вы удалите все комментарии, которые являются ответом!",
            icon: 'Внимание',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Удалить',
            cancelButtonText: 'Отмена',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: {_token: token, _method: 'DELETE', id: id},
                    success: function(data){
                        console.log(data);
                        Swal.fire("Deleted!", "Your file has been deleted.", "success");

                        function func1() {
                            $(location).attr('href', url);
                        }

                        setTimeout(func1, 2000);
                    },
                    error: function(jqXHR, exception) {
                        Swal.fire({ title: "Waring", text: jqXHR['responseText'], icon: "error" });
                    }
                })
            }
        })
    });

    $('.switch-comments').change(function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        var token = $('input[name=_token]').val();
        var url = location.href;
        if($(this).prop('checked')) {
            Swal.fire({
                title: 'Вы уверены, что хотите опубликовать комментарий?',
                text: "Вы опубликуете все комментарии, которые являются ответом!",
                icon: 'Внимание',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Опубликовать',
                cancelButtonText: 'Отмена',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url + '/enable',
                        method: 'POST',
                        data: {_token: token, id: id},
                        success: function(data){
                            console.log(data);
                            Swal.fire("Deleted!", "Your file has been deleted.", "success");

                            function func1() {
                                $(location).attr('href', url);
                            }

                            setTimeout(func1, 2000);
                        },
                        error: function(jqXHR, exception) {
                            Swal.fire({ title: "Waring", text: jqXHR['responseText'], icon: "error" });
                        }
                    })
                }
            })
        }
        else {
            Swal.fire({
                title: 'Вы уверены, что хотите убрать комментарий из публикации?',
                text: "Вы уберете из публикации комментарии, которые являются ответом!",
                icon: 'Внимание',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Убрать',
                cancelButtonText: 'Отмена',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url + '/disable',
                        method: 'POST',
                        data: {_token: token, id: id},
                        success: function(data){
                            console.log(data);
                            Swal.fire("Deleted!", "Your file has been deleted.", "success");

                            function func1() {
                                $(location).attr('href', url);
                            }

                            setTimeout(func1, 2000);
                        },
                        error: function(jqXHR, exception) {
                            Swal.fire({ title: "Waring", text: jqXHR['responseText'], icon: "error" });
                        }
                    })
                }
            })
        }
    });

});
