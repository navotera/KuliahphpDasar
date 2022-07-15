<?php

namespace App\Controllers;

use App\Core\NumberFormat;
use App\Core\Date;

use App\ORM\User;

class HomeController
{

    public function index()
    {
        //check if user is logged in, if not, show the login page
        User::isLoggedIn();

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
