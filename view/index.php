<form action="dowallactions.php" method="POST" id="post-form">
<input type="hidden" name="action" value="postMessage" />
<textarea id="message" name="message">Message...</textarea><br/>
<input type="text" id="username" name="username" autocomplete="off" /><br/>
<label id="prompt"></label><br/>
<button id="btn-post">Submit</button>
</form>
<div>
<h3>Wall Posts</h3>
<div id="wall-posts">
<label>Loading Posts...</label>
</div>
</div><br/><br/>
<!-- <form action="douseractions.php" method="POST">
<input type="hidden" name="action" value="recommendUser" />
<input type="text" name="username" />
<button>Check</button>
</form> -->