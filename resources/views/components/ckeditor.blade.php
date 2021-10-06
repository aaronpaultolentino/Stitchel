<script src="https://cdn.ckeditor.com/ckeditor5/18.0.0/classic/ckeditor.js"></script>
<script type="text/javascript">

	ClassicEditor.create(document.querySelector( '#page_content' ), {
		ckfinder: {
			uploadUrl: '{{ route("ckeditor.upload") }}',
		},
		image: {
            toolbar: ['imageResizeButtons', 'imageResizeHandles' ]
        },
		'height': 500
	});
</script>