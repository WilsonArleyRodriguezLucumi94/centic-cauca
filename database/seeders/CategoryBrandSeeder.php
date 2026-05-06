<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;

class CategoryBrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ─── CATEGORÍAS ───
        $categories = [
            [
                'name' => 'All in One',
                'slug' => 'aio',
                'color' => '#00e5ff',
                'icon' => '🖥️',
            ],
            [
                'name' => 'Portátil',
                'slug' => 'portatil',
                'color' => '#a259ff',
                'icon' => '💻',
            ],
            [
                'name' => 'Gaming',
                'slug' => 'gaming',
                'color' => '#ff3d71',
                'icon' => '🎮',
            ],
            [
                'name' => 'Impresora',
                'slug' => 'impresora',
                'color' => '#00d68f',
                'icon' => '🖨️',
            ],
            [
                'name' => 'Accesorio',
                'slug' => 'accesorio',
                'color' => '#ffb800',
                'icon' => '🔌',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

        // ─── MARCAS ───
        $brands = [
            ['name' => 'HP', 'slug' => 'hp'],
            ['name' => 'Lenovo', 'slug' => 'lenovo'],
            ['name' => 'ASUS', 'slug' => 'asus'],
            ['name' => 'Acer', 'slug' => 'acer'],
            ['name' => 'Dell', 'slug' => 'dell'],
            ['name' => 'MSI', 'slug' => 'msi'],
            ['name' => 'Epson', 'slug' => 'epson'],
            ['name' => 'Brother', 'slug' => 'brother'],
            ['name' => 'Cooler Master', 'slug' => 'cooler-master'],
            ['name' => 'Targus', 'slug' => 'targus'],
        ];

        foreach ($brands as $brand) {
            Brand::create($brand);
        }
    }
}
