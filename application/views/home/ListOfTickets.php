<div id="Login">
<input type="password" name="pname" id="textbox">
<input type="submit" name="psubmit" id="submitbutton">

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
    <script src="<?php echo URL; ?>public/js/ListOfTickets.js"></script>
