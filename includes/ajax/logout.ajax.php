<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/bootstrap.php';

use App\Misc\Misc;

if (isset($_POST['ajax_request']))
{
    if (Misc::destroySession() === true)
    {
        echo "success";
    }
    return;

}
