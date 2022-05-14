<?php

require_once('db.php');

//cek apakah ada nilai dari $_GET['id']
if (!isset($_GET['id'])) {
    die("Error - id Tidak ada");
}


$id = $_GET['id'];

$sql = "DELETE FROM anggota WHERE id=$id";

if ($db->query($sql) === TRUE) {
    echo "Record deleted successfully";

    //redirect ke halaman list.php
    header("location: list.php", true);
} else {
    echo "Error deleting record: " . $db->error;
}
