<?php

namespace App\Controllers;

use \Core\View;
use App\Models\User;

class Login extends \Core\Controller
{
    protected function before()
    {

    }

    protected function after()
    {

    }
    
    public function indexAction()
    {
        View::render('Login/index');
    }

    public function authenticateAction()
    {
        
    }
}