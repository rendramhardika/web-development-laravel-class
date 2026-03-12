<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Laptop ASUS ROG',
                'description' => 'Gaming laptop dengan processor Intel Core i7 dan GPU NVIDIA RTX 3060',
                'price' => 15000000,
                'stock' => 15,
                'category' => 'Electronics',
                'is_active' => true,
            ],
            [
                'name' => 'iPhone 14 Pro',
                'description' => 'Smartphone flagship dari Apple dengan chip A16 Bionic',
                'price' => 18000000,
                'stock' => 8,
                'category' => 'Electronics',
                'is_active' => true,
            ],
            [
                'name' => 'Samsung Galaxy S23',
                'description' => 'Flagship Android dengan kamera 200MP',
                'price' => 12000000,
                'stock' => 20,
                'category' => 'Electronics',
                'is_active' => true,
            ],
            [
                'name' => 'Mechanical Keyboard',
                'description' => 'Keyboard gaming dengan switch Cherry MX Blue',
                'price' => 1500000,
                'stock' => 30,
                'category' => 'Accessories',
                'is_active' => true,
            ],
            [
                'name' => 'Gaming Mouse Logitech',
                'description' => 'Mouse gaming dengan sensor 16000 DPI',
                'price' => 750000,
                'stock' => 5,
                'category' => 'Accessories',
                'is_active' => true,
            ],
            [
                'name' => 'Monitor 27 inch 144Hz',
                'description' => 'Monitor gaming IPS panel dengan refresh rate 144Hz',
                'price' => 3500000,
                'stock' => 12,
                'category' => 'Electronics',
                'is_active' => true,
            ],
            [
                'name' => 'Buku Laravel 10',
                'description' => 'Panduan lengkap belajar Laravel dari dasar hingga advanced',
                'price' => 150000,
                'stock' => 50,
                'category' => 'Books',
                'is_active' => true,
            ],
            [
                'name' => 'Buku PHP 8',
                'description' => 'Belajar PHP 8 dengan fitur-fitur terbaru',
                'price' => 120000,
                'stock' => 45,
                'category' => 'Books',
                'is_active' => true,
            ],
            [
                'name' => 'Kaos Programmer',
                'description' => 'Kaos cotton combed dengan design unik untuk programmer',
                'price' => 85000,
                'stock' => 100,
                'category' => 'Clothing',
                'is_active' => true,
            ],
            [
                'name' => 'Hoodie Coding',
                'description' => 'Hoodie premium untuk para developer',
                'price' => 250000,
                'stock' => 25,
                'category' => 'Clothing',
                'is_active' => true,
            ],
            [
                'name' => 'Webcam 4K',
                'description' => 'Webcam untuk streaming dan video conference',
                'price' => 2000000,
                'stock' => 3,
                'category' => 'Electronics',
                'is_active' => true,
            ],
            [
                'name' => 'Headset Gaming',
                'description' => 'Headset dengan surround sound 7.1',
                'price' => 1200000,
                'stock' => 18,
                'category' => 'Accessories',
                'is_active' => true,
            ],
            [
                'name' => 'SSD 1TB NVMe',
                'description' => 'SSD dengan kecepatan baca 3500 MB/s',
                'price' => 1800000,
                'stock' => 0,
                'category' => 'Electronics',
                'is_active' => false,
            ],
            [
                'name' => 'RAM 16GB DDR4',
                'description' => 'Memory RAM untuk upgrade laptop/PC',
                'price' => 900000,
                'stock' => 40,
                'category' => 'Electronics',
                'is_active' => true,
            ],
            [
                'name' => 'USB Hub 7 Port',
                'description' => 'USB Hub dengan 7 port USB 3.0',
                'price' => 350000,
                'stock' => 7,
                'category' => 'Accessories',
                'is_active' => true,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
