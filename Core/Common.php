<?php

use Core\Session;

function session(string $key = null)
{
    $session = new Session();
    
    if($key != null)
    {
        return $session->get($key);
    }

    return $session;
}