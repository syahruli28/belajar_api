// let mahasiswa = {
// 	nama : "Aqil Emeraldi",
// 	nim : "41187005170003",
// 	email : "syahruli917@gmail.com"
// }

// console.log(JSON.stringify(mahasiswa)); // mengubah object ke JSON


// dengan AJAX
// let xhr = new XMLHttpRequest();
// xhr.onreadystatechange = function() {
// 	if (xhr.readyState == 4 && xhr.status == 200) {
// 		// JSON.parse untuk merubah format JSON ke objek
// 		let mahasiswa = JSON.parse(this.responseText); // isi variabel mahasiswa dengan apapun isi dari file yang diambil (coba.json)
// 		console.log(mahasiswa);
// 	}
// }
// xhr.open('GET', 'coba.json', true); // penambahan true agar dijalankan secara asinkronus
// xhr.send();


// dengan Jquery
$.getJSON('coba.json', function (data){ // getJSON untuk ambil data JSON, bila berhasil maka jalankan fungsi console.log dengan paramater yang telah ditentukan (bebas)
	console.log(data);
});
