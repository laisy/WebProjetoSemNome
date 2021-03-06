<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vitrine;

class VitrineSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Vitrine::factory()->count(11)->create();
    }
}
