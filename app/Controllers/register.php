<?php

namespace App\Controllers;

class register extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
    }
    public function index()
    {
        return view("Auth/register");
    }
}
