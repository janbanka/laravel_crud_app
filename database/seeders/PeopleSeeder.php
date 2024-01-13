<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\People;

class PeopleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        People::factory()->count(200)->create();
    }
}
