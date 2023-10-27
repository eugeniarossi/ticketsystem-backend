<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;
use App\Models\Ticket;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Schema;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        Schema::disableForeignKeyConstraints();
        Ticket::truncate();
        

        for ($i = 0; $i < 10; $i++) {

            $newTicket = new Ticket();

            $newTicket->title = $faker->sentence(1);
            $newTicket->category_id = $faker->randomNumber();
            $newTicket->created_by = $faker->randomNumber();
            $newTicket->closed = $faker->boolean();

            $newTicket->save();
        }

        Schema::enableForeignKeyConstraints();
    }
}
