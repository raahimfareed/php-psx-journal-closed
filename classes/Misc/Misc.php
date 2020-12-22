<?php
namespace App\Misc;
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/bootstrap.php';

class Misc
{
    public static function startSession()
    {
        if (session_status() == PHP_SESSION_NONE)
        {
            session_start();
        }
    }

    public static function createUserSession(string $fingerprint, string $fullname, string $email)
    {
        self::startSession();
        $_SESSION['fingerprint'] = $fingerprint;
        $_SESSION['full-name'] = $fullname;
        $_SESSION['email'] = $email;
    }

    public static function destroySession()
    {
        if (session_status() == PHP_SESSION_ACTIVE)
        {
            unset($_SESSION);
            session_destroy();
        }
        return true;
    }
}