<?php
require_once realpath("vendor/autoload.php");

\App\Misc\Misc::startSession();

if (isset($_SESSION['fingerprint']) && isset($_SESSION['full-name']) && isset($_SESSION['email']))
{
    header("Location: index.php");
    exit();
}
else
{
    if (!empty($_SESSION['fingerprint']) && !empty($_SESSION['full-name']) && !empty($_SESSION['email']))
    {
        header("Location: index.php");
        exit();
    }
}
