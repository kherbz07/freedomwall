<div class="container input-cntr">
	<div class="row">
		<div class="col-md-12 post-cntr">
			<form id="post-form">
			  <div class="form-group">
			    <label for="exampleInputEmail1">Message</label>
			    <input type="text" class="form-control" id="message" placeholder="What do you want to post?" required>
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Username</label>
			    <input type="text" class="form-control" id="username" placeholder="Username" autocomplete="off" required>
			    <label for="prompt" id="prompt"></label>
			  </div>
			  <button type="submit" id="btn-post" class="btn btn-primary btn-post">Submit</button>
			</form>
		</div>
	</div>
</div>
<div class="container wall-cntr">
		<div class="search-cntr">
			<form class="form-inline" id="search-form" class="search-cntr">
			  <div class="form-group">
			    <label class="sr-only" for="exampleInputEmail3">Email address</label>
			    <input type="text" class="form-control" id="search-un" placeholder="Search Username">
			  </div>
			  <button type="submit" id="btn-search" class="btn btn-search btn-danger">Search</button>
			</form>
		</div>
	<h3 class="wall-header">
		Wall Posts
	</h3>
	<div id="wall-posts">
		<h4 class="tacenter" id="load-prompt">Loading Posts...</h4>
	</div>
	<h4 id="btn-more" class="btn-more">More Posts</h4>
	<!-- <button id="btn-more" class="btn-more">More Posts</button> -->
	</div>
</div>
<div id="modal-alert" class="modal-custom">
	<h4>Refreshing Posts...</h4>
</div>
<!-- <form action="dowallactions.php" method="POST" id="post-form">
<input type="hidden" name="action" value="postMessage" />
<textarea id="message" name="message"></textarea><br/>
<input type="text" id="username" name="username" autocomplete="off" /><br/>
<label id="prompt"></label><br/>
<button id="btn-post">Submit</button>
</form>
<input type="text" id="search-un" name="search-un" />
<button id="btn-search">Search</button>
<div> -->
<!-- <h3>Wall Posts</h3>
<label id="wall-prompt">Loading Posts...</label>
<div id="wall-posts">
</div>
<button id="btn-more">More Posts</button>
</div><br/><br/> -->
<!-- <form action="dowallactions.php" method="POST">
<input type="hidden" name="action" value="getWall" />
<input type="text" name="username" />
<input type="text" name="from" />
<button>Check</button>
</form> -->