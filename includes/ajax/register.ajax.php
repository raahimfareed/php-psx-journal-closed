<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/bootstrap.php';

use App\User\User;

if (isset($_POST['ajax_request']))
{
    $full_name = $_POST['full_name'] ?? "";
    $email = $_POST['email'] ?? "";
    $ukn = $_POST['ukn'] ?? "";
    $uis = $_POST['uis'] ?? "";
    $cdc_relation_number = $_POST['cdc_relation_number'] ?? "";
    $cdc_account_number = $_POST['cdc_account_number'] ?? "";
    $clearing_member_id = $_POST['clearing_member_id'] ?? "";
    $client_code = $_POST['client_code'] ?? "";
    $password = $_POST['password'] ?? "";
    $password_confirm = $_POST['password_confirm'] ?? "";
    $registration_date = $_POST['registration_date'] ?? "";
    
    if (empty($full_name))
    {
        echo "full_name_empty";
        return;
    }
    else if (strlen($full_name) > 64)
    {
        echo "full_name_long";
        return;
    }

    if (empty($email))
    {
        echo "email_empty";
        return;
    }
    else if (strlen($email) >= 254)
    {
        echo "email_long";
        return;
    }
    
    if (strlen($ukn) > 32)
    {
        echo "ukn_long";
        return;
    }
    if (strlen($uis) > 32)
    {
        echo "uis_long";
        return;
    }
    if (strlen($cdc_relation_number) > 32)
    {
        echo "cdc_relation_number_long";
        return;
    }
    if (strlen($cdc_account_number) > 32)
    {
        echo "cdc_account_number_long";
        return;
    }
    if (strlen($clearing_member_id) > 32)
    {
        echo "clearing_member_id_long";
        return;
    }
    if (strlen($client_code) > 32)
    {
        echo "client_code_long";
        return;
    }

    if (strlen($password) < 8)
    {
        echo "password_short";
        return;
    }
    if ($password != $password_confirm)
    {
        echo "password_no_match";
        return;
    }

    $User = new User();
    switch ($User -> create($full_name, $email, $ukn, $uis, $cdc_relation_number, $cdc_account_number, $clearing_member_id, $client_code, $password, $registration_date))
    {
        case 0:
            echo "db";
            break;
        case 1:
            echo "success";
            break;
        case 2:
            echo "email_taken";
            break;
    }
    $User = null;
    return;

}
