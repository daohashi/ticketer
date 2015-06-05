<div id="Login">
<input type="password" name="pname" id="textbox">
<input type="submit" name="psubmit" id="submitbutton">

</div>
<div class="Middle" id="icons">
	<img src="/public/img/locked.png" height="35px" width="25px" id="settings">
	<img src="/public/img/unlocked.png" height="35px" width="35px" id="unlocked">
</div>

<div class="Middle" id="Events">
	<ul type="none" id="Lists">
<li><img src="/public/img/ajax-loader.gif"></li>
	</ul>

</div>

<!-- our JavaScript -->
    <script>
var verified = <?php echo json_encode(isset($_SESSION['verified']));?>;
    </script>
    <script src="<?php echo URL; ?>public/js/event.js"></script>
