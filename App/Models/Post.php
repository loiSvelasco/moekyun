<?php

namespace App\Models;

class Post extends \Core\Model
{
    protected $tableName = 'posts';
    protected $columns = ['id', 'title', 'content', 'created_at'];
}