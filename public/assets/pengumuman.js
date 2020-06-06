$(document).ready(function() {
	
	// ckeditor plugins 
	$('.content_pengumuman_add').ckeditor();

	//Get URl Base
	var url = 'http://localhost:8080/admin/add-pengumuman';

	// Open Modal Edit Get Value
	$(document).on('click', '.open_modal', function() {
		var id_pengumuman = $(this).val();
		
		$.ajax({
			type: "GET",
			url: url + '/edit/' + id_pengumuman,
			success: function(data){
				// console.log(data)
				$('#id_pengumuman').val(data.id_pengumuman);
				$('#title').val(data.title);
				$('#content_data').val(data.content);
				$('#btn-save').val("update");
				$('#myModal').modal('show');	
			},
			error: function (data) {
                console.log('Error:', data);
            } 
		});
	})

	// Update Data Modal
	$('#btn-save').click(function(e) {

		 e.preventDefault();

		 var formData = {
		 	id_pengumuman: $('#id_pengumuman').val(),
		 	title : $('#title').val(),
		 	content : $('#content_data').val(),
		 } 

		 var state = $('#btn-save');
		 var type = "PUT";
		 var id_pengumuman = $('#id_pengumuman').val();
		 var my_url = url;
		 /*if (state == "update") {
		 	type =	"POST";
		 	my_url += '/edit/' + id_pengumuman
		 }*/

		 // console.log(id_pengumuman);
		 $.ajax({
		 	url: my_url + '/edit/' + id_pengumuman,
		 	type: type,
		 	data: formData,
		 	dataType: 'JSON',
		 	success: function(data){
		 		console.log('data-edit:',  data);
		 		var pengumuman = '<tr id="pengumuman' + data.id_pengumuman + '"><td class="text-center text-dark">' + data.id_pengumuman + '</td><td class="text-center text-dark">' + data.title + '</td><td class="text-center text-dark">' + data.content + '</td>';
		 		pengumuman += '<td><button class="btn btn-warning btn-sm open_modal" value="' + data.id_pengumuman + '"><i class="fas fa-pencil-alt"></button>';
		 		
		 		console.log(pengumuman);

		 		$("#pengumuman" + id_pengumuman).replaceWith(pengumuman).html();


		 		$('#frmProducts').trigger("reset");
                $('#myModal').modal('hide');
		 	}
		 })
	})

})