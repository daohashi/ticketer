var listOfEvents;
$("#HostButton").on("click",getLocation);

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(givePosition);
    } else {
        alert("Geolocation is not supported by this browser.");
    }
}
function givePosition(position) {
	 $.ajax({url:"/home/getEvents/" + position.coords.latitude + "/" + position.coords.longitude,success:function(result){
	 	listOfEvents = JSON.parse(result);
	 	// document.getElementById("Coordinates").innerHTML = "Latitude: " + position.coords.latitude + 
   //  "<br>Longitude: " + position.coords.longitude; 
    
	addItem(listOfEvents);
	 }

	});

}

function addItem(listOfEvents){
$('ul#Lists').empty();
	for (i=0; i < listOfEvents.length; i++)
	{
		if (listOfEvents[i].hasticket >= 1)
		{
		$('ul#Lists').append('<a  href="/home/eventPageInfo/' + listOfEvents[i].id +'"><li class="bbblueglow">' + listOfEvents[i].name + " - " + listOfEvents[i].count + "</li></a>");	
		}
		else
		{
		$('ul#Lists').append('<a  href="/home/eventPageInfo/' + listOfEvents[i].id +'"><li>' + listOfEvents[i].name + " - " + listOfEvents[i].count + "</li></a>");
		}
		if(i+1<listOfEvents.length){
			$('ul#Lists').append("<div class='sexy_line'></div>");
		}
	}
	
}

$("#settings").on("click",function(){$("#Login").slideToggle(800);});

$("#textbox").bind("keypress", function(event) {
    if(event.which == 13 && $("#textbox").val()!= "") {
    event.preventDefault();
        $.ajax({url:"/admin/verify/" + $("#textbox").val(),success:function(result){
		if (result!=0)
		{
			$("#Login").slideUp(800);
			$("#settings").hide();
			 $("#unlocked").show();
		}else{
		    	alert("You entered a invalid code");
		 }
	 }});

    }
});

$("#submitbutton").on("click",function(){
	if ($("#textbox").val()!= "")
	{
		$.ajax({url:"/admin/verify/" + $("#textbox").val(),success:function(result){
			if (result!=0)
			{
				$("#Login").slideUp(800);
				$("#settings").hide();
				$("#unlocked").show();
			}else{
			    	alert("You entered a invalid code");
			 }
		 }});
	}


});
if(verified){
	$("#settings").hide();
	$("#unlocked").show();
}
getLocation();


