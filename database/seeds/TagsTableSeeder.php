<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 5; $i++) {
            DB::table('tags')->insert([
                'name' => 'Tag_'.$i,
                'is_official' => array_rand([0,1]),
                'content' => str_random(),
                'slug' => str_random(),
                'category_id' => 1,
            ]);
        }
    }
}
