<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class csrfController extends Controller
{
    public function index()
    {
        return csrf_token(); 
    }
}
