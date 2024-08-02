<?php

namespace Database\Seeders;

use App\Models\FormStatus;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        FormStatus::create([
            'id' => 1,
            'form_status' => false
        ]);
    }
}
