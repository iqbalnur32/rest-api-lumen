$(document).ready(function() {
	
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
	});
	// alert(1);
})