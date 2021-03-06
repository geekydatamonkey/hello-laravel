<?php

class UsersTableSeeder extends Seeder {

  public function run(){
    $faker = Faker\Factory::create();

    foreach(range(1,20) as $i){
      User::create([
        'username' => $faker->userName,
        'password' => Hash::make($faker->word)
      ]);
    }
  }
}