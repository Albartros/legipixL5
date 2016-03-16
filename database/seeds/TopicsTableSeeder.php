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
                'views' => rand(1, 250),
                'is_locked' => rand(0, 1),
                'is_pinned' => rand(0, 1),
                'user_id' => 1,
                'created_at' => \Carbon\Carbon::now(),
            ]);

            DB::table('tag_topic')->insert([
                'tag_id' => rand(1, 3),
                'topic_id' => $i,
            ]);

            if($i >= 3) {
                DB::table('tag_topic')->insert([
                    'tag_id' => 4,
                    'topic_id' => $i,
                ]);
            }

            DB::table('posts')->insert([
                'content' => str_random(120),
                'user_id' => 1,
                'topic_id' => $i,
                'created_at' => \Carbon\Carbon::now(),
            ]);
        }
    }
}
