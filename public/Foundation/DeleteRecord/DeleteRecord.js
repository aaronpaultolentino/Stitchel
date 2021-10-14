let DeleteRecord = {
	data_url: '',
	init: function(containerID, callback){
		let self = this;

		//Open confirmation modal
		$('#'+containerID).on('click', '.delete-record-modal', function(){
			let data_url = $(this).data('delete-url');

			$('#deleteRecordModal').modal('show');
			self.data_url = data_url;
		});

		$('#delete-confirm-deletion').click(function(){
			$.ajax({
	            'url'    : self.data_url,
	            'method' : 'DELETE',
	            'data'   : {
	                '_token' : token()
	            }
	        })
	        .done(function(){
	        	$('#deleteRecordModal').modal('hide');
	        	snackAlert('Record has been deleted!');

	        	if(typeof callback == 'function'){
	        		callback();
	        	}
	        });
		});
	},
}