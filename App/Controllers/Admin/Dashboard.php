<?php

namespace App\Controllers\Admin;

use \Core\View;
class Dashboard extends \Core\Controller
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
        $this->redirect('admin/users')
             ->alert('success', 'success alert')
             ->go();
             
        View::render('Admin/dashboard', []);
    }

}