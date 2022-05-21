<?php


require_once('../orm/anggotaORM.php');

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

if ($anggota->id) {
    header("location: ../anggota/list.php?msg=Penyimpanan data Berhasil", true);
}
