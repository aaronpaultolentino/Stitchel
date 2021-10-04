function url(uri){
	if(uri.split('')[0] != '/'){
		uri = '/' + uri
	}
	return $('[name="url"]').attr('content')+uri;
}