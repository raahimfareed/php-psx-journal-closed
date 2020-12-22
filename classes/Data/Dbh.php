<?php
namespace App\Data;

require_once $_SERVER['DOCUMENT_ROOT'] . '/config/bootstrap.php';

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

        $json_config = file_get_contents(ROOT."/config/app.json");
        if ($json_config === false) {
            return false;
        }

        if ($json_config === null) {
            return false;
        }

        $config = json_decode($json_config, true);

        $this -> host = $config['db-host'];
        $this -> port = $config['db-port'];
        $this -> dbname = $config['db-name'];
        $this -> user = $config['db-user'];
        $this -> password = $config['db-password'];
        $this -> charset = $config['db-charset'];
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