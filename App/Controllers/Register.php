<?php

namespace App\Controllers;

use \Core\View;
use App\Models\User;

class Register extends \Core\Controller
{
    protected function before()
    {

    }

    protected function after()
    {

    }
    
    public function indexAction()
    {
        View::render('Register/index');
    }

    public function createAction()
    {
        
    }
}