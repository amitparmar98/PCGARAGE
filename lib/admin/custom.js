$(document).ready(function (){ 
	setInterval(function() {
		var lastId = $('#msglastId').val();
		var url = $('#site_url').val();
		
		$.ajax({
			url: url + "repair/checkmessage/" + lastId,
			type: "get",
			async : false,
			success: function (result)
			{
				var data = $.parseJSON(result);
				$('.msgCount').html(data.count);
			}
		});    
    }, 5000);
});
