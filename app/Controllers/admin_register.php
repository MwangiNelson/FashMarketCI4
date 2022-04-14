<?php

namespace App\Controllers;

class admin_register extends BaseController
{

    public function index()
    {
        return view("Auth/admin_register.php");
    }
}
