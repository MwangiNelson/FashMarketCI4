<?php

namespace App\Controllers;

class help extends BaseController
{
    public function index()
    {
       echo view("Auth/help.php");
    }
}
