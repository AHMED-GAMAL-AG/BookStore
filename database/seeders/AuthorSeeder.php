<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Author::create(['name' => 'محمد العربي']);
        Author::create(['name' => 'هيثم طلعت']);
        Author::create(['name' => 'أياد قنديبي']);
        Author::create(['name' => 'ياسر سلامة']);
        Author::create(['name' => 'هاشم سليم']);
        Author::create(['name' => 'فاطمة حيشية']);
    }
}
