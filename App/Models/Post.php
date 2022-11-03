<?php

namespace App\Models;

class Post extends \Core\Model
{
    protected $tableName = 'posts';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'content'];
}