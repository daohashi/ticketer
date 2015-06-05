<div id="menucontainer">
<div class="Middle" id="menu">
<form action="/application/helpers/LoginAction.php" method="POST">
<input type="text" name="Username" placeholder="Username" required="required" autofocus>
<br>
<input type="password" name="Password" placeholder="Password" required="required">
<br>
<input type="submit" name="Submit" value="Submit">
</form>
</div>
</div>

<!-- our JavaScript -->
    <script>
var verified = <?php echo json_encode(isset($_SESSION['verified']));?>;
    </script>
