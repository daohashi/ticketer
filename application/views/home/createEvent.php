
<div id="menucontainer">
	<div class="Middle" id="menu">

		<input type="text" name="Name" placeholder="Name" autofocus>
		<br>
		<input type="text" name="Description" placeholder="Description" >
		<br>
		<input type="text" name="Code" placeholder="Code">
		<br>
		<input type="submit" onclick="btnClicked()">

	</div>
</div>

<!-- our JavaScript -->
<script>
var verified = <?php echo json_encode(isset($_SESSION['verified']));?>;

function btnClicked ()
{
	getLocation();
}

function givePosition(position) {
	var name = $('input[name="Name"]').val();
	var description = $('input[name="Description"]').val();
	var code = $('input[name="Code"]').val();
	alert ("Longitude: " + position.coords.latitude + " Longitude: "  + position.coords.longitude);

	var data = {Name:name, Description:description, Code:code, Latitude:position.coords.latitude, Longitude:position.coords.longitude};
	$.ajax({url:"/admin/makeEvent/" + JSON.stringify(data),success:function(result){
		alert(result);
	}
});


}

function getLocation() {
	if (navigator.geolocation) {

		navigator.geolocation.getCurrentPosition(givePosition);

	} 
	else {
		alert("Geolocation is not supported by this browser.");
	}
}

</script>

<!-- Form Handling -->
<!-- <script src="<?php echo URL; ?>public/js/CreateEvent.js"></script>-->



