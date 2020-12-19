<?php
defined('ROOT') or define('ROOT', $_SERVER['DOCUMENT_ROOT']);
require_once ROOT . "/vendor/autoload.php";

use \App\Misc\Misc;

Misc::startSession();

function checkUserSession(string $type, string $level)
{
    if ($type == "user")
    {
        if (!isset($_SESSION['fingerprint']) || !isset($_SESSION['full-name']) || !isset($_SESSION['email']))
        {
            header("Location: $level/index.php");
            exit();
        }
    }
    else if ($type == "index")
    {
        if (isset($_SESSION['fingerprint']) && isset($_SESSION['full-name']) && isset($_SESSION['email']))
        {
            header("Location: $level/dashboard.php");
            exit();
        }
    }
}
