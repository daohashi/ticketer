function findTime(){
	// need current ticket, ticket number, and average time
	// listOfEvents[i].count
	$.ajax({url:"/home/ajaxEventinfo/"+eventid,success:function(result){
		
		result = JSON.parse(result);
		    	var currentTicket=result.nextTicket.number;
		    	var ticketNumber=result.ticket.number;
		    	var pushes=result.event.pushes;
		    	var name=result.event.name;
		 console.log(currentTicket + " " + ticketNumber + " " + pushes);
		 console.log(result);

		 var averageTime=1;
var additionalTime = averageTime*(ticketNumber-currentTicket);
var currentdate  = new Date();
var currenttime = currentdate.getHours()*60 + currentdate.getMinutes() ;
var estimatedtime = additionalTime + currenttime
document.getElementById("estimatedTime").innerHTML = "Current ticket: " + currentTicket;
var notified = false;
		 // if (ticketNumber - currentTicket <= 5 && !notified)
		 // {
		 // 	alert("It is almost your turn, please head to " + name);
		 // 	notified = true;
		 // }
//document.getElementById("estimatedTime").innerHTML = "~" + Math.floor(estimatedtime/60) + ":" + ("0" + estimatedtime%60).slice(-2) + " - " + (ticketNumber-currentTicket) + " ticket(s)";
	 }});
	
}
findTime();
setInterval(findTime, 60000);