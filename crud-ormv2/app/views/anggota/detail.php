<?php

use App\Core\NumberFormat;
use App\Core\Date;

use App\ORM\RencanaAngsuran;
use App\ORM\Pinjaman;
use App\ORM\Angsuran;


?>



<div class="row">
    <div class="col-lg-3">
        <div class="card mb-4">
            <div class="card-body text-center">
                <img src="<?= base_url(); ?>images/avatar.png" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                <h5 class="my-3"><?= $anggota->nama; ?></h5>
                <p class="text-muted mb-1"><?= $tipe_anggota; ?></p>
                <p class="text-muted mb-4"><?= $anggota->tanggal_daftar; ?></p>
                <div class="d-flex justify-content-center mb-2">
                    <a href="<?= base_url(); ?>?page=anggota/form&id=<?= $anggota->id; ?>" class="btn btn-sm btn-outline-info ms-1">Edit</a>
                    <button type="button" class="btn btn-sm btn-outline-primary ms-1">Message</button>


                    <form action="<?= base_url(); ?>?page=anggota/delete" method="POST">
                        <input type="hidden" name="id" value="<?php echo $anggota->id; ?>">
                        <button class="btn btn-sm btn-outline-danger ms-1" type="submit" onclick="confirmDelete()">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>



                </div>
            </div>
        </div>
        <div class="card mb-4 mb-lg-0">
            <div class="card-body p-0">
                <ul class="list-group list-group-flush rounded-3">
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                        <i class="fas fa-globe fa-lg text-warning"></i>
                        <div class="col-8">Jumlah Simpanan</div>
                        <div class="col-4 text-end"><?= NumberFormat::IDR($jumlah_simpanan); ?></div>

                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                        <i class="fab fa-github fa-lg" style="color: #333333;"></i>
                        <div class="col-8">Jumlah Pinjaman</div>
                        <div class="col-4 text-end">10.000</div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                        <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                        <div class="col-8">Jumlah Angsuran Bulan Ini</div>
                        <div class="col-4 text-end">15.000</div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                        <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                        <div class="col-8">Jumlah Bagi Hasil</div>
                        <div class="col-4 text-end">14.000</div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                        <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                        <div class="col-8">Saldo Akhir</div>
                        <div class="col-4 text-end text-success">140.000</div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-lg-9">

        <div class="row">



            <div class="col-12">


                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="#rencana_angsuran" class="nav-link active" data-bs-toggle="tab">Rencana Angsuran</a>
                    </li>
                    <li class="nav-item">
                        <a href="#angsuran" class="nav-link" data-bs-toggle="tab">Angsuran</a>
                    </li>
                    <li class="nav-item">
                        <a href="#pinjaman" class="nav-link" data-bs-toggle="tab">Pinjaman</a>
                    </li>
                    <li class="nav-item">
                        <a href="#simpanan" class="nav-link" data-bs-toggle="tab">Simpanan</a>
                    </li>


                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="rencana_angsuran">


                        <p class="h5 text-warning mt-4 ps-2">Tabel Rencana Angsuran</p>

                        <!-- list pinjaman, lalu list rencana angsuran yang sudah jatuh tempo -->
                        <table class="table mt-4">
                            <tr>
                                <td>No</td>
                                <td>Jumlah</td>
                                <td>Angsuran Ke</td>
                                <td>Tanggal Jatuh Tempo</td>
                                <td>Status</td>
                                <td>Info</td>
                            </tr>

                            <?php
                            foreach ($list_pinjaman as $pinjaman) :
                                //check rencana angsuran tiap pinjaman tersebut yang rencana angsuran jatuh tempo
                                $today = date('Y-m-d');
                                $rencana_angsuran_list = RencanaAngsuran::where('pinjaman_id', $pinjaman->id)->whereDate('tanggal', '<=', $today)->get();

                                foreach ($rencana_angsuran_list as $key => $rencana_angsuran) :

                            ?>
                                    <tr>
                                        <td><?= $key + 1; ?></td>
                                        <td><?= NumberFormat::money($rencana_angsuran->jumlah); ?></td>
                                        <td><?= $rencana_angsuran->angsuran_ke; ?></td>
                                        <td><?= Date::formatID($rencana_angsuran->tanggal); ?></td>
                                        <td><?= RencanaAngsuran::getStatusLunasLabel($rencana_angsuran->status_lunas); ?></td>

                                        <?php if (!$rencana_angsuran->status_lunas) : ?>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Action
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                        <li><a class="dropdown-item" href="<?= site_url() . 'rencana_angsuran/dibayarkan?id=' . $rencana_angsuran->id; ?>">Bayar</a></li>
                                                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#bayar_manual">Jumlah Berbeda</a></li>

                                                    </ul>
                                                </div>
                                            </td>
                                        <?php endif; ?>
                                        <?php if ($rencana_angsuran->status_lunas) : ?>

                                            <td> Dibayar : <?= Date::formatID($rencana_angsuran->tanggal_dibayarkan); ?></td>

                                        <?php endif; ?>
                                    </tr>


                            <?php endforeach;


                            //$this->data['Tasks'] = \DB::table('tb_tasks')->where('Status', 'like', 'Open%')->whereDate('DeadLine', '>', now())->count();

                            endforeach;
                            ?>

                        </table>





                    </div>
                    <!-- Angsuran tab -->
                    <div class="tab-pane fade" id="angsuran">
                        <div class="row my-4 shadow-sm p-3 mb-5 bg-body rounded">
                            <div class="col-10">
                                <p class="h5 text-success ps-0">Tabel Angsuran</p>
                            </div>
                            <div class="col-2 text-end">
                                <a href="<?= site_url(); ?>angsuran/form?anggota_id=<?= $anggota->id; ?>" class="btn btn-sm btn-outline-info ">Tambah</a>
                            </div>


                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>

                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">Angsuran Ke</th>
                                        <th> Kode Pinjaman</th>
                                        <th scope="col">Oleh</th>


                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($list_angsuran as $key => $angsuran) :
                                        //cari kode pinjaman
                                        $kode_pinjaman = Pinjaman::find($angsuran->pinjaman_id)->kode;

                                    ?>
                                        <tr>
                                            <td><?= $key + 1; ?></td>
                                            <td><?= Date::formatID($angsuran->tanggal); ?></td>
                                            <td><?= NumberFormat::IDR($angsuran->jumlah); ?></td>
                                            <td><?= $angsuran->angsuran_ke; ?></td>
                                            <td><?= $kode_pinjaman; ?></td>
                                            <td>Admin</td>

                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Pinjaman tab -->
                    <div class="tab-pane fade" id="pinjaman">


                        <div class="col-12 mt-4">
                            <div class="row  shadow-sm p-3 mb-5 bg-body rounded">
                                <div class="col-10">
                                    <p class="h5 text-danger ps-0">Riwayat Pinjaman</p>
                                </div>
                                <div class="col-2 text-end">

                                    <a href="<?= site_url(); ?>pinjaman/form?anggota_id=<?= $anggota->id; ?>"> <span class="btn btn-sm btn-outline-info">Tambah</span></a>

                                </div>

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Kode</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Jumlah</th>
                                            <th scope="col">Jum. Angsuran</th>
                                            <th scope="col">Angsuran</th>
                                            <th scope="col">Sisa</th>
                                            <th scope="col">Status</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php foreach ($list_pinjaman as $key => $pinjaman) :

                                            //hitung sisa pinjaman 
                                            $total_angsuran = Angsuran::where('pinjaman_id', $pinjaman->id)->sum('jumlah');

                                        ?>

                                            <tr>
                                                <td><?= $key + 1; ?></td>
                                                <td><?= $pinjaman->kode; ?></td>
                                                <td><?= Date::formatID($pinjaman->tanggal); ?></td>
                                                <td><a class="show_rencana_angsuran" data-id="<?= $pinjaman->id; ?>" href="#" data-bs-toggle="modal" data-bs-target="#rencana_angsuran_list"><?= NumberFormat::IDR($pinjaman->jumlah); ?></a></td>
                                                <td class="text-center"><?= $pinjaman->jumlah_kali_angsuran; ?></td>
                                                <td class="text-center"><?= NumberFormat::IDR($pinjaman->angsuran); ?></td>
                                                <td> <?= NumberFormat::money($pinjaman->jumlah - $total_angsuran); ?></td>
                                                <td><span class="badge bg-light text-warning">Belum Lunas</span></td>
                                            </tr>

                                        <?php endforeach; ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>


                    </div>
                    <!-- Simpanan tab -->
                    <div class="tab-pane fade" id="simpanan">
                        <div class="col-12 mt-4">
                            <div class="row my-4 shadow-sm p-3 mb-5 bg-body rounded">
                                <div class="col-10">
                                    <p class="h5 text-success ps-0">Riwayat Simpanan</p>
                                </div>
                                <div class="col-2 text-end">
                                    <a href="<?= site_url(); ?>simpanan/form?anggota_id=<?= $anggota->id; ?>"> <span class="btn btn-sm btn-outline-info">Tambah</span></a>
                                </div>

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Jumlah</th>
                                            <th scope="col">Diinput oleh</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php foreach ($list_simpanan as $key => $simpanan) : ?>
                                            <tr>
                                                <td><?= $key + 1; ?></td>
                                                <td><?= Date::formatID($simpanan->tanggal); ?></td>
                                                <td><?= NumberFormat::IDR($simpanan->jumlah); ?></td>
                                                <td>admin</td>

                                            </tr>


                                        <?php endforeach; ?>




                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>




            </div>






        </div>
    </div>

</div>





<!-- Modal -->
<div class="modal fade" id="rencana_angsuran_list" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Daftar Rencana Angsuran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body " id="list_rencana_angsuran">

                <!-- Ajax list of rencana angsuran will be shown here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="bayar_manual" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Daftar Rencana Angsuran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="form_bayar_manual">

                <form method="POST" action="<?= site_url() . 'angsuran'; ?>">
                    <div class="row">
                        <div class="col-3">
                            <div class="mb-3">
                                <label class="form-label">Kode Pinjaman</label>
                                <input type="kode" class="form-control">
                            </div>
                        </div>

                        <div class="col-9">
                            <div class="mb-3">
                                <label class="form-label">Pokok Pinjaman</label>
                                <input type="pokok_pinjaman" readonly class="form-control">
                            </div>
                        </div>

                    </div>

                    <div class="mb-3">
                        <label class="form-label">Isi Jumlah Custom Angsuran</label>
                        <input type="jumlah_angsuran" class="form-control money" placeholder="Isikan jumlah angsuran ">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Simpan</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

            </div>
            </form>
        </div>
    </div>
</div>



<script>
    $(document).on("click", ".show_rencana_angsuran", function() {


        //alert($(this).data('id'));
        let pinjaman_id = $(this).data('id');

        $.ajax({
            url: "<?= site_url(); ?>rencana_angsuran/list_rencana_angsuran?pinjaman_id=" + pinjaman_id,
            success: function(result) {
                $("#list_rencana_angsuran").html(result);
            }
        });

    });
</script>