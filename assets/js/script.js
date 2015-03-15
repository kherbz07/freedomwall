$(function() {
	$('#post-form').submit(function() {
		$.post('douseractions.php', {}, function(data) {

		}, 'json');

		return false;
	});
	$('#username').keydown(function() {
		$.post('douseractions.php', {'action'=>'recommendUser', 'username'=>$(this).val()}, function(data) {
			alert(data.valid);
		}, 'json');
	});
});