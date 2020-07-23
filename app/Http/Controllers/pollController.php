<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pollController extends Controller
{
    public function addpoll()
    {
    	return view ('frontend.pages.addpoll');
    }
    
}
