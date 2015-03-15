<form action="dowallactions.php" method="POST" id="post-form">
<input type="hidden" name="action" value="postMessage" />
<textarea id="message" name="message">Message...</textarea><br/>
<input type="text" id="username" name="username" autocomplete="off" /><br/>
<label id="prompt"></label><br/>
<button id="btn-post">Submit</button>
</form>
<div>
<h3>Wall Posts</h3>
<label id="wall-prompt">Loading Posts...</label>
<div id="wall-posts">
</div>
<button id="btn-more">More Posts</button>
</div><br/><br/>
<form action="dowallactions.php" method="POST">
<input type="hidden" name="action" value="getWall" />
<input type="text" name="username" />
<input type="text" name="from" />
<button>Check</button>
</form>