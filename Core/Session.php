<?php

namespace Core;

class Session
{
    public function __construct()
    {
        if(session_status() === PHP_SESSION_NONE)
        {
            session_start();
        }
    }

    public function set(string $key, $val)
    {
        if(! isset($_SESSION[$key]))
        {
            $_SESSION[$key] = $val;
        }
        else
        {
            throw new \Exception("Session '$key' already exists.");
        }
    }

    public function get(string $key)
    {
        if(! isset($_SESSION[$key]))
        {
            return false;
        }

        return $_SESSION[$key];
    }

    public function destroy(string $key)
    {
        if(isset($_SESSION[$key]))
        {
            unset($_SESSION[$key]);
            return true;
        }
        else
        {
            throw new \Exception("Unable to destroy session '$key': Session does not exist.");
        }
    }


}