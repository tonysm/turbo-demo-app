<?php

use App\Models\Product;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFakeProducts extends Migration
{
    protected $products = [
        ['name' => 'Product 1', 'price_cents' => 1000, 'description' => 'Lorem Ipsum'],
        ['name' => 'Product 2', 'price_cents' => 1900, 'description' => 'Lorem Ipsum'],
        ['name' => 'Product 3', 'price_cents' => 2100, 'description' => 'Lorem Ipsum'],
        ['name' => 'Product 4', 'price_cents' => 2500, 'description' => 'Lorem Ipsum'],
        ['name' => 'Product 5', 'price_cents' => 3000, 'description' => 'Lorem Ipsum'],
        ['name' => 'Product 6', 'price_cents' => 10000, 'description' => 'Lorem Ipsum'],
        ['name' => 'Product 7', 'price_cents' => 9900, 'description' => 'Lorem Ipsum'],
        ['name' => 'Product 8', 'price_cents' => 3310, 'description' => 'Lorem Ipsum'],
        ['name' => 'Product 9', 'price_cents' => 4999, 'description' => 'Lorem Ipsum'],
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Product::withoutEvents(function () {
            foreach ($this->products as $productData) {
                Product::create($productData);
            }
        });
    }
}
