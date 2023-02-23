<?php 
/* @var $factory \Illuminate\Database\Eloquent\Factory */ 
use App\Product; 
use Faker\Generator as Faker; 
$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'short_description' => $faker->sentence,
        'description' => $faker->paragraph,
        'category_id' => function () {
            return factory(App\Category::class)->create()->id;
        }, 
        'amount' => $faker->randomFloat(2, 0, 10000),
        'image' => $faker->image('public/storage/images',640,480, null, false),

    ];
});