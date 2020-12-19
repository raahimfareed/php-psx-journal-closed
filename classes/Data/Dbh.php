<?php
namespace App\Data;

use \PDO;

class Dbh
{
    private $host;
    private $port;
    private $charset;
    private $dbname;
    private $user;
    private $password;
    protected $error;
    private $connection;

    public function __construct()
    {
        $this -> host = 'localhost';
        $this -> port = 3307;
        $this -> dbname = 'psxj';
        $this -> user = 'root';
        $this -> password = '';
        $this -> charset = 'utf8mb4';
    }

    public function connect()
    {
        try
        {
            $dsn = 'mysql:dbname=' . $this -> dbname . ';host=' . $this -> host . ';port=' . $this -> port . ';charset=' . $this -> charset;
            $this -> connection = new PDO($dsn, $this -> user, $this -> password);
            $this -> connection -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (\PDOException $e)
        {
            $this -> error = $e;
        }
    }

    public function getDb()
    {
        if ($this -> connection instanceof PDO)
        {
            return $this -> connection;
        }
    }

    public function getError () {
        var_dump($this -> error);
    }
}