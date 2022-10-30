<?php

namespace Core;

use Session;
class Auth
{
    private $session;

    public function __construct()
    {
        $this->session = new Session;
    }

    public function isAuthenticated($id)
    {
        if($this->session->get('user_id') === $id)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function loginUser($id)
    {
        
    }

    public function logoutUser($id)
    {

    }

}