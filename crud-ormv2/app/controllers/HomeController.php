<?php

namespace App\Controllers;

use App\Core\NumberFormat;
use App\Core\Date;

class HomeController
{

    public function index()
    {

        render('home');
    }



    public function form()
    {
        include_once 'view/form.php';
    }


    public function format()
    {
        $angka = Date::today();
        echo Date::time();
    }
}
