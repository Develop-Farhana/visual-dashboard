<?php

namespace App\Http\Controllers;

use App\Models\DataEntry;
use Illuminate\Http\Request;

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
        
        // Add conditions to exclude records where intensity or likelihood is 0
        $query->where('intensity', '>', 0)
              ->where('likelihood', '>', 0);

        // Select only necessary columns
        $data = $query->select('end_year', 'intensity', 'likelihood')->get();

        // Return data as JSON
        return response()->json($data);
    }



    public function getRelevanceData()
{
    $topic = DataEntry::pluck('topic')->toArray(); // Assuming 'name' is the attribute for topic names
    $relevanceValues = DataEntry::pluck('relevance')->toArray(); // Assuming 'relevance' is the attribute for relevance values

    return response()->json([
        'topic' => $topic,
        'relevanceValues' => $relevanceValues,
    ]);

    
}

public function getMapData()
    {
        $mapData = DataEntry::all(); // Fetch map data from your database table

        return response()->json($mapData);
    }

    public function getTotalCounts()
    {
        $totalCountries = DataEntry::distinct('country')->count('country');
        $totalCities = DataEntry::distinct('city')->count('city');
        $totalRegions = DataEntry::distinct('region')->count('region');

        return response()->json([
            'totalCountries' => $totalCountries,
            'totalCities' => $totalCities,
            'totalRegions' => $totalRegions,
        ]);
    }
}