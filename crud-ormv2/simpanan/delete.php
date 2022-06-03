<?php

require_once('../orm/anggotaORM.php');

//cek apakah ada nilai dari $_GET['id']
if (!isset($_GET['id'])) {
    die("Error - id Tidak ada");
}


$id = $_GET['id'];

$anggota = anggotaORM::findOne($id);
$anggota->delete();

//redirect ke halaman list.php
header("location: ../anggota/list.php?msg=Hapus Berhasil", true);
