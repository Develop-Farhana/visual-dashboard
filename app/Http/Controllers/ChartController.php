<?php

namespace App\Http\Controllers;

use App\Models\DataEntry;
use Illuminate\Http\Request;
use App\Models\ChartData; // Adjust this based on your model setup

class ChartController extends Controller
{
    public function chartData()
    {
        // Example conditions (adjust based on your actual logic)
        $startYear = 2000;
        $endYear = 2020;
        $country = 'YourCountry'; // Replace with actual country name or variable
    
        // Fetch data from your database based on conditions
        $count = DataEntry::where('year', '>=', $startYear)
                        ->where('year', '<=', $endYear)
                        ->where('country', $country)
                        ->count();
    
        return response()->json([
            'count' => $count,
        ]);
    }
    

    

    
}
