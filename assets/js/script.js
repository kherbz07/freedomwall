$(function() {
	$('#post-form').submit(function() {
		$.post('', {}, function(data) {
			
		}, 'json');

		return false;
	});
});