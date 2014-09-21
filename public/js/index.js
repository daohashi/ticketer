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

	for (i=0; i < listOfEvents.length; i++)
	{
		if (listOfEvents[i].status)
		{
		$('ul#Lists').append('<li style="background-color:grey;">' + listOfEvents[i].title + "</li>");	
		}
		else
		{
		$('ul#Lists').append('<li>' + listOfEvents[i].title + "</li>");
		}
		
	}
	
}



getLocation();


