<div id="Coordinates">
</div>
<div class="Middle" id="eventName">
	<div class='mcontain'>
		<div class='mcontaincell'>
			<?php echo $event['name'] ?>
</div>
</div>
</div>
<div class="Middle" id="ticketNumber">
	<div class='mcontain'>
		<div class='mcontaincell'>
	<?php echo $ticket['number']; ?>
</div>
</div>
</div>

<div class="Middle" id="password">
	<?php echo $ticket['code']; ?>
</div>



<!-- our JavaScript -->
    <script src="<?php echo URL; ?>public/js/ticket.js"></script>