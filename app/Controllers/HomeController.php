<?php

namespace App\Controllers;

use App\Model\User;
use Core\Controller;

final class HomeController extends Controller
{
    public function index()
    {
        $user = new User();

        $vendor = new Vendor();

        $users = $user->all();

        var_dumpss($users);

        // TODO

        // Main page

        // Second Main Page

        // Third Main Page

        return $this->view('index', ['title' => 'Our home']);
    }

    public function about()
    {
        return $this->view('about', ['title' => 'About Us']);
    }
}
