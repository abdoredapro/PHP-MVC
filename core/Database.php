<?php

namespace Core;

use Exception;
use PDO;
use PDOException;

class Database
{
    /**
     * @var string $db hostname
     */
    private string $host = 'localhost';

    /**
     * @var string $db username
     */
    private string $user = 'root';

    /**
     * @var string $db password
     */
    private string $pass = '';

    /**
     * @var string $db database name
     */
    private string $db = 'test';

    public $connection = null;
    public static $instance = null;

    private function __construct()
    {
        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $db = 'test';

        try {
            $this->connection = new PDO("mysql:host=$host;dbname=$db", $user, $pass);

            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $exception) {
            throw new Exception($exception->getMessage());
        }
    }

    public static function connect()
    {
        if (self::$instance == null) {
            self::$instance = new Database();
        }

        return self::$instance;
    }
}