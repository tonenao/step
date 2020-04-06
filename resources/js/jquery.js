$(function () {

    //画像ライブプレビュー
    var $dropArea = $('.area-drop');
    var $fileInput = $('.input-file');
    $dropArea.on('dragover', function (e) {
        e.stopPropagation();
        e.preventDefault();
        $(this).css('box-shadow', '0 0 10px 1px #666');
    });

    $dropArea.on('dragleave', function (e) {
        e.stopPropagation();
        e.preventDefault();
        $(this).css('box-shadow', 'none');
    });

    $fileInput.on('change', function (e) {
        $dropArea.css('box-shadow', 'none');
        var file = this.files[0],
            $img = $(this).siblings('.prev-img'),
            fileReader = new FileReader();

        // var orientation = 0;
        // EXIF.getData(file, function () {
        //     orientation = file.exifdata.Orientation;
        //     if (orientation === undefined) {
        //         orientation = 1;
        //     }
        // });

        fileReader.onload = function (event) {
            $img.attr('src', event.target.result).show();
        };

        fileReader.readAsDataURL(file);

    });


    //フラッシュメッセージ表示
    var $jsShowMsg = $('#js-show-msg');
    var msg = $jsShowMsg.text();
    if (msg.replace(/^[\s　]+[\s　]+$/g, "").length) {
        $jsShowMsg.slideToggle('slow');
        setTimeout(function () {
            $jsShowMsg.slideToggle('slow');
        }, 5000);
    }


    // フロートヘッダーメニュー
    var $title = $('.js-title');
    $(window).on('scroll', function () {

        var scr_count = $(document).scrollTop();

        if (scr_count > 200) {
            $title.addClass('title-reduce');
        } else {
            $title.removeClass('title-reduce');
        }


    });



    //ハンバーガーメニュー表示切り替え
    // SPメニュー
    $('.js-toggle-sp-menu').on('click', function () {
        $(this).toggleClass('active');
        $('.js-toggle-sp-menu-target').toggleClass('active');
    });


});
