var addFile = $(".add-file");


$(addFile).click(function(){
	//登録中のファイル数をカウント(消したものも含む)
	var num = $('.input-file').length;
	var content = '<div class="d-flex align-items-center input-file-box"><input type="file" name="data[Attachment][' + num + '][photo]" class="input-file mb-1" multiple="multiple"><i class="fas fa-times-circle text-secondary file-delete cur-po"></i></div>';
	$('.add-file').before(content);
});

//ファイル削除
$('.input-files').on('click', '.file-delete', function() {

	//行数取得
	var num = $('.input-file').length;

	//一行を見えなくする
	$(this).closest('.input-file-box').remove();


	if (num === 1){
		var content = '<div class="d-flex align-items-center input-file-box"><input type="file" name="data[Attachment][0][photo]" class="input-file mb-1" multiple="multiple"><i class="fas fa-times-circle text-secondary file-delete cur-po"></i></div>';
	    $('.add-file').before(content);
	}

		var num = $('.input-file').length;
		for(var i = 0; i < num; i++){
			name = 'data[Attachment][' + i + '][photo]';
			$('.input-files .input-file').eq(i).attr('name', name);
		}

});

