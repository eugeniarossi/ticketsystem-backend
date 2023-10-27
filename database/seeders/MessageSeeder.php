<?php

namespace Database\Seeders;

use App\Models\Message;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Schema;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        Schema::disableForeignKeyConstraints();
        Message::truncate();

        for ($i = 0; $i < 10; $i++) {

            $newMessage = new Message();

            $newMessage->ticket_id = $faker->randomNumber();
            $newMessage->user_id = $faker->randomNumber();
            $newMessage->content = $faker->text(100);

            $newMessage->save();
        }

        Schema::enableForeignKeyConstraints();
    }
}
