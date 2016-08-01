<?php

use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Reservation::truncate();
        factory(App\Reservation::class, 20)->create();
    }
}
