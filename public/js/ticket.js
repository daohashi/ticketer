function findTime(){
	// need current ticket, ticket number, and average time
	console.log("hi")
var averageTime=1;
var currentTicket=40;
var ticketNumber=60;
var additionalTime = averageTime*(ticketNumber-currentTicket);
var currentdate  = new Date();
var currenttime = currentdate.getHours()*60 + currentdate.getMinutes() ;
var estimatedtime = additionalTime + currenttime
document.getElementById("Coordinates").innerHTML = Math.floor(estimatedtime/60) + " : " + ("0" + estimatedtime%60).slice(-2);
	
}
findTime();
setInterval(findTime, 60000);