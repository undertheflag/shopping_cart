<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new \App\Product([
            'imagePath' => '/mr.jpg',
            'title' => 'Mr. Chips',
            'description' => 'A very good English Book.',
            'price' => 12
        ]);
        $product->save();

        $product = new \App\Product([
            'imagePath' => '/mr.jpg',
            'title' => 'Mr. Chips',
            'description' => 'A very good English Book.',
            'price' => 12
        ]);
        $product->save();

        $product = new \App\Product([
            'imagePath' => '/mr.jpg',
            'title' => 'Mr. Chips',
            'description' => 'A very good English Book.',
            'price' => 12
        ]);
        $product->save();

        $product = new \App\Product([
            'imagePath' => '/mr.jpg',
            'title' => 'Mr. Chips',
            'description' => 'A very good English Book.',
            'price' => 12
        ]);
        $product->save();

        $product = new \App\Product([
            'imagePath' => '/mr.jpg',
            'title' => 'Mr. Chips',
            'description' => 'A very good English Book. On sale!',
            'price' => 10
        ]);
        $product->save();
    }
}
