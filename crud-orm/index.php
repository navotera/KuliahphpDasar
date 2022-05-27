<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <title>Penggunaan ORM</title>
</head>


<div class="container">

    <div class="row my-5">
        <div class="col-12">
            <h1> Selamat datang di Aplikasi Koperasi </h1>
        </div>

    </div>

    <div class="row">
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"> <i class="bi bi-house"></i></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Anggota
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a href="anggota/form.php" class="dropdown-item"><i class="bi bi-plus-lg"></i> Tambah Anggota</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled">Disabled</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </div>


    <div class="row my-5">

        <div class="col bg-info text-white p-3 shadow me-2">
            <h3>Dana Saat ini</h3>
            Rp. 100.000.000
        </div>
        <div class="col bg-white text-dark p-3 shadow-sm me-2">
            <h3>Jumlah Anggota</h3>
            50
        </div>
        <div class="col bg-primary text-white p-3 shadow me-2">
            <h3 class="font-white">Total Pinjaman</h3>
            Rp. 10.000.000
        </div>
        <div class="col bg-white text-dark p-3 shadow-sm me-2">
            <h3>Dana Saat ini</h3>
            Rp. 100.000.000
        </div>


    </div>


    <div class="row my-5">

        <div class="col-4">
            <img src="https://www.continent8.com/wp-content/uploads/2017/10/office-icon.jpg" height="340px">
        </div>
        <div class="col-8">
            Aplikasi ini akan melakukan pencatatan terhadap data anggota dan simpanannya

            <div class="row my-4">

                <div class="col-3">
                    <img src="images/users-icon.png" class="mx-auto d-block" height="80px">
                </div>

                <div class="col-9 pt-4">
                    <div class="float-start me-3"><a href="anggota/form.php"><button class="btn btn-outline-primary shadow-sm "><i class="bi bi-plus-lg"></i> Tambah Anggota</button></a></div>
                    <div class="float-start me-3"><a href="anggota/list.php"><button class="btn btn-outline-primary shadow-sm "><i class="bi bi-people-fill"></i> Daftar Anggota</button></a></div>
                    <div class="float-start me-3"><a href="pinjaman/list.php"><button class="btn btn-outline-primary shadow-sm "><i class="bi bi-plus-lg"></i> Daftar Pinjaman</button></a></div>
                </div>


            </div>


            <div class="row my-4">

                <div class="col-3">
                    <img src="images/money-in.png" class="mx-auto d-block" height="80px">
                </div>

                <div class="col-9 pt-4">
                    <div class="float-start me-3"><a href="anggota/form.php"><button class="btn btn-outline-primary shadow-sm "><i class="bi bi-plus-lg"></i>Form Simpanan</button></a></div>
                    <div class="float-start me-3 "><a href="anggota/list.php"><button class="btn btn-outline-primary shadow-sm "><i class="bi bi-archive me-1"></i>List Simpanan</button></a></div>
                    <div class="float-start me-3"><a href="pinjaman/list.php"><button class="btn btn-outline-primary shadow-sm "><i class="bi bi-plus-lg"></i>Form Pinjaman</button></a></div>
                </div>


            </div>


        </div>


    </div>







</div>






</html>