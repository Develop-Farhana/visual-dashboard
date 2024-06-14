<?php

namespace App\Http\Controllers;

use App\Models\DataEntry;
use Illuminate\Http\Request;
use App\Models\ChartData; // Adjust this based on your model setup

class ChartController extends Controller
{
    public function getChartData(Request $request)
    {
        $startYear = $request->query('start_year');
        $endYear = $request->query('end_year');

        // Fetch data within the specified year range
        $query = DataEntry::query();
        if ($startYear) {
            $query->where('end_year', '>=', $startYear);
        }
        if ($endYear) {
            $query->where('end_year', '<=', $endYear);
        }
        $data = $query->select('end_year', 'intensity', 'likelihood')->get();

        // Return data as JSON
        return response()->json($data);
    }
    

    

    
}
