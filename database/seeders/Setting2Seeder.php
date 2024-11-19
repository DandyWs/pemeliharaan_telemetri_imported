<?php

namespace Database\Seeders;

use App\Models\Setting2;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Setting2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('setting2s')->insert([
        [   
            'id' => 1,
            'simulasi' => '1945',
            'display' => '1945',
            'form_komponen_id' => 19
        ],[
            'id' => 2,
            'simulasi' => '1945',
            'display' => '1945',
            'form_komponen_id' => 20
        ],[
            'id' => 3,
            'simulasi' => '1945',
            'display' => '1945',
            'form_komponen_id' => 21
        ],[
            'id' => 4,
            'simulasi' => '1945',
            'display' => '1945',
            'form_komponen_id' => 22
        ]
        ]);
    }
}
