<?php

use App\Core\Date;
use App\Core\NumberFormat;

use App\ORM\RencanaAngsuran;

?>

<table class="table table-bordered">

    <thead>
        <tr>
            <td>No</td>
            <td>Jumlah Angsuran</td>
            <td>Tanggal</td>
            <td>Status</td>
            <td>Info</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($list as $key => $rencana_angsuran) : ?>
            <tr>
                <td><?= $key + 1; ?></td>
                <td><?= NumberFormat::money($rencana_angsuran->jumlah); ?></td>
                <td><?= Date::formatID($rencana_angsuran->tanggal); ?></td>
                <td><?= RencanaAngsuran::getStatusLunasLabel($rencana_angsuran->status_lunas);  ?></td>

                <?php if (!$rencana_angsuran->status_lunas) : ?>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                Action
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="<?= site_url() . 'rencana_angsuran/dibayarkan?id=' . $rencana_angsuran->id; ?>">Bayar</a></li>
                                <li><a class="dropdown-item" href="#" href="#" data-bs-toggle="modal" data-bs-target="#bayar_manual">Jumlah Berbeda</a></li>

                            </ul>
                        </div>
                    </td>
                <?php endif; ?>
                <?php if ($rencana_angsuran->status_lunas) : ?>

                    <td> Dibayar : <?= Date::formatID($rencana_angsuran->tanggal_dibayarkan); ?></td>

                <?php endif; ?>
            </tr>
        <?php endforeach; ?>

    </tbody>


</table>