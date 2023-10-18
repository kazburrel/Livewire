<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function createView()
    {
        return view('posts.create');
    }
    
    public function postProduct()
    {
        return view('posts.wizard');
    }
}
