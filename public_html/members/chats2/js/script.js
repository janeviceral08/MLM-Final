$(document).ready(function(){
		ReadData();
		
		function ReadData(){
			$.ajax({
				url: "select.php",
				method: "POST",
				success: function(data){
					$('#data').html(data);
				}
			})
			
		}
		
	$(document).on('click', '#btn_add', function(){
		var firstname = $('#firstname').text();
		var lastname = $('#lastname').text();
		var address = $('#address').text();
		
		
		$.ajax({
			url: "insert.php",
			method: "POST",
			dataType: "text",
			data:{
				firstname: firstname, lastname: lastname, address: address
			},
			success: function(data){
				alert(data);
				ReadData();
			}
		});
			
	});
 
	
	$(document).on('blur', '.firstname', function(){
		var id = $(this).data("firstname");
		var firstname = $(this).text();
		UpdateData(id, firstname, 'firstname');
	});
	
	
	$(document).on('blur', '.lastname', function(){
		var id = $(this).data("lastname");
		var lastname = $(this).text();
		UpdateData(id, lastname, 'lastname');
	});
	
	
	$(document).on('blur', '.address', function(){
		var id = $(this).data("address");
		var address = $(this).text();
		UpdateData(id, address, 'address');
	});
	
	$(document).on('click', '.btn_delete', function(){
		var id = $(this).attr('name');
		
		$.ajax({
			url: 'delete.php',
			method: "POST",
			data:{ 
				mem_id: id
			},
			success: function(data){
				alert(data);
				ReadData();
			}
		});
	});
	
	function UpdateData(id, text, column){
		$.ajax({
			url: "update.php",
			method: "POST",
			data: {
				id: id, text: text, column: column 
			},
			success: function(data){
				
			}
		});
	}
	
	
});