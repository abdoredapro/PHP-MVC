<?php

namespace Core;

use PDO;

class Model
{
    protected $db;

    protected $table;

    public function __construct()
    {
        $this->db = Database::connect();

        // $this->table = self::$table ?? strtolower(get_class($this));
    }

    public function all()
    {
        $statement = $this->db->connection->prepare("SELEC * FROM " . $this->table);
        
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}