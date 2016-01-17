<?php

use Illuminate\Database\Seeder;

class TopicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 5; $i++) {
            DB::table('topics')->insert([
                'name' => 'Topic_'.$i,
                'views' => 0,
                'user_id' => 1,
            ]);

            DB::table('tag_topic')->insert([
                'tag_id' => 3,
                'topic_id' => $i,
            ]);

            if($i >= 3) {
                DB::table('tag_topic')->insert([
                    'tag_id' => 2,
                    'topic_id' => $i,
                ]);
            }

            DB::table('posts')->insert([
                'content' => str_random(120),
                'user_id' => 1,
                'topic_id' => $i,
            ]);
        }
    }
}
