<?php

namespace App\Controllers;

use \Core\View;
use App\Models\User;

class User extends \Core\Controller
{
    protected function before()
    {

    }

    protected function after()
    {

    }
    
    public function indexAction()
    {
        View::render('Home/index');
    }

    public function registerAction()
    {

        $email = $this->getPost('email');
        $password = $this->getPost('pass');

    
        // dd($this->getPost());
        // dd($this->getPost('email'));

        echo $email . " :: " . $password;
    }
}