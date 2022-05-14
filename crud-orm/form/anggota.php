<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <title>Contoh form dengan php</title>
</head>


<body>
    <div class="container">
        <div class="row p-3 align-items-center mt-4 bg-danger">
        </div>

        <div class="row  mt-4">
            <div class="col-6">
                <h1>Form Identitas Anggota</h1>
                <sub>Isikan identitas anggota anda</sub>
            </div>

        </div>

        <div class="row align-items-center mt-4">

            <form action="../anggota/simpan.php" method="POST">

                <div class="mb-3 mt-4">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" class="form-control" placeholder="Masukkan nama">
                </div>
                <div class="mb-3">
                    <label for="alamat">alamat</label>
                    <input type="text" name="alamat" class="form-control" placeholder="Kode Barang">
                </div>

                <div class="mb-3">
                    <label for="telp">Nomor Telp</label>
                    <input type="text" name="telp" class="form-control" placeholder="Jumlah Barang">
                </div>

                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control" placeholder="Harga Barang">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>


    </div>

</body>

</html>