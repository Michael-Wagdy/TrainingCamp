<?php

use Illuminate\Database\Seeder;

class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        // Create 50 records of Offers
        factory(App\Offer::class, 50)->create()->each(function ($offer) {
            // Seed the relation with 5 details
            $offerDetails = factory(App\OfferDetails::class, 5)->make();
            $offer->details()->saveMany($offerDetails);

            // Seed the relation with 5 photos
            $photos = factory(App\Photo::class, 5)->make();
            $offer->images()->saveMany($photos);

            // Get all the categories attaching up to 3 random roles to each offer
        $categories = App\Category::all();
        $users = App\user::all();
        // Populate the pivot table
            $offer->categories()->attach($categories->random(rand(1, 3))->pluck('id')->toArray());
            // $offer->users()->attach($users->random(rand(1, 3))->pluck('id')->toArray());
            $offer->users()->attach($users->pluck('id')->toArray());
        
    });
}
}
