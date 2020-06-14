$(document).ready(function() {
	
	var baseUrl = 'http://localhost:8080/';

	// staticSolved();

	// function staticSolved(){
	// 	$.ajax({
	// 		url: baseUrl + 'users/static/solved',
	// 		type: "GET",
	// 		dataType: "JSON",
	// 		success: function(data){
	// 			console.log(data)
	// 			Morris.Line({
	// 		  		element: 'myfirstchart',
	// 		  		data: data,
	// 				xkey: 'total',
	// 				ykeys: ['username'],
	// 				labels: ['Total Transaksi'],
	// 				lineColors: ['#32a852']
	// 		  	});	

	// 		},
	// 		error: function(error){
	// 			console.log(error)
	// 		}
	// 	})
	// }	

})