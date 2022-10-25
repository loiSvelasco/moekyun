<?php

namespace App\Models;

use PDO;

class Post extends \Core\Model
{

    public function getAll()
    {
        try
        {
            $db = static::getDB();

            $stmt = $db->query('SELECT * FROM posts ORDER BY created_at');

            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $results;
        }
        catch (PDOException $e)
        {
            throw new \Exception($e->getMessage());
        }
    }
}