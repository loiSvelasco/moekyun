<?php

namespace App\Controllers\Admin;

use \Core\View;

class Users extends \Core\Controller
{
    protected function before()
    {
        // make sure an authenticated user is logged in
    }

    protected function after()
    {

    }

    public function indexAction()
    {
        View::render('Admin/users', []);
    }

}