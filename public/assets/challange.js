$(document).ready(function() {
	
	// Base Url
	var url = 'http://localhost:8080/'

	// Value Modal Task
	$(document).on('click', '#select', function() {
		var id_task = $(this).data('id_task');
		var name_task = $(this).data('name_task');
		var bonus = $(this).data('bonus');
		var hint = $(this).data('hint');
		var author = $(this).data('author');
		var score = $(this).data('bonus');

		// console.log(id_task)
		$('#id_task').val(id_task);
		$('#score').val(score);
		$('#name_task').text(name_task);
		$('#bonus').text(bonus);
		$('#hint').text(hint);
		$('#author').text(author);
		$('#btn-save').val("update");
		$('#myModal').modal('show');
	});
	
	// Check Submit Flag
	$('#btn-save').click(function(e){
		e.preventDefault();

		var formData = {
			id_task:	$('#id_task').val(),
			flag:		$('#flag').val(),
		}


		var state = $('#btn-save');
		var type = "POST";
		var id_task = $('#id_task').val();
		var my_url = url;

		console.log(formData);

		$.ajax({
			url: my_url + 'users/challange',
			type: type,
			data: formData,
			dataType: 'JSON',
			success: function(data){
				console.log(data);
				
				$('#frmProducts').trigger("reset");
				$('#data_reversing').modal('hide');

				swal("Done!", "Success Flag Submit", "success");
				setInterval('location.reload()', 1000);

				// $("#btn-save").attr('disabled', 'disabled');
			},
			error: function(error){
				swal("Error deleting!", "Flag Tidak Di Temukan", "error");
				console.log(error);
			}
		})
	}); 

})