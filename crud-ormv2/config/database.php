<?php
//kita akan hilangkan pesan warning di file ini. 
//error_reporting(E_ERROR | E_PARSE);

//include_once hanya akan menampilkan warning saja, klo require_once akan menjadi fatal error 
//fatal error menyebabkan halaman tidak bisa dieksekusi / blank putih. 


// if (function_exists('app_dir')) {
//     include_once app_dir() . '/helpers/common.php';
//     require_once app_dir() . '/vendor/autoload.php';
//     require_once app_dir() . '/constants.php';
// } else {
//     require_once dirname(__DIR__, 1) . '../helpers/common.php';
//     require_once dirname(__DIR__, 1) . '../helpers/autoload.php';
//     require_once dirname(__DIR__, 1) . '../vendor/autoload.php';
//     require_once dirname(__DIR__, 1) . '../constants.php';
// }

// require_once dirname(__DIR__, 1) . '../helpers/common.php';
// require_once dirname(__DIR__, 1) . '../helpers/autoload.php';
// require_once dirname(__DIR__, 1) . '../vendor/autoload.php';
// require_once dirname(__DIR__, 1) . '../constants.php';

// ORM::configure('mysql:host=localhost;dbname=koperasi'); // dbname harus sama dengan nama database yang kita buat
// ORM::configure('username', 'root');
// ORM::configure('password', '');



//Referensi (bahasa indonesia)
//https://laravel-com.translate.goog/docs/9.x/eloquent?_x_tr_sl=en&_x_tr_tl=id&_x_tr_hl=en&_x_tr_pto=wapp

// Referensi (bahasa inggris)
// https://laravel.com/docs/9.x/eloquent


use Illuminate\Database\Capsule\Manager as Capsule;


$capsule = new Capsule;
$capsule->addConnection([
    "driver" => "mysql",
    "host" => "localhost",
    "database" => "koperasi",
    "username" => "root",
    "password" => ""
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();
