<?php

namespace App\Http\Controllers;

use App\Models\Avaliation;
use App\Models\Company;

class DashboardController extends Controller
{
    public function index(Avaliation $avaliation)
    {
        $positive = $avaliation->positivePercentage();
        $negative = $avaliation->negativePercentage();

        $positiveTopFive = Company::positiveAvaliationTopFive();
        $negativeTopFive = Company::negativeAvaliationTopFive();

        $avaliationsTopFive = Avaliation::orderBy('created_at', 'desc')
            ->limit(5)->get();

        return view('dashboard', compact(
            'positive', 'negative', 
            'positiveTopFive', 'negativeTopFive',
            'avaliationsTopFive'
        ));    
    }

    
}
