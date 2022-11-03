<?php

namespace Core;

use PDO;
use App\Database;
class DBManager
{
    private $selectables = array();
    private $whereClause;
    private $orderBy;
    private $limit;

    protected static function getDB()
    {
        $host = $_ENV['DB_HOST'];
        $name = $_ENV['DB_NAME'];
        $user = $_ENV['DB_USER'];
        $pass = $_ENV['DB_PASS'];

        static $db = null;

        if($db === null)
        {
            $db = new PDO(
                "mysql:host=$host;
                 dbname=$name;
                 charset=utf8mb4", 
                $user, 
                $pass
            );
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db;
        }
    }

    public function select()
    {
        $this->selectables = func_get_args();
        return $this;
    }

    public function where($column, $id)
    {
        $this->whereClause = "$column = $id";
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
        return $this->select()
                    ->result();
    }

    public function find($id)
    {
        return $this->select()
                    ->where($this->primaryKey, $id)
                    ->first()
                    ->result();
    }

    public function insert(array $vals)
    {
        foreach($this->fillable as $col)
        {
            $vaCols .= ":$col,";
        }
        $vaCols = rtrim($vaCols, ',');
        $toCols = implode(',', $this->fillable);
        $toBind = explode(',', $vaCols);

        // get tablename, fillable columns, form the model called
        $db = static::getDB();
        $stmt = "INSERT INTO $this->tableName($toCols) VALUES($vaCols)";
        $query = $db->prepare($stmt);
        
        if(count($toBind) !== count($vals))
        {
            throw new \Exception("
                Columns in the data model does not
                match the number of values to bind from the insert() function.
            ");
        }

        for($i = 0; $i < count($toBind); $i++)
        {
            $query->bindParam($toBind[$i], $vals[$i]);
        }


        $query->execute();
        return $db->lastInsertId();
    }

}


