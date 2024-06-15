<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataEntry;

class DashboardController extends Controller
{
    public function demo()
    {
        $data = DataEntry::all(); // Paginate the results with 10 items per page
    
        return view('admin.table', ['data' => $data]);
    }
    
    

    public function index(Request $request)
    {
        $query = DataEntry::query(); // Start building a query based on the DataEntry model

        // Apply filters based on POST data
        if ($request->filled('end_year')) {
            $query->where('end_year', $request->input('end_year'));
        }

        if ($request->filled('topics')) {
            $query->whereIn('topic', (array) $request->input('topics'));
        }

        if ($request->filled('sector')) {
            $query->where('sector', $request->input('sector'));
        }

        if ($request->filled('region')) {
            $query->where('region', $request->input('region'));
        }

        if ($request->filled('pestle')) {
            $query->where('pestle', $request->input('pestle'));
        }

        if ($request->filled('source')) {
            $query->where('source', $request->input('source'));
        }

        if ($request->filled('swot')) {
            $query->where('swot', $request->input('swot'));
        }

        if ($request->filled('country')) {
            $query->where('country', $request->input('country'));
        }

        if ($request->filled('city')) {
            $query->where('city', $request->input('city'));
        }

        // Execute the query and retrieve the filtered data
        $data = $query->get();

        // Return the view 'admin.table' with the filtered data
        return view('admin.table', compact('data'));
    }
}
