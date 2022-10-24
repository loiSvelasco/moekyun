<?php

namespace App\Controllers;

use \Core\View;
use App\Models\Post;

class Posts extends \Core\Controller
{
    public function indexAction()
    {
        $posts = Post::getAll();
        View::renderTemplate('Posts/index.html', [
            'posts' => $posts
        ]);
    }

    public function addNewAction()
    {
        echo 'addNew from the posts controller';
    }

    public function editAction()
    {
        //echo 'ID: ' . $this->route_params['id'];
        echo '<p>Route parameters: <pre>' . htmlspecialchars(print_r($this->route_params, true)) . '</pre></p>';
    }

    public function viewAction()
    {
        echo 'id: ' . $this->route_params['id'];
    }
}