<?php
namespace App\User;
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/bootstrap.php';

use App\Data\Dbh;
use App\Misc\Misc;

class User extends Dbh
{
    public function create(string $fullname, string $email, string $ukn, string $uis, string $cdc_relation_no, string $cdc_account_no, string $clearing_member_id, string $client_code, string $password, string $date) : int
    {
        $sql = "SELECT `email` FROM `users` WHERE `email` = ?";
        $this -> connect();

        $stmt = $this -> getDb() -> prepare($sql);
        $stmt -> execute([$email]);

        if ($stmt -> rowCount() > 0)
        {
            return 2;
        }

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $sql = "INSERT INTO `users` (fingerprint, full_name, email, ukn, uis, cdc_relation_number, cdc_account_number, clearing_member_id, client_code, `password`, registration_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this -> getDb() -> prepare($sql);
        if ($stmt -> execute([md5($email), $fullname, $email, $ukn, $uis, $cdc_relation_no, $cdc_account_no, $clearing_member_id, $client_code, $hashedPassword, $date]))
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }

    public function login(string $email, string $password)
    {
        $sql = "SELECT `email` FROM `users` WHERE `email` = ?";
        $this -> connect();

        $stmt = $this -> getDb() -> prepare($sql);
        $stmt -> execute([$email]);
        if ($stmt -> rowCount() < 1)
        {
            return 0;
        }
        else
        {
            $sql = "SELECT * FROM `users` WHERE `email` = ?";
            $stmt = $this -> getDb() -> prepare($sql);
            $stmt -> execute([$email]);
            $row = $stmt -> fetch(\PDO::FETCH_ASSOC);
            if (password_verify($password, $row['password']))
            {
                $Misc = new Misc();
                $Misc -> createUserSession($row['fingerprint'], $row['full_name'], $row['email']);
                return 1;
            }
            else
            {
                return  2;
            }
        }
    }
}