<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker;


class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert($this->getData());
    }

    private function getData()
    {
        $data = [];
        $faker = Faker\Factory::create('ru_RU');
        for ($i = 1; $i <= 10; $i++) {
            $data[] = [
                'category_id' => $faker->numberBetween(1, 5),
                'title' => $faker->sentence(rand(3, 6)),
                'description' => $faker->realText(rand(200, 500)),
                'author' => $faker->name,
                'status' => "DRAFT",
                'image' => null,
                'created_at'=> now()
            ];
        }
        return $data;
    }
}
