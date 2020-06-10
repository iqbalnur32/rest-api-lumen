$(document).ready(function() {
	
	var baseUrl = 'http://localhost:8080/';

	/*staticSolved();

	function staticSolved(){
		$.ajax({
			url: baseUrl + 'users/static/solved',
			type: "GET",
			dataType: "JSON",
			success: function(data){
				console.log(data)
				Morris.Line({
			  		element: 'myChart',
			  		data: data,
					xkey: 'tanggal',
					ykeys: ['name'],
					labels: ['Total Transaksi'],
					lineColors: ['#32a852']
			  	});	

			},
			error: function(error){
				console.log(error)
			}
		})
	}*/	

})