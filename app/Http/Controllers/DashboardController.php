<?php

namespace App\Http\Controllers;

use App\Models\Avaliation;

class DashboardController extends Controller
{
    public function index(Avaliation $avaliation)
    {
        $countAll = $avaliation->authorized()->count();
        $positive = $avaliation->authorized()->where('avaliation_count', '>=', 7)->count();
        $negative = $avaliation->authorized()->where('avaliation_count', '<', 7)->count();
        
        if ($positive > 0) {
            $positive = ($positive / $countAll) * 100;
        }

        if ($negative > 0) {
            $negative = ($negative / $countAll) * 100;
        }
        
        $positive = round($positive, 1);
        $negative = round($negative, 1);

        return view('dashboard', compact('positive', 'negative'));    
    }
}
