$(function() {
	$count = 0;
	$('#post-form').submit(function() {
		$('#btn-post').text('Posting message...').prop('disabled', true);
		$.post('dowallactions.php', {'action':'postMessage', 'username':$('#username').val(), 'message':$('#message').val()}, function(data) {
			$('#btn-post').text('Submit').prop('disabled', false);
			getWall(0);
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
	$('#btn-more').click(function() {
		$count += 10;
		$('#btn-more').text('Loading More Posts...').prop('disabled', true);
		getWall($count);
	});

	getWall(0);
});

function clearForm()
{
	$('#username').val('');
	$('#message').text('');
}

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

function getWall($from)
{
	$.post('dowallactions.php', {'action':'getWall', 'from':$from}, function(data) {
		$('#wall-prompt').hide();
		$wall = data.wall;
		console.log($wall);
		generateWallContent($wall);
	}, 'json');
}

function generateWallContent($posts)
{
	$content = '';
	for ($i = 0; $i < $posts.length; $i++)
	{
		$content += $posts[$i]['username'] + '<br/>' + $posts[$i]['message'] + '<hr/>';
	}
	if ($posts.length == 0)
	{
		$content = '<h4>No posts to show.</h4>';
	}
	$('#wall-posts').html($('#wall-posts').html() + $content);
	$('#btn-more').text('More Posts').prop('disabled', false);
}