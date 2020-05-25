<?php

use Illuminate\Database\Seeder;
use  App\Category;
class CategoryParentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
         for($i=0; $i<5;$i++)
        DB::table('categories') ->insert([
            'name' => Str::random(5)
        ]);

        factory(App\Category::class, 10)->create();
}
}