<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert($this->getData());
    }
    private function getData()
    {
        $data = [];
        $faker = Faker\Factory::create('ru_RU');
        for ($i = 1; $i <= 5; $i++) {
            $data[] = [
                'name' => $faker->userName(),
                'email' => $faker->email(),
                'password'=>$faker->password(4,6),
                'role'=>$faker->randomElement(['admin' ,'user'])
            ];
        }
        return $data;
    }
}
