<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/bootstrap.php';

use App\User\User;

if (isset($_POST['ajax_request']))
{
    $email = $_POST['email'] ?? "";
    $password = $_POST['password'] ?? "";

    if (empty($email))
    {
        echo "email_empty";
        return;
    }
    else if (strlen($email) >= 254)
    {
        echo "email_invalid";
        return;
    }
    
    if (empty($password))
    {
        echo "password_empty";
        return;
    }

    $User = new User();
    switch ($User -> login($email, $password))
    {
        case 0:
            echo "no_user";
            break;
        case 1:
            echo "success";
            break;
        case 2:
            echo "invalid_password";
            break;
    }
    $User = null;
    return;

}
