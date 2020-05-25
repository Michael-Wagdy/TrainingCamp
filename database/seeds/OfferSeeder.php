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
        });
    }
}
