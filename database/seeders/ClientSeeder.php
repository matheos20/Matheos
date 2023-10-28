<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Client::truncate();
        $faker = Faker::create();
        foreach (range(1, 50) as $index) {
            Client::Create([
                "name" => $faker->name(),
                "email" => $faker->safeEmail,
                "contact" => $faker->phoneNumber,
                "whatsapp" => $faker->phoneNumber,
                "statut" => $faker->randomElement([
                    "VIP",
                    "Privilégié",
                    "Standard"
                ])
            ]);
        }
    }
}
