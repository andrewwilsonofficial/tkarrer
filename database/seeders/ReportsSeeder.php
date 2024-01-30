<?php

namespace Database\Seeders;

use App\Models\Report;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Factories\ReportsFactory;

class ReportsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $reports = Report::factory()->count(1000)->create();

        // foreach ($reports as $report) {
        //     $report->save();
        // }

        for ($i = 0; $i < 1000; $i++) {
            $report = Report::factory()->make();
            $report->save();
        }
    }
}
