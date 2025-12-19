<?php

namespace Core;

class App
{
    public function run()
    {
        $router = new Router();
        require_once __DIR__ . '/../routes/web.php';
        $router->dispatch();
    }
}
