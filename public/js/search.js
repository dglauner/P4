$('[id^=AjaxDelete]').click(function(event) {
	$id = event.target.id.slice(10);
	
	$.ajax({
        type: 'POST',
        url: '/exercise/delete',
        success: function(response) { 
			var tr = $('#row'+ $id);
			tr.css("background-color","#FF3700");
			tr.fadeOut(400, function(){
				tr.remove();
			});
			return false;            
		},
		error: function(response) {
			alert(response.responseJSON.errors);
		},
        data: {
            format: 'text',
				eid: $id,
				_token: $('input[name=_token]').val(),
        },
    });  
	return false;
});