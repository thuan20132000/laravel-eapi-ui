<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        //
        'name'=>$faker->word,
        'slug'=>$faker->slug,
        'description'=>$faker->paragraph,
        'status'=>1,
    ];
});
