<?php
function checkUserSession(string $type, string $level = '.')
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
