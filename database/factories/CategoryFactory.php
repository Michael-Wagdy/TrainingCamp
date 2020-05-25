<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;
$categoryParentId= Category::select('id')->whereNull('parent_id')->pluck('id')->toArray();

$factory->define(Category::class, function (Faker $faker) use($categoryParentId) {
    return [
        'name'=>$faker->name,
        'parent_id'=>Arr::random($categoryParentId)
    ];
});
