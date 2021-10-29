$(document).ready(function(){
	fetch();

	//clicking the filter button
	$('#filter').click(function(e){
		var date_start = $('#date_start').val();
		var date_end = $('#date_end').val();
		$.ajax({
			method: 'POST',
			url: 'filter.php',
			data: {
				date_start: date_start,
				date_end: date_end,
			},
			dataType: 'json',
			success: function(response){
				if(response.error){
					$('#tbody').html('<tr><td colspan="6" align="center">No data matches your filter</td></tr>');
				}
				else{
					$('#tbody').html(response.data);
				}
			}
		});
	});

	$('#return').click(function(){
		$('#date_start').val('');
		$('#date_end').val('');
		fetch();
	});

});
function fetch(){
	$.ajax({
		method: 'POST',
		url: 'fetch.php',
		dataType: 'json',
		success: function(response){
			$('#tbody').html(response);
		}
	});
}