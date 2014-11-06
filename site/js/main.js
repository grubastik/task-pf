//global var for tracking last id
var lastId;

//document.onLoad event
$(document).ready(runRequest);

//Perform AJAX request
//could be replaced with $.getJson()
function AjaxRequest() {
	$.ajax({
		url: '/api',
		type: 'POST',
		dataType: 'json',
		data: 'data={"id":"'+lastId+'"}',
		success: function (responseData) {
			if (responseData.error) { alert(responseData.error);}
			else {addPosts(responseData['posts']);}
			runRequest();
		},
		error: function () {
			alert("Error occurred while communicating with server. Please reload the page.");
		}
	});
}

//prepare data for pulling and restart reading cycle
function runRequest() {
	var posts = $('.post-container');
	for (var index = 0; index < posts.length; index++) {
		if (!lastId) lastId = parseInt($(posts[index]).attr('data-id'));
		if (lastId < parseInt($(posts[index]).attr('data-id'))) {
			lastId = parseInt($(posts[index]).attr('data-id'));
		}
	}
	//used setTimeout
	//this prevents of loading multiple times the same data
	//in case whel load time takes more than 20 seconds
	window.setTimeout(AjaxRequest, 20000); //time in microseconds
}

//add new posts
//could be used each here
function addPosts(posts) {
	for (var index = posts.length - 1; index >=0 ; index--) {
		//used prepend method because we have descending sort order
		$('#posts-container').prepend('<div id="post-container" class="post-container" data-id="'+posts[index].id+'"><div class="post-header"><h3>'+posts[index].title+'&nbsp;<small>'+posts[index].created+'</small></h3></div><div class="post-body">'+posts[index].text+'</div><hr></div>');
	}
}
