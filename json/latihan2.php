<?php 

$data = file_get_contents('coba.json'); // ambil data json dengan file_get_content
$mahasiswa = json_decode($data, true); // ubah file json ke array dengan menambahkan (true) kalo engga akan jadi object.

var_dump($mahasiswa);
echo $mahasiswa[0]['pembimbing']['pembimbing1'];