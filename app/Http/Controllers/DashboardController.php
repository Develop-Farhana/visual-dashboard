<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataEntry; // Assuming DataEntry is your model representing the data entries

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $query = DataEntry::query(); // Start building a query based on the DataEntry model

        // Check if 'end_year' parameter is present in the request
        if ($request->has('end_year')) {
            $query->where('end_year', $request->input('end_year'));
        }

        // Check if 'topics' parameter is present in the request
        if ($request->has('topics')) {
            $query->whereIn('topic', $request->input('topics'));
        }

        // Check if 'sector' parameter is present in the request
        if ($request->has('sector')) {
            $query->where('sector', $request->input('sector'));
        }

        // Check if 'region' parameter is present in the request
        if ($request->has('region')) {
            $query->where('region', $request->input('region'));
        }

        // Check if 'pestle' parameter is present in the request
        if ($request->has('pestle')) {
            $query->where('pestle', $request->input('pestle'));
        }

        // Check if 'source' parameter is present in the request
        if ($request->has('source')) {
            $query->where('source', $request->input('source'));
        }

        // Check if 'swot' parameter is present in the request
        if ($request->has('swot')) {
            $query->where('swot', $request->input('swot'));
        }

        // Check if 'country' parameter is present in the request
        if ($request->has('country')) {
            $query->where('country', $request->input('country'));
        }

        // Check if 'city' parameter is present in the request
        if ($request->has('city')) {
            $query->where('city', $request->input('city'));
        }

        // Execute the query and retrieve the filtered data
        $data = $query->get();

        // Return the view 'admin.table' with the filtered data
        return view('admin.table', compact('data'));
    }
}
