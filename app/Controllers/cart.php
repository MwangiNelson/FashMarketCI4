<?php

namespace App\Controllers;

class cart extends BaseController
{
    public function index()
    {
       return view("Auth/cart");
    }
}
