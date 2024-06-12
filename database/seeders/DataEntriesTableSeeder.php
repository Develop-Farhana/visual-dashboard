<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DataEntry;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class DataEntriesTableSeeder extends Seeder
{
    public function run()
    {
        $file = fopen(database_path('seeders/Data.csv'), 'r');

        // Skip the header row
        $header = fgetcsv($file, 2000, ',');

        while (($data = fgetcsv($file, 2000, ',')) !== FALSE) {
            try {
                DataEntry::create([
                    'end_year' => $data[0],
                    'citylng' => (int) $data[1],
                    'citylat' => Carbon::parse($data[2]),
                    'intensity' => (float) $data[3],
                    'sector' => filter_var($data[4], FILTER_VALIDATE_BOOLEAN),
                    'topic' => $data[5],
                    'insight' => $data[6],
                    'swot' => $data[7],
                    'url' => $data[8],
                    'region' => $data[9],
                    'start_year' => $data[10],
                    'impact' => $data[11],
                    'added' => $data[12],
                    'published' => $data[13],
                    'city' => $data[14],
                    'country' => $data[15],
                    'relevance' => $data[16],
                    'pestle' => $data[17],
                    'source' => $data[18],
                    'title' => $data[19],
                    'likelihood' => $data[20],
                ]);
            } catch (\Exception $e) {
                // Log any errors to troubleshoot
                Log::error('Failed to insert data: ' . json_encode($data) . '. Error: ' . $e->getMessage());
            }
        }

        fclose($file);
    }
}
