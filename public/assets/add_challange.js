$(document).ready(function() {
	// alert(1);

	// Base Url
	var url = 'http://localhost:8080/'

	// ckeditor
	$('.Challanges').ckeditor();

	$(document).on('click', '.open_challange', function() {
		var id_task = $(this).val();

		console.log(id_task);
		$.ajax({
			type: 'GET',
			dataType: 'JSON',
			url: url + 	'admin/add-challange/edit/' + id_task,
			success: function(data){
				// console.log(data);
				$('#id_task').val(data.id_task);
				$('#name_task').val(data.name_task);
				$('#id_category').val(data.id_category);
				$('#author').val(data.author);
				$('#task_point').val(data.task_point);
				$('#flag').val(data.flag);
				$('#hint').val(data.hint);
				$('#btn-save').val("update");
				$('#myModal').modal('show');
			},
			error: function(error){
				console.log(error);
			}
		})
	});

	$('#btn-save').click(function(e){
		e.preventDefault();

		var formData = {
			id_task:		$('#id_task').val(),
			name_task:		$('#name_task').val(),
			id_category:	$('#id_category').val(),
			author:			$('#author').val(),
			task_point: 	$('#task_point').val(),
			flag:			$('#flag').val(),
			hint:			$('#hint').val(),
		}


		var state = $('#btn-save');
		var type = "PUT";
		var id_task = $('#id_task').val();
		var my_url = url;


		$.ajax({
			url: my_url + 'admin/add-challange/edit/' + id_task,
			type: type,
			data: formData,
			dataType: 'JSON',
			success: function(data){
				console.log(data);
				$('#frmProducts').trigger("reset");
                $('#myModal').modal('hide');
                
                swal("Done!", "It was succesfully edit data!", "success");
                setInterval('location.reload()', 1000);
			},
			error: function(error){

				swal("Error deleting!", "Please try again", "error");
				console.log(error);
			}
		})
	});

	// Delete Challange
	$(document).on('click', '.task_delete', function(){
		var id_task = $(this).val();

		$.ajax({
			type: 'GET',
			url: url + 'admin/add-challange/delete/' + id_task,
			success: function(data){
				console.log(data);

				$('#task' + id_task).remove();
				
				swal("Done!", "It was succesfully deleted!", "success");
				
				setInterval('location.reload()', 1000);
			},
			error: function (xhr, ajaxOptions, thrownError) {
                swal("Error deleting!", "Please try again", "error");
                // console.log(thrownError);
                setInterval('location.reload()', 1000);
            }
		})
	})
})