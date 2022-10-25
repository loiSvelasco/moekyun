<?php

namespace Core;

use PDO;
use App\Config;

abstract class Model extends DBManager
{
    protected static function getDB()
    {
        static $db = null;

        if($db === null)
        {
            $db = new PDO("mysql:host=" . Config::DB_HOST . ";
                                 dbname=" . Config::DB_NAME . ";
                                 charset=utf8mb4", 
                                 Config::DB_USER, Config::DB_PASS
                        );

            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db;
        }
    }

    // private $selectables = array();
    // private $table;
    // private $whereClause;
    // private $limit;

    // public function select() {
    //     $this->selectables = func_get_args();
    //     return $this;
    // }

    // public function from($table) {
    //     $this->table = $table;
    //     return $this;
    // }

    // public function where($where) {
    //     $this->whereClause = $where;
    //     return $this;
    // }

    // public function limit($limit) {
    //     $this->limit = $limit;
    //     return $this;
    // }

    // public function result() {
    //     $query[] = "SELECT";
    //     // if the selectables array is empty, select all
    //     if (empty($this->selectables)) {
    //         $query[] = "*";  
    //     }
    //     // else select according to selectables
    //     else {
    //         $query[] = join(', ', $this->selectables);
    //     }

    //     $query[] = "FROM";
    //     $query[] = $this->table;

    //     if (!empty($this->whereClause)) {
    //         $query[] = "WHERE";
    //         $query[] = $this->whereClause;
    //     }

    //     if (!empty($this->limit)) {
    //         $query[] = "LIMIT";
    //         $query[] = $this->limit;
    //     }

    //     $toExec = join(' ', $query);

    //     $db = static::getDB();

    //     $stmt = $db->query($toExec);

    //     $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //     return $results;
    // }
}