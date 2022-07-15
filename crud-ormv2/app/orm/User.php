<?php

namespace App\ORM;

use App\Core\BaseORM;

class User extends BaseORM
{
    protected $table = 'user';


    static function isLoggedIn()
    {
        if (!$_SESSION['isLoggedIn']) {
            redirect(site_url() . 'login');
        }
        return;
    }
}
