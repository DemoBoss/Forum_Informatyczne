<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UpsController extends Controller
{
    public function index()
    {
        return view('/ups');
    }
}
