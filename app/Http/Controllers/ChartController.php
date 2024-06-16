<?php

namespace App\Http\Controllers;

use App\Models\DataEntry;
use Illuminate\Http\Request;
use DB;
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
    $dataEntries = DataEntry::select('topic', DB::raw('COUNT(*) as total_count'))
                            ->groupBy('topic')
                            ->havingRaw('COUNT(*) < 100')
                            ->orderByDesc('total_count')
                            ->limit(5)
                            ->get();

    $topics = $dataEntries->pluck('topic')->toArray();
    $relevanceValues = $dataEntries->pluck('total_count')->toArray(); // Rename this to match your frontend needs

    return response()->json([
        'topic' => $topics,
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