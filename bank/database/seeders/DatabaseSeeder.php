<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'kiwi',
            'email' => 'kiwi@gmail.com',
            'password' => Hash::make('123'),
        ]);
        
        $faker = Faker::create('lt_LT');

        foreach(range(1, 15) as $_) {
            DB::table('clients')->insert([
                'name' => $faker->firstName,
                'surname' => $faker->lastName,
                'idPerson' => rand(30000000000, 69999999999)
            ]);
        }

        foreach(range(1, 15) as $_) {
            DB::table('accounts')->insert([
                'account' => $faker->bankAccountNumber, 
                'amount' => rand(10, 1000)/100,
                'client_id' => rand(1, 15)
            ]);
        }
    }
}
