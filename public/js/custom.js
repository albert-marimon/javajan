$('#search').on('keyup',function(){
	$('#category-select').val("");
	$value=$(this).val();
	$.ajax({
		type : 'get',
		url : '/search',
		data:{'title':$value},
		success:function(data){
			$('.filter_data').html(data);
			//$('.card').html(data);
			if(data == ''){
				$('.filter_data').html("<p>No se han encontrado Posts con este título</p>");
			}
		},
	    error: function(xhr, status, error){
	        var errorMessage = xhr.status + ': ' + xhr.statusText
	        console.log('Error - ' + errorMessage);
	    }
	});
})

$('#category-select').on('change',function(){
	$('#search').val("");
	$value=$(this).val();
	$.ajax({
		type : 'get',
		url : '/search',
		data:{'category':$value},
		success:function(data){
			$('.filter_data').html(data);
		},
	    error: function(xhr, status, error){
	        var errorMessage = xhr.status + ': ' + xhr.statusText
	        console.log('Error - ' + errorMessage);
	    }
	});
})