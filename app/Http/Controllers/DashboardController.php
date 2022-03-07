<?php

namespace App\Http\Controllers;

use App\Models\Avaliation;

class DashboardController extends Controller
{
    public function index(Avaliation $avaliation)
    {
        $countAll = $avaliation->authorized()->count();
        $positive = ($avaliation->authorized()->where('avaliation_count', '>=', 7)->count() / $countAll) * 100;
        $negative = ($avaliation->authorized()->where('avaliation_count', '<', 7)->count() / $countAll) * 100;

        $positive = round($positive, 1);
        $negative = round($negative, 1);

        return view('dashboard', compact('positive', 'negative'));    
    }
}
