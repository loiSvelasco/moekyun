<?php

namespace Core;

class Navigator
{
    private $to;
    private $response;
    private $alertMsg;
    private $alertType;

    public function redirect(string $url, int $code = 200)
    {
        $this->to = "Location: " . $_ENV['BASE_URL'] . "/$url";
        $this->response = $code;
        return $this;
    }

    public function alert(string $type, string $msg)
    {
        $this->alertType = $type;
        $this->alertMsg = $msg;
        return $this;
    }

    public function go()
    {
        session()->set($this->alertType, $this->alertMsg);
        header($this->to, $this->response);
        exit;
    }

}