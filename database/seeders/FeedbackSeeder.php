<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('feedback')->insert($this->getData());
    }
    private function getData(): array
	{
		$faker = Factory::create();
		$data = [];

		for($i=0; $i < 5; $i++) {
			$name = $faker->sentence(mt_rand(1,5));
			$data[] = [
				'firstName' => $name,
                'lastName' => Str::slug($name),
				'message' => $faker->text(mt_rand(10, 30))
			];
		}


		return $data;
	}
}
