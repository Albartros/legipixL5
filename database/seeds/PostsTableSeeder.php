<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 25; $i++) {
            DB::table('posts')->insert([
                'content' => str_random(120),
                'user_id' => 1,
                'topic_id' => 1,
                'created_at' => \Carbon\Carbon::now(),
            ]);
        }
    }
}
