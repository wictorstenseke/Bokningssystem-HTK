<?php

use Illuminate\Database\Seeder;

class Truncate extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Reservation::truncate();
    }
}
