<?php
// database/seeders/ProductSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $aio = Category::where('slug', 'aio')->first()->id;
        $portatil = Category::where('slug', 'portatil')->first()->id;
        $gaming = Category::where('slug', 'gaming')->first()->id;
        $impresora = Category::where('slug', 'impresora')->first()->id;
        $accesorio = Category::where('slug', 'accesorio')->first()->id;

        $hp = Brand::where('slug', 'hp')->first()->id;
        $lenovo = Brand::where('slug', 'lenovo')->first()->id;
        $asus = Brand::where('slug', 'asus')->first()->id;
        $acer = Brand::where('slug', 'acer')->first()->id;
        $dell = Brand::where('slug', 'dell')->first()->id;
        $msi = Brand::where('slug', 'msi')->first()->id;
        $epson = Brand::where('slug', 'epson')->first()->id;
        $brother = Brand::where('slug', 'brother')->first()->id;
        $coolerMaster = Brand::where('slug', 'cooler-master')->first()->id;
        $targus = Brand::where('slug', 'targus')->first()->id;

        // ─── ALL IN ONE ───
        $aioProducts = [
            [
                'sku' => 'AIO-HP-001', 'brand_id' => $hp, 'name' => 'AIO DG0011LA',
                'slug' => 'aio-dg0011la', 'price' => 1199000, 'is_new' => true,
                'specs' => ['Intel N100 (N-series)', '8GB DDR5 / 21.4" FHD', 'SSD 256GB / FreeDOS / Negro'],
                'image_url' => 'https://drive.google.com/file/d/1X9hO_PPi4bDVeRizklDHraaTmBryJnxB/view?usp=drive_link',
            ],
            [
                'sku' => 'AIO-HP-002', 'brand_id' => $hp, 'name' => 'AIO 24-CR0310LA',
                'slug' => 'aio-24-cr0310la', 'price' => 1279000, 'is_new' => true,
                'specs' => ['Intel Core N100', '8GB / 23.8" FHD', 'SSD 512GB / FreeDos / Negro'],
                'image_url' => 'https://drive.google.com/file/d/1X9hO_PPi4bDVeRizklDHraaTmBryJnxB/view?usp=drive_link',
            ],
            [
                'sku' => 'AIO-LEN-001', 'brand_id' => $lenovo, 'name' => 'AIO A100 (F0J6002NLD)',
                'slug' => 'aio-a100-f0j6002nld', 'price' => 1599000,
                'specs' => ['Intel Core i3 N305 1.8GHz', '8GB / 23.8" FHD', 'SSD 512GB / FreeDos / Gris Perla'],
                'image_url' => 'https://drive.google.com/file/d/1X9hO_PPi4bDVeRizklDHraaTmBryJnxB/view?usp=drive_link',
            ],
            [
                'sku' => 'AIO-HP-003', 'brand_id' => $hp, 'name' => 'AIO 24-CB1028LA',
                'slug' => 'aio-24-cb1028la', 'price' => 1949000,
                'specs' => ['Intel Core i5 1235U 1.3GHz', '8GB / 23.8" FHD', 'SSD 512GB / Linux / Negro'],
                'image_url' => 'https://drive.google.com/file/d/1X9hO_PPi4bDVeRizklDHraaTmBryJnxB/view?usp=drive_link',
            ],
            [
                'sku' => 'AIO-LEN-002', 'brand_id' => $lenovo, 'name' => 'AIO IdeaCentre 24IRH9',
                'slug' => 'aio-ideacentre-24irh9', 'price' => 1999000,
                'specs' => ['Intel Core i5-13420H', '8GB / 23.8" FHD / RJ-45', 'SSD 512GB / NO OS / Luna Grey'],
                'image_url' => 'https://images.unsplash.com/photo-1593642632823-8f78536788c6?w=400&h=300&fit=crop',
            ],
            [
                'sku' => 'AIO-ASU-001', 'brand_id' => $asus, 'name' => 'V440VAK-WPC1060',
                'slug' => 'aio-v440vak-wpc1060', 'price' => 2099000, 'is_new' => true,
                'specs' => ['Intel Core i5', '8GB / 23.8" FHD', 'SSD 512GB / NO OS / Blanco'],
                'image_url' => 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?w=400&h=300&fit=crop',
            ],
            [
                'sku' => 'AIO-HP-004', 'brand_id' => $hp, 'name' => 'AIO 240 (B88BKAT#ABM)',
                'slug' => 'aio-240-b88bkat-abm', 'price' => 2099000, 'is_new' => true,
                'specs' => ['Intel Core i5-1334U', '16GB / 23.8" FHD', 'SSD 512GB / Linux / Negro'],
                'image_url' => 'https://images.unsplash.com/photo-1496181133206-80ce9b88a853?w=400&h=300&fit=crop',
            ],
            [
                'sku' => 'AIO-LEN-003', 'brand_id' => $lenovo, 'name' => 'AIO IdeaCentre 5 3 24ALC6',
                'slug' => 'aio-ideacentre-5-3-24alc6', 'price' => 1599000, 'is_new' => true,
                'specs' => ['AMD Ryzen 5 7430U', '8GB / 23.8" FHD', 'SSD 256GB / Linux / Blanco'],
                'image_url' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=400&h=300&fit=crop',
            ],
            [
                'sku' => 'AIO-HP-005', 'brand_id' => $hp, 'name' => 'ProOne 245 G10',
                'slug' => 'aio-proone-245-g10', 'price' => 1999000, 'is_new' => true,
                'specs' => ['AMD Ryzen 5 7520U 2.8GHz', '16GB / 23.8" FHD', 'SSD 512GB / FreeDos / Silver Mineral'],
                'image_url' => 'https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d?w=400&h=300&fit=crop',
            ],
            [
                'sku' => 'AIO-LEN-004', 'brand_id' => $lenovo, 'name' => 'ThinkCentre Neo 50a 24 Gen 5',
                'slug' => 'aio-thinkcentre-neo-50a-24-gen-5', 'price' => 2449000, 'is_new' => true,
                'specs' => ['Intel Core i7-13620H', '8GB DDR5 / 23.8" / RJ-45', 'SSD 512GB / Negro'],
                'image_url' => 'https://images.unsplash.com/photo-1531297484001-80022131f5a1?w=400&h=300&fit=crop',
            ],
            [
                'sku' => 'AIO-LEN-005', 'brand_id' => $lenovo, 'name' => 'AIO IdeaCentre 3 24ALC6',
                'slug' => 'aio-ideacentre-3-24alc6', 'price' => 2119000, 'is_new' => true,
                'specs' => ['AMD Ryzen 7 7730U 2.0GHz', '8GB / 23.8" FHD', 'SSD 512GB / FreeDos / Negro'],
                'image_url' => 'https://images.unsplash.com/photo-1517336714731-489689fd1ca5?w=400&h=300&fit=crop',
            ],
        ];

        foreach ($aioProducts as $product) {
            Product::create(array_merge($product, ['category_id' => $aio, 'icon' => '🖥️']));
        }

        // ─── PORTÁTILES ───
        $laptopProducts = [
            [
                'sku' => 'LAP-HP-001', 'brand_id' => $hp, 'name' => '255R G10',
                'slug' => 'laptop-255r-g10', 'price' => 1249000, 'is_new' => true,
                'specs' => ['AMD Athlon 7120U', '8GB / 15.6" FHD', 'SSD 512GB / FreeDos / Plateado / Teclado Numérico'],
                'image_url' => 'https://images.unsplash.com/photo-1496181133206-80ce9b88a853?w=400&h=300&fit=crop',
            ],
            [
                'sku' => 'LAP-HP-002', 'brand_id' => $hp, 'name' => '15-FD0130',
                'slug' => 'laptop-15-fd0130', 'price' => 1299000, 'is_new' => true,
                'specs' => ['Intel Core i3-1215U 3.3GHz', '8GB / 15.6" FHD', 'SSD 512GB / FreeDOS / Silver'],
                'image_url' => 'https://images.unsplash.com/photo-1517336714731-489689fd1ca5?w=400&h=300&fit=crop',
            ],
            [
                'sku' => 'LAP-LEN-001', 'brand_id' => $lenovo, 'name' => 'IdeaPad Slim 3 15IRU8',
                'slug' => 'laptop-ideapad-slim-3-15iru8', 'price' => 1329000, 'is_new' => true,
                'specs' => ['Intel Core i3 1315U', '8GB / 15.6" FHD', 'SSD 512GB / FreeDOS / Gris'],
                'image_url' => 'https://images.unsplash.com/photo-1588872657578-7efd1f1555ed?w=400&h=300&fit=crop',
            ],
            [
                'sku' => 'LAP-ASU-001', 'brand_id' => $asus, 'name' => 'Go 15 E1504FA-NJ1961',
                'slug' => 'laptop-go-15-e1504fa-nj1961', 'price' => 1289000,
                'specs' => ['AMD Ryzen 3 7320U', '8GB / 15.6" FHD', 'SSD 512GB / Linux / Cool Silver'],
                'image_url' => 'https://images.unsplash.com/photo-1544731612-de7f96afe55f?w=400&h=300&fit=crop',
            ],
            [
                'sku' => 'LAP-ASU-002', 'brand_id' => $asus, 'name' => 'Go 15 E1504FA-BQ2377',
                'slug' => 'laptop-go-15-e1504fa-bq2377', 'price' => 1299000,
                'specs' => ['AMD Ryzen 3 7320U', '8GB / 15.6" FHD', 'SSD 512GB / Keep OS / Cool Silver'],
                'image_url' => 'https://images.unsplash.com/photo-1589561084283-930aa7b1ce50?w=400&h=300&fit=crop',
            ],
            [
                'sku' => 'LAP-ASU-003', 'brand_id' => $asus, 'name' => 'Go 15 E1504FA-BQ2676',
                'slug' => 'laptop-go-15-e1504fa-bq2676', 'price' => 1299000,
                'specs' => ['AMD Ryzen 3 7320U', '8GB / 15.6" FHD', 'SSD 512GB / Keep OS / Cool Silver'],
                'image_url' => 'https://images.unsplash.com/photo-1531297484001-80022131f5a1?w=400&h=300&fit=crop',
            ],
            [
                'sku' => 'LAP-LEN-002', 'brand_id' => $lenovo, 'name' => 'V14 G4 AMN',
                'slug' => 'laptop-v14-g4-amn', 'price' => 1439000, 'is_new' => true,
                'specs' => ['AMD Ryzen 3 7320U 2.4GHz / RJ-45', '16GB / 14" HD', 'SSD 256GB / NO OS / Gris Ártico'],
                'image_url' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=400&h=300&fit=crop',
            ],
            [
                'sku' => 'LAP-HP-003', 'brand_id' => $hp, 'name' => '255 G10',
                'slug' => 'laptop-255-g10', 'price' => 1499000, 'is_new' => true,
                'specs' => ['AMD Ryzen 3 7320U', '16GB / 15.6" FHD / Teclado Numérico', 'SSD 512GB / Linux / Gray Mineral'],
                'image_url' => 'https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d?w=400&h=300&fit=crop',
            ],
            [
                'sku' => 'LAP-LEN-003', 'brand_id' => $lenovo, 'name' => 'IdeaPad 15AMN8',
                'slug' => 'laptop-ideapad-15amn8', 'price' => 1569000, 'is_new' => true,
                'specs' => ['AMD Ryzen 3 7320U', '16GB / 15.3" FHD', 'SSD 512GB / Artic Grey'],
                'image_url' => 'https://images.unsplash.com/photo-1593640408182-31c70c8268f5?w=400&h=300&fit=crop',
            ],
            [
                'sku' => 'LAP-HP-004', 'brand_id' => $hp, 'name' => '15-FD0158LA',
                'slug' => 'laptop-15-fd0158la', 'price' => 1499000,
                'specs' => ['Intel Core i5 1235U', '8GB / 15.6" HD / Doble Ranura RAM', 'SSD 512GB / Linux / Plata'],
                'image_url' => 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?w=400&h=300&fit=crop',
            ],
            [
                'sku' => 'LAP-HP-005', 'brand_id' => $hp, 'name' => '240 G10',
                'slug' => 'laptop-240-g10', 'price' => 1519000,
                'specs' => ['Intel Core i5-1334U', '8GB / 14" HD', 'SSD 512GB / Linux / Gray'],
                'image_url' => 'https://images.unsplash.com/photo-1611186871348-b1ce696e52c9?w=400&h=300&fit=crop',
            ],
            [
                'sku' => 'LAP-HP-006', 'brand_id' => $hp, 'name' => '14-DQ5039LA',
                'slug' => 'laptop-14-dq5039la', 'price' => 1699000,
                'specs' => ['Intel Core i5 1235U 1.3GHz', '8GB / 14" HD', 'SSD 512GB / FreeDOS / Plateado'],
                'image_url' => 'https://images.unsplash.com/photo-1587831990711-23ca6441447b?w=400&h=300&fit=crop',
            ],
            [
                'sku' => 'LAP-HP-007', 'brand_id' => $hp, 'name' => '245 G10',
                'slug' => 'laptop-245-g10', 'price' => 1519000, 'is_new' => true,
                'specs' => ['AMD Ryzen 5 7530U 2.0GHz', '8GB / 14" HD', 'SSD 512GB / Linux / Gray Mineral'],
                'image_url' => 'https://images.unsplash.com/photo-1527443224154-c4a3942d3acf?w=400&h=300&fit=crop',
            ],
            [
                'sku' => 'LAP-LEN-004', 'brand_id' => $lenovo, 'name' => 'V14 G4',
                'slug' => 'laptop-v14-g4', 'price' => 1669000, 'is_new' => true,
                'specs' => ['AMD Ryzen 5 7520U 2.8GHz / RJ-45', '16GB / 14" FHD / AMD Radeon', 'SSD 512GB / Linux / Gris Ártico'],
                'image_url' => 'https://images.unsplash.com/photo-1593642632823-8f78536788c6?w=400&h=300&fit=crop',
            ],
            [
                'sku' => 'LAP-LEN-005', 'brand_id' => $lenovo, 'name' => 'V15 G4 AMN',
                'slug' => 'laptop-v15-g4-amn', 'price' => 1689000, 'is_new' => true,
                'specs' => ['AMD Ryzen 5 7520U 2.8GHz', '16GB / 15.6" FHD', 'SSD 512GB / Linux / Gris Ártico'],
                'image_url' => 'https://images.unsplash.com/photo-1496181133206-80ce9b88a853?w=400&h=300&fit=crop',
            ],
            [
                'sku' => 'LAP-LEN-006', 'brand_id' => $lenovo, 'name' => 'IdeaPad Slim 3 15AMN8',
                'slug' => 'laptop-ideapad-slim-3-15amn8', 'price' => 1689000,
                'specs' => ['AMD Ryzen 5 7520U', '16GB / 15.6" FHD', 'SSD 512GB / Abyss Blue'],
                'image_url' => 'https://images.unsplash.com/photo-1517336714731-489689fd1ca5?w=400&h=300&fit=crop',
            ],
            [
                'sku' => 'LAP-HP-008', 'brand_id' => $hp, 'name' => '15-FC0256LA',
                'slug' => 'laptop-15-fc0256la', 'price' => 1769000, 'is_new' => true,
                'specs' => ['AMD Ryzen 5 7520U / AMD Radeon', '16GB / 15.6" FHD', 'SSD 512GB / FreeDos / Azul'],
                'image_url' => 'https://images.unsplash.com/photo-1544731612-de7f96afe55f?w=400&h=300&fit=crop',
            ],
            [
                'sku' => 'LAP-ASU-004', 'brand_id' => $asus, 'name' => 'VivoBook E1504FA-BQ2334',
                'slug' => 'laptop-vivobook-e1504fa-bq2334', 'price' => 1829000, 'is_new' => true,
                'specs' => ['AMD Ryzen 5 7520U 2.8GHz', '16GB / 15.6" FHD + Morral + Mouse', 'SSD 512GB / OS Keep / Cool Silver'],
                'image_url' => 'https://images.unsplash.com/photo-1589561084283-930aa7b1ce50?w=400&h=300&fit=crop',
            ],
            [
                'sku' => 'LAP-ASU-005', 'brand_id' => $asus, 'name' => 'VivoBook X1504VA-E84556',
                'slug' => 'laptop-vivobook-x1504va-e84556', 'price' => 2199000, 'is_new' => true,
                'specs' => ['Intel Core i5-120U 1.3GHz', '16GB / 15.6" FHD TouchScreen', 'SSD 512GB / OS Keep / Quiet Blue'],
                'image_url' => 'https://images.unsplash.com/photo-1531297484001-80022131f5a1?w=400&h=300&fit=crop',
            ],
            [
                'sku' => 'LAP-ACE-001', 'brand_id' => $acer, 'name' => 'TMP216-51-56ZP',
                'slug' => 'laptop-tmp216-51-56zp', 'price' => 2799000, 'is_new' => true,
                'specs' => ['Intel Core i5 1335U 3.3GHz', '16GB DDR4 / 16" WUXGA / Windows 11 Pro', 'SSD 1TB / Iron Grey + Kaspersky'],
                'image_url' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=400&h=300&fit=crop',
            ],
            [
                'sku' => 'LAP-LEN-007', 'brand_id' => $lenovo, 'name' => 'V14 G4 (i7)',
                'slug' => 'laptop-v14-g4-i7', 'price' => 2149000,
                'specs' => ['Intel Core i7-1355U', '8GB / 14" HD', 'SSD 512GB / NO OS / Iron Gray'],
                'image_url' => 'https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d?w=400&h=300&fit=crop',
            ],
            [
                'sku' => 'LAP-LEN-008', 'brand_id' => $lenovo, 'name' => 'IdeaPad Slim 3 15IRH10',
                'slug' => 'laptop-ideapad-slim-3-15irh10', 'price' => 2199000,
                'specs' => ['Intel Core i7 13620H 2.4GHz', '8GB / 15.3" WUXGA', 'SSD 1TB / NO OS / Luna Grey'],
                'image_url' => 'https://images.unsplash.com/photo-1593640408182-31c70c8268f5?w=400&h=300&fit=crop',
            ],
            [
                'sku' => 'LAP-DEL-001', 'brand_id' => $dell, 'name' => 'Inspirón 9KP97',
                'slug' => 'laptop-inspiron-9kp97', 'price' => 2749000, 'is_new' => true,
                'specs' => ['Intel Core i7 1335U', '16GB / 15.6" FHD / Windows 11 Pro', 'SSD 512GB / Plateado + Kaspersky'],
                'image_url' => 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?w=400&h=300&fit=crop',
            ],
            [
                'sku' => 'LAP-ASU-006', 'brand_id' => $asus, 'name' => 'VivoBook M1502-BQ925',
                'slug' => 'laptop-vivobook-m1502-bq925', 'price' => 1929000, 'is_new' => true,
                'specs' => ['AMD Ryzen 7 5825U', '16GB / 15.6" FHD', 'SSD 512GB / Keep OS / Cool Silver'],
                'image_url' => 'https://images.unsplash.com/photo-1611186871348-b1ce696e52c9?w=400&h=300&fit=crop',
            ],
        ];

        foreach ($laptopProducts as $product) {
            Product::create(array_merge($product, ['category_id' => $portatil, 'icon' => '💻']));
        }

        // ─── GAMING ───
        $gamingProducts = [
            [
                'sku' => 'GAM-LEN-001', 'brand_id' => $lenovo, 'name' => 'LOQ 15IAX9E',
                'slug' => 'gaming-loq-15iax9e', 'price' => 2610000,
                'specs' => ['Intel Core i5 12450HX', '8GB / 15.9" FHD / RTX 3050 6GB', 'SSD 512GB / FreeDos / Gris'],
                'image_url' => 'https://images.unsplash.com/photo-1603302576837-37561b2e2302?w=400&h=300&fit=crop',
            ],
            [
                'sku' => 'GAM-HP-001', 'brand_id' => $hp, 'name' => 'Gaming Victus 15-FB3019LA',
                'slug' => 'gaming-victus-15-fb3019la', 'price' => 2610000, 'is_new' => true,
                'specs' => ['AMD Ryzen 7 7445HS 4.7GHz / RJ-45', '8GB / 15.6" FHD 144Hz / RTX 3050 6GB', 'SSD 512GB / Linux / Gris'],
                'image_url' => 'https://images.unsplash.com/photo-1595327656903-2f54e37ce09b?w=400&h=300&fit=crop',
            ],
            [
                'sku' => 'GAM-HP-002', 'brand_id' => $hp, 'name' => 'Gaming Victus 15-FA0021LA',
                'slug' => 'gaming-victus-15-fa0021la', 'price' => 2699000,
                'specs' => ['Intel Core i5 12450H 2.0GHz', '8GB / 15.6" FHD / RTX 3050 4GB', 'SSD 512GB / Windows 11 Home / Azul + Kaspersky'],
                'image_url' => 'https://images.unsplash.com/photo-1587202372634-32705e3e568e?w=400&h=300&fit=crop',
            ],
            [
                'sku' => 'GAM-MSI-001', 'brand_id' => $msi, 'name' => 'Thin A15 B13UC-3256XCO',
                'slug' => 'gaming-thin-a15-b13uc-3256xco', 'price' => 2699000,
                'specs' => ['Intel Core i5 13420H 2.1GHz / RJ-45', '8GB / 15.6" FHD / RTX 3050 4GB', 'SSD 512GB / FreeDos / Cosmo Gray + Morral + Kaspersky'],
                'image_url' => 'https://images.unsplash.com/photo-1618424181497-157f25b6ddd5?w=400&h=300&fit=crop',
            ],
            [
                'sku' => 'GAM-ACE-001', 'brand_id' => $acer, 'name' => 'Gamer Nitro Lite NL16-71G-5616',
                'slug' => 'gaming-nitro-lite-nl16-71g-5616', 'price' => 2869000, 'is_new' => true,
                'specs' => ['Intel Core i5-210H / RJ-45', '16GB DDR5 / 16" WUXGA / RTX 3050 6GB', 'SSD 512GB / Shael Black + Kaspersky'],
                'image_url' => 'https://images.unsplash.com/photo-1547394765-185e1e68f34e?w=400&h=300&fit=crop',
            ],
            [
                'sku' => 'GAM-ACE-002', 'brand_id' => $acer, 'name' => 'Gaming Nitro Lite NL16-71G-57G5',
                'slug' => 'gaming-nitro-lite-nl16-71g-57g5', 'price' => 2899000,
                'specs' => ['Intel Core i5-13420H 2.1GHz / RJ-45', '16GB DDR5 / 15.6" FHD / RTX 3050 6GB', 'SSD 512GB / Tigerlily Red + Kaspersky'],
                'image_url' => 'https://images.unsplash.com/photo-1603302576837-37561b2e2302?w=400&h=300&fit=crop',
            ],
            [
                'sku' => 'GAM-MSI-002', 'brand_id' => $msi, 'name' => 'Thin A15 B7UC-624XCO',
                'slug' => 'gaming-thin-a15-b7uc-624xco', 'price' => 2899000,
                'specs' => ['AMD Ryzen 7 7735HS 3.2GHz / RJ-45', '8GB / 15.6" FHD / RTX 3050 4GB', 'SSD 512GB / FreeDos / Cosmo Gray + Morral + Kaspersky'],
                'image_url' => 'https://images.unsplash.com/photo-1595327656903-2f54e37ce09b?w=400&h=300&fit=crop',
            ],
            [
                'sku' => 'GAM-ACE-003', 'brand_id' => $acer, 'name' => 'Gaming Nitro V 15 ANV15-42-R976',
                'slug' => 'gaming-nitro-v-15-anv15-42-r976', 'price' => 3049000,
                'specs' => ['AMD Ryzen 7 7445HS / RJ-45', '16GB DDR5 / 15.6" FHD / RTX 3050 6GB', 'SSD 512GB NVMe / Obsidian Black + Kaspersky'],
                'image_url' => 'https://images.unsplash.com/photo-1587202372634-32705e3e568e?w=400&h=300&fit=crop',
            ],
            [
                'sku' => 'GAM-MSI-003', 'brand_id' => $msi, 'name' => 'Thin A15 B7VE-476XCO',
                'slug' => 'gaming-thin-a15-b7ve-476xco', 'price' => 4699000, 'is_new' => true, 'has_iva_included' => true,
                'specs' => ['AMD Ryzen 7 7735HS 3.2GHz / RJ-45', '16GB / 15.6" FHD / RTX 4050 6GB GDDR6', 'SSD 512GB / FreeDos / Cosmo Gray + Morral'],
                'image_url' => 'https://images.unsplash.com/photo-1618424181497-157f25b6ddd5?w=400&h=300&fit=crop',
            ],
        ];

        foreach ($gamingProducts as $product) {
            Product::create(array_merge($product, ['category_id' => $gaming, 'icon' => '🎮']));
        }

        // ─── IMPRESORAS ───
        $printerProducts = [
            [
                'sku' => 'IMP-HP-001', 'brand_id' => $hp, 'name' => 'Smart Tank 581',
                'slug' => 'impresora-smart-tank-581', 'price' => 689000, 'is_new' => true, 'has_iva_included' => true,
                'specs' => ['Impresión, Copia, Escaneado', 'Inkjet / Hasta 1200×1200 ppp / 12ppm', 'USB 2.0 + Wi-Fi + Bluetooth'],
                'image_url' => 'https://images.unsplash.com/photo-1612815154858-60aa4c43e64e?w=400&h=300&fit=crop',
            ],
            [
                'sku' => 'IMP-HP-002', 'brand_id' => $hp, 'name' => 'Smart Tank 585',
                'slug' => 'impresora-smart-tank-585', 'price' => 689000, 'is_new' => true, 'has_iva_included' => true,
                'specs' => ['Impresión, Copia, Escaneado', 'Inkjet / Hasta 1200×1200 ppp / 12ppm', 'USB 2.0 + Wi-Fi + Bluetooth'],
                'image_url' => 'https://images.unsplash.com/photo-1558618666-fcd25c85f82e?w=400&h=300&fit=crop',
            ],
            [
                'sku' => 'IMP-EPS-001', 'brand_id' => $epson, 'name' => 'Multifuncional L3210',
                'slug' => 'impresora-multifuncional-l3210', 'price' => 699000, 'has_iva_included' => true,
                'specs' => ['Imprimir, Escanear, Copiar', '5760×1440 DPI Color / 600×1200 DPI Escáner', 'Conexión USB'],
                'image_url' => 'https://images.unsplash.com/photo-1589652717521-10c0d092dea9?w=400&h=300&fit=crop',
            ],
            [
                'sku' => 'IMP-BRO-001', 'brand_id' => $brother, 'name' => 'DCP-T430W',
                'slug' => 'impresora-dcp-t430w', 'price' => 729000, 'is_new' => true, 'has_iva_included' => true, 'has_promo' => true,
                'specs' => ['Impresión, Copiado, Escaneado / Wi-Fi', 'Hasta 27ppm negro / 23ppm color (modo Eco)', 'Hasta 7.500 pág. negro / 5.000 pág. color'],
                'image_url' => 'https://images.unsplash.com/photo-1589652717521-10c0d092dea9?w=400&h=300&fit=crop',
            ],
            [
                'sku' => 'IMP-HP-003', 'brand_id' => $hp, 'name' => 'LaserJet MFP M141W',
                'slug' => 'impresora-laserjet-mfp-m141w', 'price' => 755000, 'has_iva_included' => true,
                'specs' => ['Impresión, Copia, Escaneado Láser B&N', '600×600 ppp / 27ppm', 'Papel común, sobre, postal, etiqueta'],
                'image_url' => 'https://images.unsplash.com/photo-1612815154858-60aa4c43e64e?w=400&h=300&fit=crop',
            ],
            [
                'sku' => 'IMP-EPS-002', 'brand_id' => $epson, 'name' => 'EcoTank L3251',
                'slug' => 'impresora-ecotank-l3251', 'price' => 799000, 'is_new' => true, 'has_iva_included' => true,
                'specs' => ['Imprimir, Copiar, Escanear / Wi-Fi', 'Alta velocidad de impresión', 'Hasta 4.500 págs. negro / 7.500 págs. color'],
                'image_url' => 'https://images.unsplash.com/photo-1558618666-fcd25c85f82e?w=400&h=300&fit=crop',
            ],
            [
                'sku' => 'IMP-BRO-002', 'brand_id' => $brother, 'name' => 'DCP-T730Dw',
                'slug' => 'impresora-dcp-t730dw', 'price' => 829000, 'has_iva_included' => true,
                'specs' => ['Impresión, Copiado, Escaneado / Wi-Fi', 'Hasta 27ppm negro / 23ppm color', '6000×1200 dpi / Tinta ultra alto rendimiento'],
                'image_url' => 'https://images.unsplash.com/photo-1589652717521-10c0d092dea9?w=400&h=300&fit=crop',
            ],
            [
                'sku' => 'IMP-EPS-003', 'brand_id' => $epson, 'name' => 'L5590 EcoTank',
                'slug' => 'impresora-l5590-ecotank', 'price' => 1199000, 'is_new' => true, 'has_iva_included' => true, 'has_promo' => true,
                'specs' => ['Imprimir, Escanear, Copiar', '4800×1200 DPI / USB + Wi-Fi + Ethernet', '50% más rápida / 600×1200 DPI escáner'],
                'image_url' => 'https://images.unsplash.com/photo-1612815154858-60aa4c43e64e?w=400&h=300&fit=crop',
            ],
        ];

        foreach ($printerProducts as $product) {
            Product::create(array_merge($product, ['category_id' => $impresora, 'icon' => '🖨️']));
        }

        // ─── ACCESORIOS ───
        $accessoryProducts = [
            [
                'sku' => 'ACC-CM-001', 'brand_id' => $coolerMaster, 'name' => 'Cooler Splitter 1 a 3 A-RGB',
                'slug' => 'accesorio-cooler-splitter-1-a-3-argb', 'price' => 21000,
                'specs' => ['Divide señal A-RGB 1 entrada / 3 salidas'],
                'image_url' => 'https://images.unsplash.com/photo-1587202372634-32705e3e568e?w=400&h=300&fit=crop',
            ],
            [
                'sku' => 'ACC-CM-002', 'brand_id' => $coolerMaster, 'name' => 'Cooler Splitter 1 a 5 A-RGB 3 Pines',
                'slug' => 'accesorio-cooler-splitter-1-a-5-argb-3-pines', 'price' => 22000,
                'specs' => ['Divide señal A-RGB 1 entrada / 5 salidas'],
                'image_url' => 'https://images.unsplash.com/photo-1595327656903-2f54e37ce09b?w=400&h=300&fit=crop',
            ],
            [
                'sku' => 'ACC-CM-003', 'brand_id' => $coolerMaster, 'name' => 'Grease IC Essential E2 1.5ml',
                'slug' => 'accesorio-grease-ic-essential-e2-1-5ml', 'price' => 30000,
                'specs' => ['Pasta térmica de alto rendimiento'],
                'image_url' => 'https://images.unsplash.com/photo-1618424181497-157f25b6ddd5?w=400&h=300&fit=crop',
            ],
            [
                'sku' => 'ACC-CM-004', 'brand_id' => $coolerMaster, 'name' => 'Fan MF120 S2 (Disipador)',
                'slug' => 'accesorio-fan-mf120-s2-disipador', 'price' => 35000,
                'specs' => ['Fan RGB 120mm'],
                'image_url' => 'https://images.unsplash.com/photo-1603302576837-37561b2e2302?w=400&h=300&fit=crop',
            ],
            [
                'sku' => 'ACC-CM-005', 'brand_id' => $coolerMaster, 'name' => 'Controlador Pequeño Fans RGB',
                'slug' => 'accesorio-controlador-pequeno-fans-rgb', 'price' => 65000,
                'specs' => ['Control de iluminación RGB'],
                'image_url' => 'https://images.unsplash.com/photo-1547394765-185e1e68f34e?w=400&h=300&fit=crop',
            ],
            [
                'sku' => 'ACC-CM-006', 'brand_id' => $coolerMaster, 'name' => 'Disipador I71C',
                'slug' => 'accesorio-disipador-i71c', 'price' => 75000,
                'specs' => ['Disipador con iluminación RGB'],
                'image_url' => 'https://images.unsplash.com/photo-1618424181497-157f25b6ddd5?w=400&h=300&fit=crop',
            ],
            [
                'sku' => 'ACC-CM-007', 'brand_id' => $coolerMaster, 'name' => 'Mouse MM720',
                'slug' => 'accesorio-mouse-mm720', 'price' => 65000,
                'specs' => ['Mouse gaming ultraligero / Negro o Blanco'],
                'image_url' => 'https://images.unsplash.com/photo-1527864550417-7fd91fc51a46?w=400&h=300&fit=crop',
            ],
            [
                'sku' => 'ACC-CM-008', 'brand_id' => $coolerMaster, 'name' => 'Mouse MM711 White Matte',
                'slug' => 'accesorio-mouse-mm711-white-matte', 'price' => 89000,
                'specs' => ['Mouse gaming ultraligero / Blanco mate'],
                'image_url' => 'https://images.unsplash.com/photo-1615663245857-ac93bb7c39e7?w=400&h=300&fit=crop',
            ],
            [
                'sku' => 'ACC-LEN-001', 'brand_id' => $lenovo, 'name' => 'Morral Casual B210',
                'slug' => 'accesorio-morral-casual-b210', 'price' => 79000, 'has_iva_included' => true, 'is_new' => true,
                'specs' => ['Morral para portátil / IVA incluido'],
                'image_url' => 'https://images.unsplash.com/photo-1553062407-98eeb64c6a62?w=400&h=300&fit=crop',
            ],
            [
                'sku' => 'ACC-LEN-002', 'brand_id' => $lenovo, 'name' => 'Mouse Inalámbrico ThinkPad Essential',
                'slug' => 'accesorio-mouse-inalambrico-thinkpad-essential', 'price' => 79000, 'has_iva_included' => true, 'is_new' => true,
                'specs' => ['Mouse inalámbrico / IVA incluido'],
                'image_url' => 'https://images.unsplash.com/photo-1527864550417-7fd91fc51a46?w=400&h=300&fit=crop',
            ],
            [
                'sku' => 'ACC-TAR-001', 'brand_id' => $targus, 'name' => 'Morral Targus Intellect',
                'slug' => 'accesorio-morral-targus-intellect', 'price' => 65000, 'has_iva_included' => true, 'is_new' => true,
                'specs' => ['Morral para portátil / IVA incluido'],
                'image_url' => 'https://images.unsplash.com/photo-1553062407-98eeb64c6a62?w=400&h=300&fit=crop',
            ],
            [
                'sku' => 'ACC-HP-001', 'brand_id' => $hp, 'name' => 'Cartucho Nro 664 Negra/Tricolor',
                'slug' => 'accesorio-cartucho-nro-664-negra-tricolor', 'price' => 28000,
                'specs' => ['Tinta HP compatible'],
                'image_url' => 'https://images.unsplash.com/photo-1612815154858-60aa4c43e64e?w=400&h=300&fit=crop',
            ],
            [
                'sku' => 'ACC-HP-002', 'brand_id' => $hp, 'name' => 'Cartucho Nro 675 Tricolor',
                'slug' => 'accesorio-cartucho-nro-675-tricolor', 'price' => 45000,
                'specs' => ['Tinta HP compatible'],
                'image_url' => 'https://images.unsplash.com/photo-1558618666-fcd25c85f82e?w=400&h=300&fit=crop',
            ],
            [
                'sku' => 'ACC-HP-003', 'brand_id' => $hp, 'name' => 'Cartucho Nro 670 Tintas Individuales',
                'slug' => 'accesorio-cartucho-nro-670-tintas-individuales', 'price' => 28000,
                'specs' => ['Amarillo, Azul, Magenta'],
                'image_url' => 'https://images.unsplash.com/photo-1589652717521-10c0d092dea9?w=400&h=300&fit=crop',
            ],
            [
                'sku' => 'ACC-HP-004', 'brand_id' => $hp, 'name' => 'Botella Tinta HP M0H55AL Magenta',
                'slug' => 'accesorio-botella-tinta-hp-m0h55al-magenta', 'price' => 39000,
                'specs' => ['70ml / 8.000 páginas de rendimiento'],
                'image_url' => 'https://images.unsplash.com/photo-1558618666-fcd25c85f82e?w=400&h=300&fit=crop',
            ],
        ];

        foreach ($accessoryProducts as $product) {
            Product::create(array_merge($product, ['category_id' => $accesorio, 'icon' => '🔌']));
        }
    }
}