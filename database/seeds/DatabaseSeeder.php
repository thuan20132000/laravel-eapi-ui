<?php

use App\Model\Category;
use App\Model\Product;
use App\Model\Review;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(Category::class,10)->create();
        factory(Product::class,200)->create();
        factory(Review::class,500)->create();
    }
}
