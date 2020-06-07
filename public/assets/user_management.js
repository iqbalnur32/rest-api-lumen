$(document).ready(function(){

	var url = 'http://localhost:8080/'

	//Open Modal
	$(document).on('click', '.open_modal_management', function() {
		var id_users = $(this).val();

		// console.log(id_users);
		$.ajax({
			type: 'GET',
			dataType: 'JSON',
			url: url + 	'admin/management-user/edit/' + id_users,
			success: function(data){
				// console.log(data);
				$('#id_users').val(data.id_users);
				$('#username').val(data.username);
				$('#email').val(data.email);
				$('#nama').val(data.nama);
				$('#website').val(data.website);
				$('#level_id').val(data.level_id);
				$('#score').val(data.score);
				$('#password').val(data.password);
				$('#btn-save').val("update");
				$('#myModal').modal('show');
			},
			error: function(error){
				console.log(error);
			}
		})
	});

	$('#btn-save').click(function(e) {
		e.preventDefault();

		var formData = {
			id_users:	$('#id_users').val(),
			username:	$('#username').val(),
			email:		$('#email').val(),
			nama:		$('#nama').val(),
			website: 	$('#website').val(),
			level_id:	$('#level_id').val(),
			password:	$('#password').val(),
			score:		$('#score').val(),
		}

		// console.log(formData);

		var state = $('#btn-save');
		var type = "PUT";
		var id_users = $('#id_users').val();
		var my_url = url;

		$.ajax({
			url: my_url + 'admin/management-user/edit/' + id_users,
			type: type,
			data: formData,
			dataType: 'JSON',
			success: function(data){
				// console.log(data);
				/*var management = '<tr id="management' + data.id_users + '"><td class="text-center text-dark">' + data.id_users + '</td><td class="text-center text-dark">' + data.username + '</td><td class="text-center text-dark">' + data.email + '</td>';
				management += '<td><button class="btn btn-warning btn-sm open_modal" value="' + data.id_users + '"><i class="fas fa-pencil-alt"></button>';
				console.log(management);*/
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

	// Delete Category
	$(document).on('click', '.delete-management', function() {
		var id_users = $(this).val();

		$.ajax({
			type: 'GET',
			url: url + 'admin/management-user/delete/' + id_users,
			success: function(data){
				console.log(data);
				$('#management' + id_users).remove();
				swal("Done!", "It was succesfully deleted!", "success");
				setInterval('location.reload()', 1000);
			},
			error: function (xhr, ajaxOptions, thrownError) {
                swal("Error deleting!", "Please try again", "error");
                setInterval('location.reload()', 1000);
            }
		})
	})

})