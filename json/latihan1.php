<?php 

// $mahasiswa = [
// 	[
// 		"nama" => "Muhammad Aqil Emeraldi",
// 		"nrp" => "41187005170003",
// 		"email" => "syahruli917@gmail.com"
// 	],
// 	[
// 		"nama" => "Muhammad Aqil Emeraldi",
// 		"nrp" => "41187005170003",
// 		"email" => "syahruli917@gmail.com"
// 	]
// ];


// Ambil Data Dari Database dengan PDO.
$dbh = new PDO('mysql:host=localhost;dbname=phpmvc', 'root', '');
$db = $dbh->prepare('SELECT * FROM mahasiswa');
$db->execute();
$mahasiswa = $db->fetchAll(PDO::FETCH_ASSOC); // ambil semua data lalu jadikan array asosiatif

$data = json_encode($mahasiswa);
echo $data;