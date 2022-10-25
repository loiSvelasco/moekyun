<?php

namespace App\Controllers;

use \Core\View;

class Home extends \Core\Controller
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
        
        if(count($this->validatePost()) !== 0)
        {
            $email = $this->getPost('email');
            $password = $this->getPost('pass');
        }
        else
        {
            echo "All fields are required";
        }
    
        // dd($this->getPost());
        // dd($this->getPost('email'));

        echo $email . " :: " . $password;
    }
}