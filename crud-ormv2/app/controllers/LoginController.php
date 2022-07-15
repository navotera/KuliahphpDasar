<?php


namespace App\Controllers;

use App\Core\Date;
use App\Core\Session;

use App\ORM\User;



class LoginController
{


    public function index()
    {

        view('login');
    }

    public function password_create()
    {

        $pass = 'admin';
        echo password_hash($pass, PASSWORD_DEFAULT);
    }


    public function action()
    {
        $post = (object) $_POST;
        $canLoggedIn = false;

        //find user by email
        $isUserExist = User::where('email', $post->email)->first();

        if (!$isUserExist) {
            $_SESSION['message'] = "User tidak ditemukan";
            redirect(site_url() . 'login');
        }

        //user ada berdasarkan email yang diisi di form, kemudian dilanjutkan dengan pengecekan paswword

        $canLoggedIn =  password_verify($post->password, $isUserExist->password);

        if (!$canLoggedIn) {
            $_SESSION['message'] = "Anda tidak memiliki akses!";
            redirect(site_url() . 'login');
        }

        echo 'anda berhasil login';
        exit;

        //no problem with username and password, all is correct
        $_SESSION['message'] = 'Hola ' . $isUserExist->username;
        $_SESSION['isLoggedIn'] = true;
        $_SESSION['UserID'] = $isUserExist->id;
        $_SESSION['username'] = $isUserExist->username
        redirect(site_url());
    }
}
