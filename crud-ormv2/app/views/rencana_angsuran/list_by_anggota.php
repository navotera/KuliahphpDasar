<?php

use App\ORM\RencanaAngsuran;
use App\Core\NumberFormat;
use App\Core\Date;

?>

<!-- list pinjaman, lalu list rencana angsuran yang sudah jatuh tempo -->
<table class="table mt-4">
    <tr>
        <td>No</td>
        <td>Kode Pinjaman</td>
        <td>Jumlah</td>
        <td>Angsuran Ke</td>
        <td>Tanggal Jatuh Tempo</td>
        <td>Status</td>
        <td>Info</td>
    </tr>

    <?php
    $bulan_ini = date('m');
    $tahun_ini = date('Y');


    foreach ($list_pinjaman as $pinjaman) :
        //check rencana angsuran tiap pinjaman tersebut yang rencana angsuran jatuh tempo
        $today = date('Y-m-d');
        $rencana_angsuran_list = RencanaAngsuran::where('pinjaman_id', $pinjaman->id)->whereMonth('tanggal', '<=', $bulan_ini)->whereYear('tanggal', '<=', $tahun_ini)->get();

        foreach ($rencana_angsuran_list as $key => $rencana_angsuran) :

    ?>
            <tr>
                <td><?= $key + 1; ?></td>
                <td><?= $pinjaman->kode; ?></td>
                <td><?= NumberFormat::money($rencana_angsuran->jumlah); ?></td>
                <td><?= $rencana_angsuran->angsuran_ke; ?></td>
                <td><?= Date::formatID($rencana_angsuran->tanggal); ?></td>
                <td>
                    <?= RencanaAngsuran::getStatusLunasLabel($rencana_angsuran->status_lunas); ?>

                    <?php if ($rencana_angsuran->status_lunas) : ?>
                        <a href="<?= site_url() . 'rencana_angsuran/batal?rencana_angsuran_id=' . $rencana_angsuran->id; ?>" class="text-blue" data-bs-toggle="tooltip" title="Batalkan"><i class="bi bi-arrow-counterclockwise"></i></a>
                    <?php endif; ?>
                </td>

                <?php if (!$rencana_angsuran->status_lunas) : ?>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                Action
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="<?= site_url() . 'rencana_angsuran/dibayarkan?id=' . $rencana_angsuran->id; ?>">Bayar</a></li>
                                <li><a class="dropdown-item bayar_angsuran" href="#" data-bs-toggle="modal" data-bs-target="#bayar_manual" data-rencana_angsuran_id="<?= $rencana_angsuran->id; ?>" data-pinjaman_id="<?= $pinjaman->id; ?>">Jumlah Berbeda</a></li>

                            </ul>
                        </div>
                    </td>
                <?php endif; ?>
                <?php if ($rencana_angsuran->status_lunas) : ?>
                    <td>
                        Dibayar : <?= Date::formatID($rencana_angsuran->tanggal_dibayarkan); ?>
                    </td>
                <?php endif; ?>



            </tr>


    <?php endforeach;


    //$this->data['Tasks'] = \DB::table('tb_tasks')->where('Status', 'like', 'Open%')->whereDate('DeadLine', '>', now())->count();

    endforeach;
    ?>

</table>





<!-- Modal Bayar  Angsuran Custom -->
<div class="modal fade" id="bayar_manual" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Daftar Rencana Angsuran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="form_bayar_manual">

                <form method="POST" action="<?= site_url() . 'angsuran/save'; ?>">

                    <input type="hidden" name="pinjaman_id">
                    <input type="hidden" name="custom">
                    <input type="hidden" name="anggota_id">
                    <input type="hidden" name="rencana_angsuran_id">

                    <div class="row">
                        <div class="col-3">
                            <div class="mb-3">
                                <label class="form-label">Kode Pinjaman</label>
                                <input type="text" name="kode_pinjaman" class="form-control">
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="mb-3">
                                <label class="form-label">Pokok Pinjaman</label>
                                <input type="text" name="pokok_pinjaman" readonly class="form-control">
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="mb-3">
                                <label class="form-label">Sisa Pinjaman</label>
                                <input type="text" name="sisa_pinjaman" readonly class="form-control">
                            </div>
                        </div>

                    </div>

                    <div class="mb-3">
                        <label class="form-label">Isi Jumlah Custom Angsuran</label>
                        <input type="text" name="jumlah" class="form-control money" placeholder="Isikan jumlah angsuran ">
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


<!-- Javascript code when clicking data bayar angsuran custom -->
<script>
    $(document).on("click", ".bayar_angsuran", function() {

        let pinjaman_id = $(this).data('pinjaman_id');
        let rencana_angsuran_id = $(this).data('rencana_angsuran_id');


        $.ajax({
            url: "<?= site_url(); ?>rencana_angsuran/get_info_pinjaman_ajax?pinjaman_id=" + pinjaman_id,
            success: function(json) {
                $('input[name="pinjaman_id"').val(json.id);
                $('input[name="kode_pinjaman"').val(json.kode);
                $('input[name="pokok_pinjaman"').val(json.jumlah);
                $('input[name="sisa_pinjaman"').val(json.sisa);
                $('input[name="anggota_id"').val(json.anggota_id);

                $('input[name="rencana_angsuran_id"').val(rencana_angsuran_id);



                //untuk menandai bahwa angsuran ini bersifat custom
                $('input[name="custom"').val(1);

                console.log(json);
            }
        });


    });
</script>