jQuery(document).ready(function($){

	var $notes_content = $('.contact_note_contents');

	$notes_content.on('change keyup paste', function(){

		var note_contents_field_id = $(this).attr('id');
		var note_user_field_id = note_contents_field_id.replace('_contents', '_user');
		var note_date_field_id = note_contents_field_id.replace('_contents', '_date');

		var $user_field = $('#' + note_user_field_id);
		var $date_field = $('#' + note_date_field_id);

		var current_user = $user_field.data('current-user');
		var current_date = $date_field.data('current-date');

		$user_field.val(current_user);
		$date_field.val(current_date);

	});

});