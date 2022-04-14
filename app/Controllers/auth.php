<?php

namespace App\Controllers;

class auth extends BaseController
{
    public function index()
    {
       return view("Auth/init");
    }
}
