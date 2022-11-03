<?php

namespace App\Models;

class User extends \Core\Model
{
    protected $tableName = 'users';
    protected $primaryKey = 'id';
    protected $returnType = 'row';
    
}