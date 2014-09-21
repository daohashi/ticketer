$("#nextButton").on('click',function(){
	$.ajax({url:"/admin/next/" + curtickid,success:function(result){
			if (result!=0)
			{
				result = JSON.parse(result);
				curtickid=result.id;
				$("#password").html(result.code);
				$("#number").html(result.number);
			}else{
			    	$("#password").html("");
				$("#number").html("");
			 }
		 }});
});

$("#addButton").on('click',function(){
	$.ajax({url:"/admin/issue",success:function(result){
			if (result!=0)
			{
				result = JSON.parse(result);
				alert("Ticket generated:\nNumber: "+result.number+"\nCode: "+result.code);
			}else{
			    	alert("Failed to issue ticket");
			 }
		 }});
});