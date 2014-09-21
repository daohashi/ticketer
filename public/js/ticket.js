function findTime(){
	// need current ticket, ticket number, and average time
	// listOfEvents[i].count
	$.ajax({url:"/home/ajaxEventinfo/"+eventid,success:function(result){
		
		result = JSON.parse(result);
		    	var currentTicket=result.nextTicket.number;
		    	var ticketNumber=result.ticket.number;
		 console.log(currentTicket + " " + ticketNumber);
		 var averageTime=1;
var additionalTime = averageTime*(ticketNumber-currentTicket);
var currentdate  = new Date();
var currenttime = currentdate.getHours()*60 + currentdate.getMinutes() ;
var estimatedtime = additionalTime + currenttime
document.getElementById("estimatedTime").innerHTML = "Current ticket: " + currentTicket;
//document.getElementById("estimatedTime").innerHTML = "~" + Math.floor(estimatedtime/60) + ":" + ("0" + estimatedtime%60).slice(-2) + " - " + (ticketNumber-currentTicket) + " ticket(s)";
	 }});
	
}
findTime();
setInterval(findTime, 60000);