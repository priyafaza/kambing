<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::insert([
            [
                "id" => 1,
                "name" => "KAMBING",
                "image" => "/storage/images/profile/629c359a857ef.jpg",
                "summary" => "KAMBIH QURBAN",
                "description" => "hallo guys welcome di ufang ungan hiya, hallo guys welcome di ufang ungan hiya, hallo guys welcome di ufang ungan hiya,hallo guys welcome di ufang ungan hiya",


            ],
            [
                "id" => 2,
                "name" => "AKIQAH",
                "image" => "/storage/images/profile/629c35c4cfb4d.jpg",
                "summary" => "AQIQAH",
                "description" => "hallo guys welcome di ufang ungan hiya, hallo guys welcome di ufang ungan hiya, hallo guys welcome di ufang ungan hiya,hallo guys welcome di ufang ungan hiya",


            ],
        ]);

        ProductDetail::insert([
            [
                "id" => 1,
                "product_id" => 1,
                "name" => "GRADE A",
                "detail" => "SIZE 25-30 KG",
                "price" => 30000.0,
                "stock" => 200,


            ],
            [
                "id" => 2,
                "product_id" => 1,
                "name" => "GRADE B",
                "detail" => "SIZE 31-35 KG",
                "price" => 40000.0,
                "stock" => 10,


            ],
            [
                "id" => 3,
                "product_id" => 1,
                "name" => "GRADE C",
                "detail" => "SIZE 31-35 KG",
                "price" => 40000.0,
                "stock" => 10,


            ],
            [
                "id" => 4,
                "product_id" => 1,
                "name" => "GRADE D",
                "detail" => "SIZE 31-35 KG",
                "price" => 40000.0,
                "stock" => 10,


            ],
            [
                "id" => 5,
                "product_id" => 2,
                "name" => "PAKET A",
                "detail" => "300 - 310 TUSUK",
                "price" => 90000.0,
                "stock" => 300,


            ],
            [
                "id" => 6,
                "product_id" => 2,
                "name" => "PAKET B",
                "detail" => "300 - 310 TUSUK",
                "price" => 40000.0,
                "stock" => 100,


            ],
            [
                "id" => 7,
                "product_id" => 2,
                "name" => "PAKET C",
                "detail" => "300 - 310 TUSUK",
                "price" => 40000.0,
                "stock" => 100,

            ],
        ]);
    }
}
