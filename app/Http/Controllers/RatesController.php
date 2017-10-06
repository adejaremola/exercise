<?php

namespace App\Http\Controllers;

use App\Application;
use Illuminate\Http\Request;

class RatesController extends Controller
{
    public function index()
    {
    	$applications = Application::all();
    	return view('home', compact('applications'));
    }
}
