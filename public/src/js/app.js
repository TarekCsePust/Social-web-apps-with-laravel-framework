var postId = 0;

$('.post').find('.interaction').find('.edit').on('click',function(){

	
	//var postBody = event.target.parentNode.parentNode.chiledNodes(1).textContent;
	var postBody = $('#body').text();
	postId = $('#postid').val();
	//console.log(postBody);
	$('#post-body').val(postBody);	
	$('#edit-modal').modal();
	//console.log(postBody);	
});

$('#modal-save').on('click',function(){
	$.ajax({
		method:'POST',
		url:url,
		data: {body: $('#post-body').val(), postId:postId, _token:token}
	}).done(function(msg){
		$('#body').text(msg['new_body']);
		$('#edit-modal').modal('hide');
		//console.log(msg['message']);
	});
});