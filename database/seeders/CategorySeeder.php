<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['name' => 'ريادة أعمال']);
        Category::create(['name' => 'العمل الحر']);
        Category::create(['name' => 'تسويق ومبيعات']);
        Category::create(['name' => 'تصميم']);
        Category::create(['name' => 'برمجة']);
    }
}
