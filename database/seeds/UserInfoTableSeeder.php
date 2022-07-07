<?php

use App\UserInfo;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class UserInfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $new_info = new UserInfo();
        $new_info->address = $faker->address();
        $new_info->phone_number = $faker->phoneNumber();

        $new_info->save();
    }
}
