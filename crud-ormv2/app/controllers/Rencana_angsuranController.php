<?php

namespace App\Controllers;

use App\ORM\RencanaAngsuran;
use App\Core\GET;

class Rencana_angsuranController
{
    function list_rencana_angsuran()
    {
        $pinjaman_id = GET::get('pinjaman_id');
        $data['list'] = RencanaAngsuran::where('pinjaman_id', $pinjaman_id)->get();

        view('rencana_angsuran/list', $data);
    }
}
