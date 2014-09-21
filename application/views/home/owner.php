<div class="Middle" id="eventName">
	<div class='mcontain'>
		<div class='mcontaincell'>
			<?php echo $event['name'];?>
</div>
</div>
</div>
<div class="Middle" id="ticketNumber" style="height:55%">
	<div class='mcontain'>
		<div class='mcontaincell'>
			<?php echo $ticket['number'];?>
</div>
</div>
</div>
<div class="Middle" id="password" >
	<?php echo $ticket['code'];?>
</div>

<div class="Middle" id="navigation">
	<button type="button" class="btn" id="listButton">List</button>
	<button type="button" class="btn" id="nextButton">Next</button>
	<button type="button" class="btn" id="addButton">Add</button>
</div>


<!-- our JavaScript -->
    <script src="<?php echo URL; ?>public/js/ticket.js"></script>