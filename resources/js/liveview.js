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
});
