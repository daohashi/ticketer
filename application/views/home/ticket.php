
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

<div class="Middle" id="estimatedTime">
	
</div>

<div class="Middle" id="password">
	<?php echo $ticket['code']; ?>
</div>
<script>
var eventid = <?php echo $event['id']; ?>;
</script>

<!-- our JavaScript -->
    <script src="<?php echo URL; ?>public/js/ticket.js"></script>

