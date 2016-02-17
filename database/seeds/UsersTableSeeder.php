<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i <= 5; $i++) {
            DB::table('users')->insert([
                'email' => str_random(10).'@gmail.com',
                'name' => str_random(10),
                'slug' => str_random(10),
                'password' => bcrypt('secret'),
                'is_verified' => 1,
                'created_at' => \Carbon\Carbon::now(),
            ]);
        }
    }
}
