/**
 * Load avatar and display
 */
$('#load-avatar').change(function(){
	event.preventDefault();
	var output = $('#output')[0];
    output.src = URL.createObjectURL(event.target.files[0]);
})

/**
 * Change type password to type text                                                                       [description]
 */
$('#show-password').on('change', function(){
	$('#old-password').attr('type',$('#show-password').prop('checked') == true ? "text":"password");
    $('#reset-password').attr('type',$('#show-password').prop('checked') == true ? "text":"password");
});