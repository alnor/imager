
function imgControl(to, id){
	$.ajax({
		type: "POST",
		url: "images/"+to,
		data: "data[index]="+id,
		success: function(data){  
			$("#slider").html(data);  
		}  
	 });	
 }
