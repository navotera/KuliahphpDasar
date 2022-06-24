<?php

use App\Core\Date;
use App\Core\NumberFormat;
?>

<table class="table table-bordered">

    <thead>
        <tr>
            <td>No</td>
            <td>Jumlah Angsuran</td>
            <td>Tanggal</td>
            <td>Status</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($list as $key => $rencana_angsuran) : ?>
            <tr>
                <td><?= $key + 1; ?></td>
                <td><?= NumberFormat::money($rencana_angsuran->jumlah); ?></td>
                <td><?= Date::formatID($rencana_angsuran->tanggal); ?></td>
                <td><?= $rencana_angsuran->status_lunas; ?></td>
                <td><a href="#" class="btn btn-outline-primary"> Bayar </a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>


</table>