var addFile = $(".add-file");

$(addFile).click(function(){
	var num = $('.input-file').length;
	var content = '<div><input type="file" name="data[Attachment][' + num + '][photo]" class="input-file mb-1" multiple="multiple"></div>';
	$('.add-file').before(content);
});