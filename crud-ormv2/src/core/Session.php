<?php

namespace App\Core;

class Session
{

    public static function  flash_message($message = false)
    {
        if ($message)
            self::session_save('flash_message', $message);

        return self::session_get('flash_message');
    }

    public static function  flash_message_get()
    {
        self::session_get('flash_message');
    }

    public static function  flash_message_clear()
    {
        self::session_unset('flash_message');
    }


    public static function showFlashMessage()
    {
        if (Session::flash_message()) :
            echo
            '<div class="alert alert-info my-3" role="alert"> 📌 ' .
                Session::flash_message() . Session::flash_message_clear() . '
            </div>';
        endif;
    }

    public static function  session_save($name, $val)
    {
        unset($_SESSION[$name]);
        $_SESSION[$name] = $val;
    }


    public static function session_get($name)
    {
        return ($_SESSION[$name]) ?? false;
    }

    public static function session_unset($name)
    {

        unset($_SESSION[$name]);
    }
}
