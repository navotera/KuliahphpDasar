<?php


require_once('../orm/anggotaORM.php');

$post = (object) $_POST;

$anggota = anggotaORM::create();
$anggota->nama = $post->nama;
$anggota->alamat = $post->alamat;
$anggota->telp = $post->telp;
$anggota->email = $post->email;
$anggota->save();

if ($anggota->id) {
    header("location: ../form/anggota.php?msg=Penyimpanan data Berhasil", true);
}
