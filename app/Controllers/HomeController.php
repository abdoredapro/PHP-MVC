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

        dd($users);

        return $this->view('index', ['title' => 'Our home']);
    }

    public function about()
    {
        return $this->view('about', ['title' => 'About Us']);
    }
}
