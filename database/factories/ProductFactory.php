<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Category;
use App\Model\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        //
        'category_id'=>function(){
            return Category::all()->random();
        },
        'name'=>$faker->word,
        'slug'=>$faker->slug,
        'short_description'=>$faker->paragraph,
        'long_description'=>$faker->paragraph,
        'price'=>$faker->numberBetween(10,500),
        'image'=>$faker->imageUrl,
        'discount'=>$faker->numberBetween(1,20),
        'color'=>$faker->colorName,
        'size'=>$faker->randomElement(['X', 'XL','M','S']),
        'stock'=>$faker->numberBetween(10,100),
        'status'=>1,

    ];
});
