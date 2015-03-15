$(function() {
	$('#post-form').submit(function() {
		alert('processing');
		$.post('dowallactions.php', {'action':'postMessage', 'username':$('#username').val(), 'message':$('#message').val()}, function(data) {
			alert('added');
		});

		return false;
	});
	$('#username').keydown(throttle(function() {
		$('#prompt').text('Checking username availability.');
		$.post('douseractions.php', {'action':'recommendUser', 'username':$(this).val()}, function(data) {
			if (data.recommend == '')
			{
				$('#prompt').text('Username is avaliable.');
			}
			else
			{
				$('#prompt').text('Recommended username: ' + data.recommend);
			}
		}, 'json');
	}));
});

function throttle(f, delay){
    var timer = null;
    return function(){
        var context = this, args = arguments;
        clearTimeout(timer);
        timer = window.setTimeout(function(){
            f.apply(context, args);
        },
        delay || 500);
    };
}

function getWall()
{
	$.post('dowallactioins.php', {''}, function(data) {

	}, 'json');
}