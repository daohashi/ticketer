<div class="Middle" id="eventName">
	<div class='mcontain'>
		<div class='mcontaincell'>
<?php echo $event['name']; ?>
</div>
</div>
</div>
<div class="Middle" id="description">
	<div class='mcontain'>
		<div class='mcontaincell'>
	<?php echo $event['description']; ?>
</div>
</div>
</div>
<div class="Middle" id="grabTicket">
	<a href=<?php echo '"/home/getticket/' . $event['id'] . '"'?> class="btn" id="listButton">Grab Ticket</a>
</div>


<!-- our JavaScript -->
    <script src="<?php echo URL; ?>public/js/ticket.js"></script>