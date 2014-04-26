<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CoursesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
      $dept = $faker->lexify('????');
      $course_num = $faker->numerify('####');
			Course::create([
          'course_id' => $dept . '-' . $course_num,
          'semester' => $faker->randomElement(['FA','SP','SU']),
          'year' => $faker->year(),
          'start_date' => $faker->dateTime(),
          'end_date' => $faker->dateTime(),
			]);
		}
	}

}