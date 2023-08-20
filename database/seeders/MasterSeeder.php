<?php

namespace Database\Seeders;

use App\Models\Master;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('masters')->insert([
            'name' => Str::random(5),
            'description' => Str::random(40),
            'image' => Str::random(32),
        ]);
        Master::factory()
            ->count(18)
            ->create();
    }
}
