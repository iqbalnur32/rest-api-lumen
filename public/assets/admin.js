$(document).ready(function() {

	// Base Url
	var Baseurl = 'http://localhost:8080/'

	// Change Atrribut Date
	$('#dateLastLogin').change(function() {
		var date = $('#dateLastLogin').val()
		$('#chartLastLogin').empty();

		console.log(date);
		LastLogin(date);
	})

	/*
		LastLogin Static
	*/
	function LastLogin(date){
		$.ajax({
			url: Baseurl + 'admin/lastlogin/users/' + date,
			method: 'GET',
			dataType: 'JSON',
			success: function(data){
				var json = data
				Morris.Line({
					element: 'chartLastLogin',
			  		data: json.data,
					xkey: 'last_login',
					ykeys: ['login'],
					labels: ['Total'],
					lineColors: ['#32a852']
				})
			},
			error(error){
				console.log(error)
			}
		})
	}

	// Moment JS Date
	$(document).ready(function() {
		var date =  moment().format("YYYY-MM-DD");
		LastLogin(date)

		belajarFirebase();
	})

	function belajarFirebase(){
		  // Your web app's Firebase configuration
		  var firebaseConfig = {
		  	apiKey: "AIzaSyAhuYaOH8a-wZOfliwsrrbP4Ic0nFLTRos",
		  	authDomain: "belajar-firebase-b3555.firebaseapp.com",
		  	databaseURL: "https://belajar-firebase-b3555.firebaseio.com",
		  	projectId: "belajar-firebase-b3555",
		  	storageBucket: "belajar-firebase-b3555.appspot.com",
		  	messagingSenderId: "68102002010",
		  	appId: "1:68102002010:web:1338490ad51d1ce1314f63",
		  	measurementId: "G-CRSY2YEKB1"
		  };
		  // Initialize Firebase
		  firebase.initializeApp(firebaseConfig);
		  // firebase.analytics();

		  var db = firebase.database();

		  var siswaTest = db.ref('siswa')

		  siswaTest.orderByChild('no').on('value', showTrue, showError)
	}

	function showTrue(items){ 	
		console.log('data berhasil diambil')
		// console.log(items.val())
		var _ul = document.getElementById("ul");
		var _content = ''

		items.forEach(data => {
			// console.log(data.val().alamat)
			_content += "<li>" + data.val().alamat + data.val().kelas + "</li>";
		})

		_ul.innerHTML = _content;

	}

	function showError(err){
		console.log('data gagal diambil')
		console.log(err)
	}


})