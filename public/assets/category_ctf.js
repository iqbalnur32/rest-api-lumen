$(document).ready(function() {

	// Base Url
	var url = "http://localhost:8080/";

	$('#myTable').DataTable();

	// Opem Modal
	$(document).on('click', '.open_modal_category', function(){
		var id_category = $(this).val();

		$.ajax({
			url: url + 'admin/ctf-category/edit/' + id_category,
			dataType: "JSON",
			type: "GET",
			success: function(data){
				// console.log(data);
				$('#id_category').val(data.id_category);
				$('#category_name').val(data.category_name);
				$('#description').val(data.description);
				$('#btn-save').val("update");
				$('#myModal').modal('show');
			}, 
			error: function(error){
				console.log(error);
			}
		})
	})

	// Update Category
	$('#btn-save').click(function(e){
		e.preventDefault();

		var formData = {
			id_category: $('#id_category').val(),
			category_name: $('#category_name').val(),
			description: $('#description').val()
		}

		var type = "PUT";
		var dataType = "JSON";
		var id_category = $('#id_category').val();
		var myUrl = url;
		console.log(formData);

		$.ajax({
			url: myUrl + 'admin/ctf-category/edit/' + id_category,
			type: type,
			dataType: dataType,
			data: formData,
			success: function(data){
		 		// console.log(data);
				var category = '<tr id="category' + data.id_category + '"><td class="text-center text-dark">' + data.id_category + '</td><td class="text-center text-dark">' + data.category_name + '</td><td class="text-center text-dark">' + data.description + '</td>';
		 		category += '<td><button class="btn btn-warning btn-sm open_modal" value="' + data.id_category + '"><i class="fas fa-pencil-alt"></button>';
		 		
		 		// console.log(category);

		 		$("#category" + id_category).replaceWith(category).html();


		 		$('#frmProducts').trigger("reset");
                $('#myModal').modal('hide');
			},
			error: function(error){
				console.log(error);
			}
		})
	})

	// Delete Category
	$(document).on('click', '.delete-category', function(){
		var id_category = $(this).val();

		$.ajax({
			type: "GET",
			url: url + 'admin/ctf-category/delete/' + id_category,
			success: function(data){
				console.log(data);
                $("#category" + id_category).remove();
			},
			error: function(error){
				console.log(error);
			}
		})
	})
})