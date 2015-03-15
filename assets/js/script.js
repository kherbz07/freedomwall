$(function() {
	$count = 0;
	$isValid = true;
	$('#post-form').submit(function() {
		if ($isValid)
		{
			if ($('#username').val() != '' && $('#message').val() != '')
			{
				$('#btn-post').text('Posting message...').prop('disabled', true);
				$.post('dowallactions.php', {'action':'postMessage', 'username':$('#username').val(), 'message':$('#message').val()}, function(data) {
					$('#btn-post').text('Submit').prop('disabled', false);
					clearForm();
					$('#wall-posts').html('');
					getWall(0);
				});
			}
			else
			{
				alert('Please fill in all necessary fields.');
			}
		}
		else
		{
			alert('Username contains special characters.');
		}

		return false;
	});
	$('#username').keydown(throttle(function() {
		$('#prompt').text('Checking username availability.');
		if(/^[a-zA-Z0-9- ]*$/.test($(this).val()) == false) {
		    $('#prompt').text('Username contains special characters.');
			$isValid = false;
		} else {
			$isValid = true;
			$.post('douseractions.php', {'action':'recommendUser', 'username':$(this).val()}, function(data) {
				if (data.recommend == '')
				{
					$('#prompt').text('Username is avaliable.');
				}
				else
				{
					$('#prompt').text('Recommended username: ' + data.recommend);
				}
				if ($('#username').val() == '')
				{
					$('#prompt').text('');
				}
			}, 'json');
		}
	}));
	$('#btn-more').click(function() {
		$count += 10;
		$('#btn-more').text('Loading More Posts...').prop('disabled', true);
		getWall($count);
	});
	$('#btn-search').click(function() {
		if ($('#search-un').val() != '')
		{
			searchUsername();
		}
		else
		{
			alert('Please fill in the username to search.');
		}
	});
	$('#search-form').submit(function() {
		return false;
	});

	getWall(0);
});

function clearForm()
{
	$('#username').val('');
	$('#message').val('');
	$('#prompt').text('');
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

function searchUsername()
{
	$.post('dowallactions.php', {'action':'getPost', 'username':$('#search-un').val()}, function(data) {
		$wall = data.wall;
		$('#wall-posts').html('');
		generateWallContent($wall);
	}, 'json');
}

function getWall($from)
{
	$('#modal-alert').show();
	$.post('dowallactions.php', {'action':'getWall', 'from':$from}, function(data) {
		$('#load-prompt').hide();
		$('#modal-alert').hide();
		$wall = data.wall;
		generateWallContent($wall);
	}, 'json');
}

function generateWallContent($posts)
{
	$content = '';
	for ($i = 0; $i < $posts.length; $i++)
	{
		$content += '<div class="sp-cntr">';
		$content += '<img alt="pic" src="../assets/img/user.png" height="50px" />' + 
					'<label class="wall-username">' +
					 $posts[$i]['username'] +
					 '</label>' + '<br/>' + 
					 '<label class="wall-msg">' + 
					 $posts[$i]['message'] + 
					 '</label>';
		$content += '</div>';
	}
	if ($posts.length == 0)
	{
		$content = '<h4>No posts to show.</h4>';
	}
	$('#wall-posts').html($('#wall-posts').html() + $content);
	$('#btn-more').text('More Posts').prop('disabled', false);
}