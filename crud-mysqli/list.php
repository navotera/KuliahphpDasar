<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <title>Contoh Table</title>
</head>

<?php
require_once('db.php');
?>

<div class="container">

    <div class="row  mt-4">
        <div class="col-11">
            <h1>Tabel Anggota Anggota</h1>
            <sub>Daftar Anggota</sub>
        </div>
        <div class="col-1"><a href="index.php">
                << Kembali</a>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12">

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telp</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $sql = "SELECT * FROM anggota";
                    $result = $db->query($sql);

                    //var_dump($result);

                    if ($result->num_rows > 0) {
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["id"] . "</td>";
                            echo "<td>" . $row["nama"] . "</td>";
                            echo "<td>" . $row["alamat"] . "</td>";
                            echo "<td>" . $row["email"] . "</td>";
                            echo "<td>" . $row["telp"] . "</td>";
                            echo '<td> <a href="index.php?id=' . $row['id'] . '">Update</a> | <a href="delete.php?id=' . $row['id'] . '">Delete</a></td>';
                            echo "</tr>";
                        }
                    } else {
                        echo "0 results";
                    }

                    ?>

                </tbody>
            </table>
        </div>
    </div>


</div>