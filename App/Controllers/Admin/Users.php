<?php

namespace App\Controllers\Admin;

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
        echo "index from admin/users";
    }
}