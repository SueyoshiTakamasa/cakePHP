$(".dropdownMenuButton").click(function(){
	$(this).next('.dropdown-menu').toggleClass('d-none');
});

// $(document).on('click', function(e) {
//   if (!$(e.target).closest('.dropdown-menu').length) {
//     $('.dropdown-menu').addClass('d-none');
//   }
// });