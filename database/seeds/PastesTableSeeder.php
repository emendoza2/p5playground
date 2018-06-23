<?php

use Illuminate\Database\Seeder;

class PastesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Pastes::truncate();

        (new Faker\Generator)->seed(234);

        factory(App\Pastes::class, 25)->create();
    }
}
