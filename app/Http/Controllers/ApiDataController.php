<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataEntry;

class ApiDataController extends Controller
{
    public function getData()
    {
        $data = DataEntry::all();
        return response()->json($data);
    }
}

