







$(function(){
	$.ajax({
		url: '/api/twitter-accounts',
		method: 'post',
		dataType: 'json',
		complete: function(response) {
			console.log($.parseJSON(response.responseText));
		}
	});
});	
