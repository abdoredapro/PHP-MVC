<?php

namespace Core;

class Controller
{
    public function view($name, $data = [])
    {
        extract($data);
        require_once __DIR__ . "/../app/Views/$name.php";
    }
}
