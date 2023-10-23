<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductVariant;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        User::create([
            "name" => "admin",
            "email" => "admin@gmail.com",
            "role_as" => 1,
            'email_verified_at' => now(),
            "password" => "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
        ]);
        Category::factory(10)->create();
        Brand::factory(5)->create();

        Product::factory(40)->has(ProductImage::factory(10))->has(ProductVariant::factory(5))->create();

        Product::create([
            "category_id" => 1,
            "name" => "Anumala 1",
            "slug" => "anumala-1",
            "small_description" => " Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aut adipisci tempore illo accusantium ullam, qui autem! Illo?",
            "description" => " Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quibusdam aperiam tempora, perferendis et voluptatum, ullam at ad saepe similique ducimus, doloribus voluptate adipisci dicta aliquid fugiat aliquam animi numquam consectetur? Expedita vero possimus dolores doloremque aspernatur, earum blanditiis culpa tempora iste cum neque, nam labore iure delectus architecto illo sit? Cumque assumenda pariatur sequi adipisci, repudiandae soluta praesentium eaque id? Molestias deserunt accusamus voluptatibus corrupti asperiores perferendis aut, consequatur amet.",
            "isNew" => true,
            "isPopular" => true,
            "status"=> true,
            "meta_title" => "Anumala 1",
            "meta_keyword" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit."
        ]);

        ProductVariant::create([
            "product_id" => 41,
            "selling_price" => 40000,
            "quantity" => 20
        ]);
        ProductImage::create([
            "product_id" => 41,
            "image" => "/uploads/product/arumala/IFNB4329.jpg",
        ]);
        ProductImage::create([
            "product_id" => 41,
            "image" => "/uploads/product/arumala/IFNB4331.jpg",
        ]);
        ProductImage::create([
            "product_id" => 41,
            "image" => "/uploads/product/arumala/IFNB4338.jpg",
        ]);
        ProductImage::create([
            "product_id" => 41,
            "image" => "/uploads/product/arumala/IFNB4339.jpg",
        ]);
    }
}
