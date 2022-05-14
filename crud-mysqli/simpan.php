<?php

require_once('db.php');


$post = (object) $_POST;

$nama = $post->nama;
$telp = $post->telp;
$alamat = $post->alamat;
$email = $post->email;

//mode update
if (isset($post->id) && $post->id != '') {
    $id = $post->id;
    $sql = "UPDATE anggota SET nama = '$nama', telp = '$telp', alamat = '$alamat', email = '$email' WHERE id = $id";
    $pesan = 'Update successfully';
} else {
    //mode insert
    $sql = "INSERT INTO anggota (nama, telp, alamat, email) VALUES ('$nama', '$telp', '$alamat', '$email')";
    $pesan = 'Insert successfully';
}


if ($db->query($sql) === TRUE) {
    echo $pesan;
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}
