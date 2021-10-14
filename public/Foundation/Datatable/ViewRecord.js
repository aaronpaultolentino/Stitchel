$(document).ready(function(){
	$('body').on('click', '.eventleap-datatable table tbody tr', function(event){
		var $target = $(event.target);
		if($(this).find('.dataTables_empty').length > 0){
			return;
		}
		
	  	if(!$target.closest('.dropdown').length && !$target.closest('.updateCheckinStatus').length  && !$target.closest('a').length && !$target.closest('.tableLink').length && !$target.closest('.custom-checkbox').length){
	  		let href = $(this).find('.datatable-edit-record').attr('href');

			window.location = href;
	  	}
	});
});