<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Carbon\Carbon;
use App\Offer;
use App\OfferDetails;
use App\Photo;
use Faker\Generator as Faker;

$factory->define(Offer::class, function (Faker $faker) {
    return [
        //
        "agency_id"=> 1,
        "name"=> $faker->name,
        "start_date"=>Carbon::now()->addDays($faker->numberBetween(-5,100)),
        "end_date"=>Carbon::now()->addDays($faker->numberBetween(5,120)),
        "rooms" => $faker->numberBetween(1,20),
        "status" => 1,
        "agency_price"=>$faker->randomNumber(3),
        "user_price"=>$faker->randomNumber(3)
    ];



});
$factory->define(OfferDetails::class, function (Faker $faker) {
    return [
        //
        "from"=> $faker->state,
        "to"=> $faker->state,
        "departial_time"=>$faker->dateTime($min="now"),
        "arrival_time"=>$faker->dateTime($min="now"),
        "ticket_number" => $faker->numberBetween(20,1000),
        "transportation" =>Arr::random(['bus','train'])
    ];
});

    $factory->define(Photo::class, function (Faker $faker) {
        return [
            //
             "imagename"=>$faker->imageUrl($width = 640, $height = 480)
        ];
});
 
