<?php

namespace App\Controllers;

class login extends BaseController
{
  
    public function index()
    {
        return view("Auth/login");
    }

}
