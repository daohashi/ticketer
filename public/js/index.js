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
		$("ul#Lists").append('<a  href="/home/eventPageInfo/' + listOfEvents[i].id +'"></a>');
		if (listOfEvents[i].status)
		{
		$('ul#Lists a').append('<li style="background-color:grey;">' + listOfEvents[i].name + "</li>");	
		}
		else
		{
		$('ul#Lists a').append('<li>' + listOfEvents[i].name + "</li>");
		}
	}
	
}

$("#settings").on("click",function(){$("#Login").slideToggle(800);});

$("#textbox").bind("keypress", function(event) {
    if(event.which == 13) {
    event.preventDefault();
        $.ajax({url:"/home/admin/verify/" + $("#textbox").val(),success:function(result){
$("#Login").slideUp(800);
	$("#settings").hide();
    $("#unlocked").show();
	 }
	});

    }
});

$("#submitbutton").on("click",function(){
$("#Login").slideUp(800);
	$("#settings").hide();
    $("#unlocked").show();

});

getLocation();


