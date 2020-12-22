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
    $current_password = $_POST['current_password'] ?? "";

    $User = new User();

    if (!password_verify($current_password, $User -> getColumn("password", $_SESSION['fingerprint'])))
    {
        echo "invalid_password";
        return;
    }
    
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

    if ($User -> updateColumn($full_name, "full_name", $_SESSION['fingerprint']))
    {
        $_SESSION['full-name'] = $full_name;
    }
    if ($User -> updateColumn($email, "email", $_SESSION['fingerprint']))
    {
        $_SESSION['email'] = $email;
    }
    $User -> updateColumn($ukn, "ukn", $_SESSION['fingerprint']);
    $User -> updateColumn($uis, "uis", $_SESSION['fingerprint']);
    $User -> updateColumn($cdc_relation_number, "cdc_relation_number", $_SESSION['fingerprint']);
    $User -> updateColumn($cdc_account_number, "cdc_account_number", $_SESSION['fingerprint']);
    $User -> updateColumn($clearing_member_id, "clearing_member_id", $_SESSION['fingerprint']);
    $User -> updateColumn($client_code, "client_code", $_SESSION['fingerprint']);
    $User = null;

    echo "success";
    return;

}
