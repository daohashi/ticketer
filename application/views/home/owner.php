
    <!-- css -->
    <link href="<?php echo URL; ?>public/css/owner.css" rel="stylesheet">
<div class="Middle" id="eventName">
	<div class='mcontain'>
		<div class='mcontaincell'>
			<?php echo $event['name'];?>
</div>
</div>
</div>
<div class="Middle" id="ticketNumber">
	<div class='mcontain'>
		<div class='mcontaincell' id='number'>
			<?php echo $ticket['number'];?>
</div>
</div>
</div>
<div class="Middle" id="password" >
	<?php echo $ticket['code'];?>
</div>

<div class="Middle" id="navigation">
	<button type="button" class="btn" id="nextButton">Next</button>
	<button type="button" class="btn" id="addButton">Issue</button>
</div>

    <script>
var curtickid = <?php echo json_encode($ticket['id']);?>;
    </script>
    <script src="<?php echo URL; ?>public/js/owner.js"></script>
