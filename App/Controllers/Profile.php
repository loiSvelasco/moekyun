<?php

namespace App\Controllers;

use \Core\View;
use App\Models\User;

class Profile extends \Core\Controller
{
    protected function before()
    {

    }

    protected function after()
    {

    }
    
    public function indexAction()
    {

    }

    public function showAction($id)
    {
        $user = new User();
        $account = $user->select()
                        ->where('id', $id)
                        ->result();

        View::render('Profile/index', [
            'user' => $account
        ]);
    }

    public function registerAction()
    {

        $email = $this->getPost('email');
        $password = $this->getPost('pass');


        echo $email . " :: " . $password;
    }
}