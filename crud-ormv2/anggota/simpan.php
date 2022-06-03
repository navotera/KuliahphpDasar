<?php


require_once('../orm/anggotaORM.php');
require_once('../helpers/common.php');
require_once('../app_config.php');


$post = (object) $_POST;

//default :: metode adalah insert
$anggota = anggotaORM::create();

//mode update
if (isset($post->id) && $post->id != 0) {
    $anggota = anggotaORM::findOne($post->id);
}

$anggota->nama = $post->nama;
$anggota->alamat = $post->alamat;
$anggota->telp = $post->telp;
$anggota->email = $post->email;
$anggota->tipe_id = $post->tipe_id;
$anggota->save();



$redirect = BASE_PATH . '?anggota/list.php&message=Simpan Berhasil';
if ($anggota->id) {
    header("location: $redirect", true);
}
