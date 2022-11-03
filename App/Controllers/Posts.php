<?php

namespace App\Controllers;

use \Core\View;
use App\Models\Post;

class Posts extends \Core\Controller
{
    private $postModel;

    public function __construct()
    {
        $this->postModel = new Post;
    }
    
    public function indexAction()
    {
        $posts = $this->postModel
                      ->select()
                      ->orderBy('id ASC')
                      ->result();

        View::render('Posts/index', [
            'posts' => $posts
        ]);
    }

    public function addNewAction()
    {
     
    }

    public function editAction()
    {
     
    }

    public function viewAction($id)
    {
        $post = $this->postModel
                     ->find($id);

        if( ! $post)
        {
            $this->redirectTo('posts/index');
        }
        else
        {
            View::render('Posts/index', [
                'posts' => $post
            ]);
        }
    }

    public function customAction($track, $status)
    {
        View::render('Posts/custom', [
            'track' => $track,
            'status' => $status
        ]);
    }

    public function insertAction()
    {
        $insert = $this->postModel->insert([
            'seventh post',
            'seventh post content',
        ]);

        if($insert)
        {
            View::render('Posts/custom', [
                'track' => "Successfully inserted data with id: ",
                'status' => $insert
            ]);
        }
    }
}