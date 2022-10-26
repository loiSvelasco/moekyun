<?php

namespace Core;

use PDO;

class DBManager
{
    private $selectables = array();
    // private $table;
    private $whereClause;
    private $orderBy;
    private $limit;

    public function select()
    {
        $this->selectables = func_get_args();
        return $this;
    }

    // public function from($table)
    // {
    //     $this->table = $table;
    //     return $this->table;
    // }

    public function where($where)
    {
        $this->whereClause = $where;
        return $this;
    }

    public function orderBy($orderBy)
    {
        $this->orderBy = $orderBy;
        return $this;
    }

    public function limit($limit)
    {
        $this->limit = $limit;
        return $this;
    }

    public function first()
    {
        $this->limit = "1";
        return $this;
    }

    private function buildQuery()
    {
        $query[] = "SELECT";
        if (empty($this->selectables))
        {
            $query[] = "*";  
        }
        else
        {
            $query[] = join(', ', $this->selectables);
        }

        $query[] = "FROM";
        $query[] = $this->tableName;

        if (!empty($this->whereClause))
        {
            $query[] = "WHERE";
            $query[] = $this->whereClause;
        }

        if (!empty($this->orderBy))
        {
            $query[] = "ORDER BY";
            $query[] = $this->orderBy;
        }

        if (!empty($this->limit))
        {
            $query[] = "LIMIT";
            $query[] = $this->limit;
        }

        return join(' ', $query);
    }

    public function generateSql()
    {
        return $this->buildQuery();
    }

    public function result()
    {
        $db = static::getDB();
        $toExec = $this->buildQuery();
        $stmt = $db->query($toExec);
        
        if(property_exists($this, 'returnType'))
        {
            if($this->returnType == 'row')
            {
                $results = $stmt->fetchAll(PDO::FETCH_BOTH);
                return $results[0];
            }
        }
        
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    public function selectAll()
    {
        try
        {
            return $this->select()
                        ->result();
        }
        catch (PDOException $e)
        {
            throw new \Exception($e->getMessage());
        }

    }

}


