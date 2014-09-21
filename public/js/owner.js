$("#nextButton").on('click',function(){
	$.ajax({url:"/admin/next/" + curtickid,success:function(result){
			if (result!=0)
			{
				result = JSON.parse(result);
				curtickid=result.id;
				$("#password").html(result.code);
				$("#number").html(result.number);
			}else{
			    	alert("There are no more tickets right now");
			 }
		 }});
});
