<?php

namespace App\Controllers;

class admin extends BaseController
{
    public function index()
    {
       return view("Auth/admin");
    }
}
