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

        $user = $isUserExist;

        //user ada berdasarkan email yang diisi di form, kemudian dilanjutkan dengan pengecekan paswword

        $canLoggedIn =  password_verify($post->password, $user->password);

        if (!$canLoggedIn) {
            $_SESSION['message'] = "Anda tidak memiliki akses!";
            redirect(site_url() . 'login');
        }

        //no problem with username and password, all is correct
        $_SESSION['message'] = 'Hola ' . $user->username;
        $_SESSION['isLoggedIn'] = true;
        $_SESSION['UserID'] = $user->id;
        $_SESSION['username'] = $user->username;
        redirect(site_url());
    }


    public function logout()
    {
        session_destroy();
        redirect(site_url() . 'login');
    }
}
