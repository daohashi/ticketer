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
			<!-- change to current ticket number -->
	<?php echo $ticket['number']; ?>
</div>
</div>
</div>

<div class="Middle" id="password">
	<?php echo $ticket['code']; ?>
</div>

<div class="Middle" id="navigation">
	<button type="button" class="btn" id="nextButton">Next</button>
	<button type="button" class="btn" id="addButton">Add</button>
</div>
