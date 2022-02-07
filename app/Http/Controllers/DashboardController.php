<?php

namespace App\Http\Controllers;

use App\Models\Commission;
use App\Models\VISITOR;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');    
    }
}
