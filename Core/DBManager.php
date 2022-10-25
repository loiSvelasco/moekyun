<?php

namespace Core;

use PDO;

class DBManager
{
    private $selectables = array();
    private $table;
    private $whereClause;
    private $orderBy;
    private $limit;

    public function select() {
        $this->selectables = func_get_args();
        return $this;
    }

    public function from($table) {
        $this->table = $table;
        return $this;
    }

    public function where($where) {
        $this->whereClause = $where;
        return $this;
    }

    public function orderBy($orderBy) {
        $this->orderBy = $orderBy;
        return $this;
    }

    public function limit($limit) {
        $this->limit = $limit;
        return $this;
    }

    public function result() {
        $query[] = "SELECT";
        if (empty($this->selectables)) {
            $query[] = "*";  
        }
        else {
            $query[] = join(', ', $this->selectables);
        }

        $query[] = "FROM";
        $query[] = $this->table;

        if (!empty($this->whereClause)) {
            $query[] = "WHERE";
            $query[] = $this->whereClause;
        }

        if (!empty($this->orderBy)) {
            $query[] = "ORDER BY";
            $query[] = $this->orderBy;
        }

        if (!empty($this->limit)) {
            $query[] = "LIMIT";
            $query[] = $this->limit;
        }

        $toExec = join(' ', $query);

        $db = static::getDB();

        $stmt = $db->query($toExec);

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $results;
    }
}


