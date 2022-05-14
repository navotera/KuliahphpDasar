<?php

require_once('db.php');

//cek apakah ada nilai dari $_GET['id']
if (!isset($_GET['id'])) {
    die("Error - id Tidak ada");
}


$id = $_GET['id'];

$sql = "DELETE FROM anggota WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}


header("location: index . php", true);
