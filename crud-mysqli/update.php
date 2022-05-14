<?php

require_once('db.php');

$post = (object) $_POST;

$nama = $post->nama;
$telp = $post->telp;
$alamat = $post->alamat;
$email = $post->email;
$id = $post->id;

$sql = "UPDATE anggota SET nama = $nama AND telp = $telp AND alamat = $alamat AND email = $email where id = $id";


if ($db->query($sql) === TRUE) {
    echo "Update successfully";
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}
