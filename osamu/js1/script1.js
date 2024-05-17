function load_videos(){

	$.ajax({
		url: 'http://217.71.129.139:4593/api_ip23/get_videos.php ',
		method: 'get',
		dataType: 'json',
		success: function(data){
	
			data['videos'].forEach(function(video){
				
				let div = $('<div>')
				div.append('<img src="'+video['logo']+'" >')
				div.append('<h3>'+video['title']+'</h3>')
				div.append('<h4>'+video['description']+'</h4>')
				div.append('<h4>'+video['director']+'</h4>')
				div.append('<h4>'+video['year']+'</h4>')
				$('#videos').append(div)
			})
		},
	});
}