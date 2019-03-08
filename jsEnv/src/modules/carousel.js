//スライダーに用意された画像の数を取得
var size = $('#carouselControls .carousel-item').length;

//左矢印ボタンを押したら
$('#carouselControls .carousel-control-prev').click(function () {
    var activeItem = "#carouselControls .active";
    var preActive = $(activeItem).prev(".carousel-item");
    if ($(preActive).attr('class') == 'carousel-item') {
        $(activeItem).removeClass('active');
        $(preActive).addClass('active');
    }
});

//左矢印ボタンを押したら
$('#carouselControls .carousel-control-next').click(function () {
    var activeItem = "#carouselControls .active";
    var preActive = $(activeItem).next(".carousel-item");
    if ($(preActive).attr('class') == 'carousel-item') {
        $(activeItem).removeClass('active');
        $(preActive).addClass('active');
    }
});