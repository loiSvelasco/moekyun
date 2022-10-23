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
        // echo 'home - index controller';
        // View::render('Home/index.php', [
        //     'name' => 'Louis',
        //     'colors' => ['red', 'green', 'blue']
        // ]);

        View::renderTemplate('Home/index.html', [
            'name' => 'Louis',
            'colors' => ['red', 'green', 'blue']
        ]);
    }
}