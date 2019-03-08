$('.to-modal').click(function(event){
				var result = '#' + $(this).data('id');
				$('.carousel-item').removeClass('active');
				$(result).addClass('active');
				$('.modal').show();
				$('.modal').addClass('modal-backdrop');
			});

			$('#ModalCenter').click(function(event) {
	        if(!$(event.target).closest('#carouselControls').length) {
	            $('.modal').hide();
	        }
});