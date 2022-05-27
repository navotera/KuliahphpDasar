<?php
//kita akan hilangkan pesan warning di file ini. 
//error_reporting(E_ERROR | E_PARSE);

//include_once hanya akan menampilkan warning saja, klo require_once akan menjadi fatal error 
//fatal error menyebabkan halaman tidak bisa dieksekusi / blank putih. 

include_once app_dir() . '/helpers/common.php';
require_once app_dir() . '/vendor/autoload.php';

ORM::configure('mysql:host=localhost;dbname=koperasi'); // dbname harus sama dengan nama database yang kita buat
ORM::configure('username', 'root');
ORM::configure('password', '');
