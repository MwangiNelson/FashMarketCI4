<?php

namespace App\Controllers;

class test extends BaseController
{
    public function index()
    {
        echo view("Auth/test.php");
    }

}
