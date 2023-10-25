<?php

namespace Database\Seeders;

use App\Models\Product as ModelsProduct;
use Illuminate\Database\Seeder;

class Product extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'name' => 'Tumbler',
                'description' => 'Tumbler Berkualitas Tinggi dengan Desain Elegan.',
                'price' => 35000,
                'image' => '9OpUm8RlDYDm8f75aT9AuUriPri0hULzzWOQkG45.jpg',
            ],
            [
                'name' => 'Buku Sketsa',
                'description' => 'Buku Sketsa Bagus untuk Kreativitas Anda.',
                'price' => 20000,
                'image' => 'zkCd8bgHnPNxb1aAnpCdyZakQsn4gp6vZQUcmC6T.jpg',
            ],
            [
                'name' => 'Dompet',
                'description' => 'Dompet Stylish dengan Berbagai Slot Kartu.',
                'price' => 55000,
                'image' => 'kScusKpBLPjV2f2oR8BoiAeFndzqBxJ2HLX0qtBp.jpg',
            ],
            [
                'name' => 'Buku Diary',
                'description' => 'Buku Diary Harian untuk Catatan Anda.',
                'price' => 25000,
                'image' => 'W3n6pGgAohNApj0mwafUSwThEK82Rj39tUPCZwpk.jpg',
            ],
            [
                'name' => 'Pulpen Mekanik',
                'description' => 'Pulpen Mekanik dengan Ketahanan Tinggi.',
                'price' => 8000,
                'image' => 'X4RLUUMxg2bMRw7oFbXpSxsEKq1GotR7uEMdJ4DI.jpg',
            ],
            [
                'name' => 'Mug',
                'description' => 'Mug Keramik Berkualitas untuk Minuman Anda.',
                'price' => 15000,
                'image' => '2HMPKZNZpGOYAk6bNdnLu8BYST9nPd5E2j9W6pEG.jpg',
            ],
            [
                'name' => 'Buku Diary',
                'description' => 'Buku Diary Harian untuk Catatan Anda.',
                'price' => 25000,
                'image' => 'PAtRJV2yuoEecX5YcoEGPGmZjaAu9LzD9ucuKSS1.jpg',
            ],
        ];

        foreach ($products as $product) {
            ModelsProduct::create([
                'name' => $product['name'],
                'description' => $product['description'],
                'price' => $product['price'],
                'image' => $product['image'],
            ]);
        }
    }
}
