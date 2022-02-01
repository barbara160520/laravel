<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('source')->insert($this->getData());
    }

    private function getData(): array
	{
		$faker = Factory::create();
		$data = [];

		for($i=0; $i < 10; $i++) {

			$data[] = [
				'title' => $faker->text(mt_rand(10, 15)),
                'url' => $faker->url()
			];
		}
		return $data;
	}
}
