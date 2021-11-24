$(function () {
    //аяксовая обработка форм. Локализация
    $('.admin-local-ajax').on('click',function (e) {
        e.preventDefault();
        var $form = $(this).closest("form");
        // tinyMCE.triggerSave();
        var rez = $form.find('.rezult');
        var areaId = $form.find('.hidden-id').val();
        var text1Val = $form.find('.text1-area').val();
        var text2Val = $form.find('.text2-area').val();
        var text3Val = $form.find('.text3-area').val();
        $.post('',{text1Val: text1Val, text2Val: text2Val, text3Val: text3Val, areaId: areaId, editLocalAjax: '1'},function (msg) {
            console.log(msg);
            if(msg == 1){
                rez.css('color','darkgreen').text(' - Success').fadeIn(10).fadeOut(3000);
            }
            if(msg == 0){
                rez.css('color','darkred').text(' - Error!').fadeIn(10).fadeOut(3000);
            }
        });
    });

    //tinymce required костыль должен записывать содержимое поля редактора в textarea перед сохранением
    $('button[type="submit"],input[type="submit"]').on('mouseover',function (e) {
        tinyMCE.triggerSave();
    });

    // $('#fileupload').fileupload({
    //     url: '/php/',
    //     maxChunkSize: 1000000, // 1 MB
    //     dataType: 'json',
    //     progressall: function (e, data) {
    //         var progress = parseInt(data.loaded / data.total * 100, 10);
    //         $('#progress .bar').css(
    //             'width',
    //             progress + '%'
    //         );
    //     },
    //     maxRetries: 100,
    //     retryTimeout: 500,
    //     fail: function (e, data) {
    //         // jQuery Widget Factory uses "namespace-widgetname" since version 1.10.0:
    //         var fu = $(this).data('blueimp-fileupload') || $(this).data('fileupload'),
    //             retries = data.context.data('retries') || 0,
    //             retry = function () {
    //                 $.getJSON('/php/', {file: data.files[0].name})
    //                     .done(function (result) {
    //                         var file = result.file;
    //                         data.uploadedBytes = file && file.size;
    //                         // clear the previous data:
    //                         data.data = null;
    //                         data.submit();
    //                     })
    //                     .fail(function () {
    //                         fu._trigger('fail', e, data);
    //                     });
    //             };
    //         if (data.errorThrown !== 'abort' &&
    //             data.uploadedBytes < data.files[0].size &&
    //             retries < fu.options.maxRetries) {
    //             retries += 1;
    //             data.context.data('retries', retries);
    //             window.setTimeout(retry, retries * fu.options.retryTimeout);
    //             return;
    //         }
    //         data.context.removeData('retries');
    //         $.blueimp.fileupload.prototype
    //             .options.fail.call(this, e, data);
    //     },
    //     done: function (e, data) {
    //         $.each(data.result.files, function (index, file) {
    //             $('<p/>').text(file.name).appendTo(document.body);
    //         });
    //     }
    // });


// фикс высоты
    var a = $(".main-header").outerHeight() + $(".main-footer").outerHeight(),
        b = $(window).height(),
        c = $(".sidebar").height();
    if(b >= c){
        $(".content-wrapper").css("min-height", b - a);
    }



//Подсветить строку в которой есть кнопка с классом highlight
//этот договор создали или редактировали последним
//     $('.highlight').parent().parent().css('background','#f6dfc4');

//Подсветить строку в которой есть кнопка с классом deleted
//этот договор был удален и отмечен как удаленный. Менеджеры его не увидят
//     $('.deleted').parent().parent().css('color','#f62524');



//вставка изображений в окно TinyMCE
    $('.img-box .img img').on('click',function () {
        var insertImg = $(this).attr('src');
        var str = '<img src="'+insertImg+'">&nbsp;';
        tinymce.activeEditor.execCommand('mceInsertContent', false, str);
        console.log(insertImg);
    });
//     $('.icon-box img').on('click',function () {
//         var insertImg = $(this).attr('src');
//         var str = "<img src='"+insertImg+"' alt='icon' align='left'>";
//         tinymce.activeEditor.execCommand('mceInsertContent', false, str);
//         //console.log(str);
//     });

// блок "загрузка изображений". удаление загруженных
/*
    $('.del').on('click',function () {
        var data = $(this).next().next().children().attr('src');
        $.ajax({
            type: "POST",
            url: "",
            data: { src: data },
            complete:(function( msg ) {
                location.reload();
            })
        });
    });
*/

//зарегистрированные пользователи. управление чекбоксами
/*
    $('#selAll').on('click',function () {
        $('input:checkbox').prop('checked',true);
    });
    $('#deSel').on('click',function () {
        $('input:checkbox').prop('checked',false);
    });
    $('#allCheck').on('click',function () {
        if ($('#allCheck').prop('checked')){
            $('input:checkbox').prop('checked',true);
        }else {
            $('input:checkbox').prop('checked',false);
        }
    });
*/

    //аяксовая обработка форм. Все формы с простым текстом
    $('.admin-ajax').on('click',function (e) {
        e.preventDefault();
        tinyMCE.triggerSave();
        var areaVal = $(this).siblings('.text-area').val();
        var areaId = $(this).siblings('.hidden-id').val();
        $.post('',{areaVal: areaVal, areaId: areaId, editTextAjax: '1'},function (msg) {
            console.log(msg);
            if(msg == 1){
                $('.rez').css('color','darkgreen').text(' - Success').fadeIn(10).fadeOut(3000);
            }
            if(msg == 0){
                $('.rez').css('color','darkred').text(' - Error!').fadeIn(10).fadeOut(3000);
            }
        });
    });

//Меню. Подсветка активных пунктов меню
    $('.sidebar-menu a').each(function () {
        if('https://'+window.location.hostname+$(this).attr('href') == window.location.href){
            $(this).parent().addClass('active');
        }
        if('http://'+window.location.hostname+$(this).attr('href') == window.location.href){
            $(this).parent().addClass('active');
        }
    });


    //верификация jquery.inputmask.bundle.min.js
    //https://github.com/RobinHerbots/Inputmask
    // $('input[name="pasport_s"]').inputmask("AA");
    // $('#LastName').inputmask({regex: "[а-яА-ЯіІїЇєЄ]*"});
    // $('#FirstName').inputmask({regex: "[а-яА-ЯіІїЇєЄ]*"});
    // $('#MiddleName').inputmask({regex: "[а-яА-ЯіІїЇєЄ]*"});
    // $('#RecipientNameFIO').inputmask({regex: "[а-яА-ЯіІїЇєЄ]*"});
    $('input[name="phone"]').inputmask({regex: "[0-9+]*"});
    $('input.phone').inputmask({regex: "[0-9+]*"});


//сортировка перетаскиванием
/*
    if($('.sortable').length>0){
        sortable('.sortable', {
            items: 'li' ,
            sort: true,  // sorting inside list
            handle: ".handle",  // Drag handle selector within list items
            // placeholder: '<li class="border-maroon">temp</li>',
            // placeholderClass: 'col-xs-4 border-maroon'
            forcePlaceholderSize:true

        });
        $('.sortable').each(function (index) {
            sortable('.sortable')[index].addEventListener('sortupdate', function(e) {
                console.log('-----------------');

                // console.log(e.detail);
                console.log( e.detail.origin.index );
                console.log(e.detail.destination.index );

                // console.log(e.detail.destination.items);
                if(e.detail.destination.items[e.detail.destination.index].nextElementSibling != null){
                    console.log('prevvious data sort ' + e.detail.destination.items[e.detail.destination.index].nextElementSibling.dataset.sort);
                    console.log('this id ' + e.detail.destination.items[e.detail.destination.index].dataset.id);
                    var id = e.detail.destination.items[e.detail.destination.index].dataset.id;
                    var sort = e.detail.destination.items[e.detail.destination.index].nextElementSibling.dataset.sort;
                    $.post('',{changeSortingUp: id, prev: sort},function (msg) {
                        console.log(msg);
                        if(msg == 'success'){
                            e.detail.destination.items[e.detail.destination.index].dataset.sort = sort - 0.01;
                        }
                    });
                }else{
                    console.log('prevvious data sort ' + e.detail.destination.items[e.detail.destination.index].previousElementSibling.dataset.sort);
                    console.log('this id ' + e.detail.destination.items[e.detail.destination.index].dataset.id);
                    var id = e.detail.destination.items[e.detail.destination.index].dataset.id;
                    var sort = e.detail.destination.items[e.detail.destination.index].previousElementSibling.dataset.sort;
                    $.post('',{changeSortingDown: id, next: sort},function (msg) {
                        console.log(msg);
                        if(msg == 'success'){
                            sort = sort - 0;
                            e.detail.destination.items[e.detail.destination.index].dataset.sort = sort + 0.01;
                        }
                    });
                }

            });
        });

    }
*/

});
