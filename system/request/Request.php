<?php
namespace System\Request;

class Request {
    public function getAllParams()
    {
        return (object) $_GET;
    }

    public function getAllData()
    {
        return (object) $_POST;
    }
}