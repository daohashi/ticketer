<div id="menucontainer">
<div class="Middle" id="menu">
<a href="/home/menuButton/event">Events</a>	
<a href="/home/menuButton/ListOfTickets">My Tickets</a>	
<!-- <a href="/home/menuButton/account">Account</a>	 -->
</div>
</div>

<!-- our JavaScript -->
    <script>
var verified = <?php echo json_encode(isset($_SESSION['verified']));?>;
    </script>
