<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $list_of_categories = [
            [
                'name' => 'قانون',
                'slug' => 'قانون',
                'icon' => 'law.svg',
            ],
            [
                'name' => 'قطاع مالي',
                'slug' => 'قطاع-مالي',
                'icon' => 'money.svg',
            ],
            [
                'name' => 'جهات حكومية',
                'slug' => 'جهات-حكومية',
                'icon' => 'government.svg',
            ],
            [
                'name' => 'صحة',
                'slug' => 'صحة',
                'icon' => 'health.svg',
            ],
            [
                'name' => 'اعمال',
                'slug' => 'اعمال',
                'icon' => 'business.svg',
            ],
            [
                'name' => 'عقار',
                'slug' => 'عقار',
                'icon' => 'real-estate.svg',
            ],
            [
                'name' => 'صناعة',
                'slug' => 'صناعة',
                'icon' => 'factory.svg',
            ],
            [
                'name' => 'رياضة',
                'slug' => 'رياضة',
                'icon' => 'sport.svg',
            ],
            [
                'name' => 'نقطة غاز',
                'slug' => 'نقطة-غاز',
                'icon' => 'gas.svg',
            ],
            [
                'name' => 'دولي',
                'slug' => 'دولي',
                'icon' => 'international.svg',
            ],
        ];

        foreach ($list_of_categories as $category) {
            \App\Models\Category::create($category);
        }
    }
}
