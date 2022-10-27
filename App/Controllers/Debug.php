<?php

namespace App\Controllers;

use \Core\View;

class Debug extends \Core\Controller
{
    public function indexAction()
    {
        echo "<pre>" . print_r(get_declared_classes()) . "</pre>";
    }
}