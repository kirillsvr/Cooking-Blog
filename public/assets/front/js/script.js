(function ($) {
    $(document).on('click', '.comment-reply-link', function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        var name = $(this).data('name');
        $('.delete-response').remove();
        $('.respond-title').append('<a href="javascript:void(0)" class="delete-response">Удалить</a>');
        $('input[name=parent]').val(id);
        $("#title-comments-form").html('Ответ пользователю ' + name);
        $('html, body').animate({
            scrollTop: $(".comment-respond").offset().top
        }, 1000);
    })

    $(document).on('click', '.delete-response', function (e) {
        $("#title-comments-form").html('Оставить комментарий');
        $('.delete-response').remove();
        $('input[name=parent]').val(null);
    })


    $('.register-without-pass').on('submit', function (e) {
        e.preventDefault();
        var data = $( this ).serialize();
        var url = $(this).attr('action');
        var th = $(this);
        $.ajax({
            url: url,
            method: 'POST',
            data: data,
            success: function(data){
                console.log(data);
                th.trigger('reset');
                Swal.fire("Deleted!", "Your file has been deleted.", "success");

                // function func1() {
                //     $(location).attr('href', url);
                // }
                //
                // setTimeout(func1, 2000);
            },
            error: function(jqXHR, exception) {
                Swal.fire({ title: "Waring", text: jqXHR.responseJSON.message, icon: "error" });
            }
        })
    });

    $('body').on('submit', '.comment-form', function (e) {
        e.preventDefault();
        var data = $( this ).serialize();
        var url = $(this).attr('action');
        var th = $(this);
        var error = true;
        if ($(this).find('textarea[name=comment]').val() == ''){
            error = false;
            Swal.fire({ title: "Ошибка", text: 'Незаполнено поле комментарий', icon: "error" });
        }
        if (error == true){
            $.ajax({
                url: url,
                method: 'POST',
                data: data,
                success: function(data){
                    th.trigger('reset');
                    Swal.fire("Комментарий отправлен!", "После прохождения модерации ваш комментарий будет опубликован.", "success");
                },
                error: function(jqXHR, exception) {
                    console.log(jqXHR);
                    console.log(exception);
                    Swal.fire({ title: "Ошибка", text: jqXHR.responseJSON.message, icon: "error" });
                }
            })
        }
    });

    $('.one').each(function(index, el) {
        var $El = $(el);
        $El.barrating('show', {
            initialRating: $El.data('raiting'),
            theme: 'fontawesome-stars',
            showSelectedRating: false,
            onSelect: function(value, text, event) {
                $.ajax({
                    url: '/raiting/' + text,
                    method: 'get',
                    data: {value: value},
                    success: function(data){
                        Swal.fire("Успешно!", "Ваша оценка сохранена", "success");
                    },
                    error: function(jqXHR, exception) {
                        Swal.fire({ title: "Ошибка", text: jqXHR['responseJSON'], icon: "error" });
                    }
                })
            }
        });
    });

    $('.contact-page').on('submit', function (e) {
        e.preventDefault();
        var status = true;
        var data = {};
        $('.contact-page').find ('input, textarea').each(function() {
            if (this.value == ''){
                status = false;
                Swal.fire({ title: "Ошибка", text: 'Незаполнены обязательные поля', icon: "error" });
                return false;
            }
            data[this.name] = $(this).val();
        });
        var url = $(this).attr('action');
        var th = $(this);
        if (status == true){
            $.ajax({
                url: url,
                method: 'POST',
                data: data,
                success: function(data){
                    th.trigger('reset');
                    Swal.fire("Ваше сообщение отправлено!", "Мы ответим вам в самое ближайшее время.", "success");
                },
                error: function(jqXHR, exception) {
                    console.log(jqXHR);
                    console.log(exception);
                    Swal.fire({ title: "Ошибка", text: jqXHR.responseJSON.message, icon: "error" });
                }
            })
        }
    });
}(jQuery));

(function() {
    'use strict';
    window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('needs-validation');
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();

var options = {
    url: function(phrase) {
        return "/blog/live-search?search=" + phrase;
    },

    getValue: "title",

    requestDelay: 500,

    list: {
        match: {
            enabled: true
        },
        maxNumberOfElements: 8
    },

    template: {
        type: "custom",
        method: function(value, item) {
            return "<a href='/article/" + item.slug + "'>" + value + "</a>";
        }
    },

    theme: "square"

};

$("#square").easyAutocomplete(options);

