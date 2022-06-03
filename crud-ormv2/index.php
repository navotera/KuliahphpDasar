<?php require_once 'app_config.php'; ?>
<?php require_once 'helpers/common.php'; ?>
<?php require_once 'helpers/autoload.php'; ?>

<!-- Load header -->
<?php include_once('templates/header.php'); ?>


<!-- Load content -->
<?php

//ambil parameter halaman yang akan di load dari $_GET['page']
$page = (isset($_GET['page'])) ? $_GET['page'] : false; // ini disebut dengan tenary

// if(isset($_GET['page'])) {
//     $page = $_GET['page'];
// }
// else {
//     $page =  false;
// }

if ($page === false) {
    $page = 'dashboard';
}

//apakah ada karakter / jika tidak ada maka load index.php saja
//http://localhost/aplikasi_penjualan/?page=pelanggan/form_tambah
$loadFile = (strpos($page, '/') !== false) ? $page . '.php' : $page . '/index.php';

//page is only index
if (isset($_GET['message'])) : ?>
    <div class="alert alert-info mt-4 mb-0" role="alert">
        <p><?= (isset($_GET['message'])) ? $_GET['message'] : ''; ?></p>
    </div>
<?php endif; ?>

<!-- accessed not index but with page as parameter -->
<?php
//jika ada parameter $_GET['page'] dan ada file yang akan diload misalnya form_tambah.php sesuai dengan path : 
//http://localhost/aplikasi_penjualan/?page=pelanggan/form_tambah 
//maka jalankan require_once            
if ($page && file_exists($loadFile)) {
    require_once $loadFile;
} else {

    //jika file tidak ada maka tampikan alert file is not exist!
    echo ($page) ?  "<div class='alert alert-danger'> File " . $loadFile . ' is not exist </div>' : '';
}
?>






<!-- Load header -->
<?php include_once('templates/footer.php'); ?>